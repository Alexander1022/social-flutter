import type React from "react";
import { useState } from "react";
import { Dna } from "lucide-react";
import Button from "../components/Button";

export default function Login() {
  const [formData, setFormData] = useState({
    email: "",
    password: "",
  });
  const [error, setError] = useState("");

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    setError("");
    console.log("Login data:", formData);
  };

  return (
    <div className="min-h-screen bg-gradient-to-b from-purple-50 to-blue-50 pt-32 pb-20 px-4">
      <div className="max-w-md mx-auto backdrop-blur-sm bg-white/60 border border-white/20 rounded-xl p-8 shadow-xl">
        <div className="text-center mb-8">
          <div className="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
            <Dna className="w-8 h-8 text-blue-600" />
          </div>
          <h1 className="text-2xl font-bold text-gray-900">Welcome Back</h1>
          <p className="text-gray-600 mt-2">Sign in to your scientific account</p>
        </div>

        <form onSubmit={handleSubmit} className="space-y-6">
          {error && (
            <div className="text-red-600 text-sm text-center p-2 bg-red-50 rounded-lg">
              {error}
            </div>
          )}

          <div className="space-y-2">
            <label className="text-sm font-medium text-gray-700" htmlFor="email">
              Email Address
            </label>
            <input
              id="email"
              name="email"
              type="email"
              value={formData.email}
              onChange={handleChange}
              required
              className="w-full px-3 py-2 border border-blue-100 rounded-md bg-white/80 focus:outline-none focus:border-blue-300 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50"
              autoComplete="email"
            />
          </div>

          <div className="space-y-2">
            <div className="flex items-center justify-between">
              <label className="text-sm font-medium text-gray-700" htmlFor="password">
                Password
              </label>
              <a
                href="#"
                className="text-sm text-blue-600 hover:text-blue-700 transition-colors"
              >
                Forgot password?
              </a>
            </div>
            <input
              id="password"
              name="password"
              type="password"
              value={formData.password}
              onChange={handleChange}
              required
              className="w-full px-3 py-2 border border-blue-100 rounded-md bg-white/80 focus:outline-none focus:border-blue-300 focus:ring-2 focus:ring-blue-200 focus:ring-opacity-50"
              autoComplete="current-password"
            />
          </div>

          <Button
            type="submit"
            className="w-full border rounded py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white transition-colors"
          >
            Sign In
          </Button>
        </form>

        <div className="mt-6 text-center text-sm">
          <p className="text-gray-600">
            Don't have an account?{" "}
            <a
              href="/register"
              className="text-blue-600 hover:text-blue-700 font-medium transition-colors"
            >
              Register
            </a>
          </p>
        </div>
      </div>
    </div>
  );
}