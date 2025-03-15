import { Popup } from "react-leaflet";

interface CustomPopupProps {
  imageUrl: string;
  altText: string;
  contentText: string;
}

export default function CustomPopup({
  imageUrl,
  altText,
  contentText,
}: CustomPopupProps) {
  return (
    <Popup>
      <div className="flex flex-col items-center">
        <img
          src={imageUrl}
          alt={altText}
          className="object-contain"
        />
        <p className="text-sm text-center font-medium text-gray-700">
          {contentText}
        </p>
      </div>
    </Popup>
  );
}
