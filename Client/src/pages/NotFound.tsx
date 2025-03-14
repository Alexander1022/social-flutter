import SadCatGif from "../assets/sad-cat.webp";

export default function NotFound() {
  return (
    <div className="min-h-screen bg-gradient-to-b from-purple-50 to-blue-50">
      <section className="pt-32 pb-20 px-4 md:px-8 flex flex-col items-center">
        <h1 className="text-4xl md:text-5xl font-bold mb-8 text-center bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">
          Oops! Page Not Found
        </h1>
        <img src={SadCatGif} width="480" height="480"></img>
      </section>
    </div>
  );
}
