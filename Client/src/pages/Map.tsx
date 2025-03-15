import "leaflet/dist/leaflet.css";
import { LatLngTuple } from "leaflet";
import Footer from "../components/Footer";
import { MapContainer, TileLayer, Marker } from "react-leaflet";
import L from "leaflet";
import markerIcon from "leaflet/dist/images/marker-icon.png";
import markerShadow from "leaflet/dist/images/marker-shadow.png";
import CustomPopup from "./CustomProp";

L.Marker.prototype.options.icon = L.icon({
  iconUrl: markerIcon,
  shadowUrl: markerShadow,
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41],
});

const locations = [
  {
    position: [42.698334, 23.319941] as LatLngTuple,
    imageUrl:
      "https://tretavazrast.com/wp-content/uploads/2023/02/Kokiche.jpg",
    altText: "Кокиче",
    contentText: "Кокиче",
  },
  {
    position: [42.697735, 23.321938] as LatLngTuple,
    imageUrl:
      "https://imgur.com/annBL.jpg",
    altText: "Куче",
    contentText: "Куче",
  },
  {
    position: [42.695984, 23.332669] as LatLngTuple,
    imageUrl:
      "https://manatarka.org/files/2019/12/Agaricuscampestris2.jpg",
    altText: "Печурка",
    contentText: "Печурка",
  },
];

export default function MyMap() {
  return (
    <div className="min-h-full flex flex-col">
      <div className="flex-1 pt-8 md:pt-10 pb-20 flex">
        <div className="w-full max-w-6xl mx-auto p-4">
          <div className="h-[600px] border-4 border-white rounded-[2rem] overflow-hidden relative">
            <MapContainer
              center={[42.6977, 23.3219]}
              zoom={14}
              scrollWheelZoom={false}
              style={{ height: "100%", width: "100%" }}
            >
              <TileLayer
                attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
              />

              {locations.map((location, index) => (
                <Marker key={index} position={location.position}>
                  <CustomPopup
                    imageUrl={location.imageUrl}
                    altText={location.altText}
                    contentText={location.contentText}
                  />
                </Marker>
              ))}
            </MapContainer>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
}
