import { Popup } from "react-leaflet";

interface CustomPopupProps {
  imageUrl: string;
  altText: string;
  contentText: string;
  date: Date;
  author: string;
}

export default function CustomPopup({
  imageUrl,
  altText,
  contentText,
  date,
  author,
}: CustomPopupProps) {
  return (
    <Popup>
      <div className="flex flex-col items-center gap-2 p-2">
        <div className="relative bg-white rounded-lg shadow-lg overflow-hidden">
          <img
            src={imageUrl}
            alt={altText}
            className="w-48 h-32 object-cover border-4 border-white rounded-md"
          />
        </div>
        <div className="text-center space-y-1">
          <h3 className="text-sm font-semibold text-gray-900">{contentText}</h3>
          <p className="text-xs text-gray-600">
            Photo by: {author}
          </p>
          <p className="text-xs text-gray-500">
            {date.toLocaleDateString('en-US', {
              year: 'numeric',
              month: 'long',
              day: 'numeric'
            })}
          </p>
        </div>
      </div>
    </Popup>
  );
}