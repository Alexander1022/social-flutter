import { BrowserRouter, Routes, Route, Navigate } from "react-router"
import Navbar from "./components/Navbar"
import Home from "./pages/Home"
import Login from "./pages/Login"
import Register from "./pages/Register"
import Profile from "./pages/Profile"
import NotFound from "./pages/NotFound"

function App() {
  // change it to actual AuthChecker logic later
  const isAuthenticated = false;

  return (
    <BrowserRouter>
      <Navbar />
      <Routes>
      
        <Route path="/" element={<Home />} />
        
        <Route 
          path="/login" 
          element={isAuthenticated ? <Navigate to='/' /> : <Login />}
        />

        <Route 
          path="/register" 
          element={isAuthenticated ? <Navigate to='/' /> : <Register />}
        />

        <Route
          path="/profile"
          element={isAuthenticated ? <Profile /> : <Navigate to='/login' />}
        />

        <Route
          path="*"
          element={<NotFound />}
        />

      </Routes>
    </BrowserRouter>
  )
}

export default App
