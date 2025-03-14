import "leaflet/dist/leaflet.css";
import { LatLngTuple } from "leaflet";
import Footer from "../components/Footer";
import { MapContainer, TileLayer, Marker, Popup, useMap } from "react-leaflet";
import L from "leaflet";
import markerIcon from "leaflet/dist/images/marker-icon.png";
import markerShadow from "leaflet/dist/images/marker-shadow.png";
import CustomPopup from "../components/CustomProp";
import UserMarker from "../assets/user-pin.png";
import { useEffect, useState } from "react";
import axios from "axios";

L.Marker.prototype.options.icon = L.icon({
  iconUrl: markerIcon,
  shadowUrl: markerShadow,
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41],
});

const userIcon = L.icon({
  iconUrl: UserMarker,
  shadowUrl: markerShadow,
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41],
});

interface LocationData {
  position: LatLngTuple;
  imageUrl: string;
  date: Date;
  author: string;
  contentText: string;
  altText: string;
}

function CenterMap({ position }: { position: LatLngTuple }) {
  const map = useMap();
  useEffect(() => {
    map.setView(position);
  }, [position, map]);
  return null;
}

export default function MyMap() {
  const [userPosition, setUserPosition] = useState<LatLngTuple | null>(null);
  const [locations, setLocations] = useState<LocationData[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchLocations = async () => {
      try {
        const response = await axios.get(
          `${import.meta.env.VITE_SERVER_ENDPOINT}/api/locations`,
          {
            headers: {
              "ngrok-skip-browser-warning": "please-ngrok-we-love-you",
              Authorization: `Bearer ${localStorage.getItem("authToken")}`,
            },
          }
        );

        const responseData = response.data;
        console.log("Full API response:", responseData);

        if (!responseData.data || !Array.isArray(responseData.data)) {
          throw new Error("Invalid response format: Expected data array");
        }

        const formattedData = responseData.data.map((loc: any) => {
          console.log(loc);
          const specieName = loc.specie?.common_name || "Unknown species";

          const lat = parseFloat(loc.lat);
          const lng = parseFloat(loc.lng);

          const firstImage = loc.image_urls[0].url;
          console.log(firstImage);
          return {
            position: [lat, lng] as LatLngTuple,
            imageUrl: firstImage,
            date: new Date(loc.created_at),
            author: loc.user?.name || "Unknown",
            contentText: loc?.specie?.scientific_name,
            altText: `Photo of ${specieName}`,
          };
        });

        console.log("Formatted data:", formattedData);
        setLocations(formattedData);
        setError(null);
      } catch (err) {
        console.error("Full error:", err);

        if (axios.isAxiosError(err)) {
          const message = err.response?.data?.message || err.message;
          setError(`API Error: ${message}`);
        } else {
          setError(err instanceof Error ? err.message : "Unknown error");
        }
      } finally {
        setLoading(false);
      }
    };

    fetchLocations();
  }, []);

  useEffect(() => {
    if (typeof window !== "undefined" && navigator.geolocation) {
      const watchId = navigator.geolocation.watchPosition(
        (position) => {
          const { latitude, longitude } = position.coords;
          setUserPosition([latitude, longitude]);
        },
        (error) => {
          console.error("Error getting geolocation:", error);
        },
        {
          enableHighAccuracy: true,
          maximumAge: 10000,
        }
      );

      return () => navigator.geolocation.clearWatch(watchId);
    }
  }, []);

  return (
    <div className="min-h-full flex flex-col">
      <div className="flex-1 pt-8 md:pt-10 pb-20 flex">
        <div className="w-full max-w-6xl mx-auto p-4">
          <div className="h-[600px] border-4 border-white rounded-[2rem] overflow-hidden relative">
            {loading && (
              <div className="absolute inset-0 bg-gray-500/50 flex items-center justify-center z-50">
                <div className="text-white text-xl">Loading map data...</div>
              </div>
            )}

            <MapContainer
              center={userPosition || [42.6977, 23.3219]}
              zoom={14}
              scrollWheelZoom={false}
              style={{ height: "100%", width: "100%" }}
            >
              <TileLayer
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
              />

              {!error &&
                locations.map((location, index) => (
                  <Marker key={index} position={location.position}>
                    <CustomPopup
                      imageUrl={location.imageUrl}
                      date={location.date}
                      author={location.author}
                      altText={`Photo by ${location.author}`}
                      contentText={location.contentText}
                    />
                  </Marker>
                ))}

              {userPosition && (
                <>
                  <Marker position={userPosition} icon={userIcon}>
                    <Popup>Your current location</Popup>
                  </Marker>
                  <CenterMap position={userPosition} />
                </>
              )}
            </MapContainer>

            {error && (
              <div className="absolute inset-0 bg-red-500/50 flex items-center justify-center z-50">
                <div className="text-white text-xl text-center">
                  Error loading locations: {error}
                </div>
              </div>
            )}
          </div>
        </div>
      </div>
      <Footer userPosition={userPosition} />
    </div>
  );
}
