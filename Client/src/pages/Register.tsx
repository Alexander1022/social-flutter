import type React from "react";
import { useState } from "react";
import { Microscope } from "lucide-react";
import Button from "../components/Button";
import { Link } from "react-router";

export default function Register() {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    password: "",
    confirmPassword: "",
  });
  const [error, setError] = useState("");

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (formData.password !== formData.confirmPassword) {
      setError("Passwords do not match");
      return;
    }
    setError("");
    console.log("Registration data:", formData);
  };

  return (
    <div className="min-h-screen bg-gradient-to-b from-emerald-50 to-blue-50 pt-24 pb-20 px-4">
      <div className="max-w-md mx-auto backdrop-blur-sm bg-white/60 border border-white/20 rounded-xl p-8 shadow-xl">
        <div className="text-center mb-8">
          <div className="inline-flex items-center justify-center w-16 h-16 bg-emerald-100 rounded-full mb-4">
            <Microscope className="w-8 h-8 text-emerald-600" />
          </div>
          <h1 className="text-2xl font-bold text-gray-900">
            Create an Account
          </h1>
          <p className="text-gray-600 mt-2">
            Join our scientific community today
          </p>
        </div>

        <form onSubmit={handleSubmit} className="space-y-6">
          {error && (
            <div className="text-red-600 text-sm text-center p-2 bg-red-50 rounded-lg">
              {error}
            </div>
          )}

          <div className="space-y-2">
            <label className="text-sm font-medium text-gray-700" htmlFor="name">
              Full Name
            </label>
            <input
              id="name"
              name="name"
              type="text"
              value={formData.name}
              onChange={handleChange}
              required
              className="w-full px-3 py-2 border border-emerald-100 rounded-md bg-white/80 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200 focus:ring-opacity-50"
            />
          </div>

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
              className="w-full px-3 py-2 border border-emerald-100 rounded-md bg-white/80 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200 focus:ring-opacity-50"
              autoComplete="email"
            />
          </div>

          <div className="space-y-2">
            <label className="text-sm font-medium text-gray-700" htmlFor="password">
              Password
            </label>
            <input
              id="password"
              name="password"
              type="password"
              value={formData.password}
              onChange={handleChange}
              required
              className="w-full px-3 py-2 border border-emerald-100 rounded-md bg-white/80 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200 focus:ring-opacity-50"
              autoComplete="new-password"
            />
          </div>

          <div className="space-y-2">
            <label className="text-sm font-medium text-gray-700" htmlFor="confirmPassword">
              Confirm Password
            </label>
            <input
              id="confirmPassword"
              name="confirmPassword"
              type="password"
              value={formData.confirmPassword}
              onChange={handleChange}
              required
              className="w-full px-3 py-2 border border-emerald-100 rounded-md bg-white/80 focus:outline-none focus:border-emerald-300 focus:ring-2 focus:ring-emerald-200 focus:ring-opacity-50"
              autoComplete="new-password"
            />
          </div>

          <Button
            type="submit"
            className="border rounded-2xl w-full bg-emerald-600 hover:bg-emerald-700 text-white transition-colors py-2 px-4"
          >
            Register
          </Button>
        </form>

        <div className="mt-6 text-center text-sm">
          <p className="text-gray-600">
            Already have an account?{" "}
            <Link
              to="/login"
              className="text-emerald-600 hover:text-emerald-700 font-medium"
            >
              Sign in
            </Link>
          </p>
        </div>
      </div>
    </div>
  );
}