import { BrowserRouter, Routes, Route, Navigate } from "react-router"
import Header from "./components/Header"
import Home from "./pages/Home"
import Login from "./pages/Login"
import Register from "./pages/Register"
import Profile from "./pages/Profile"
import NotFound from "./pages/NotFound"
import Map from "./pages/Map"
import Upload from "./pages/Upload"
import Details from "./pages/Details"


function App() {
  // change it to actual AuthChecker logic later
  const isAuthenticated = false;

  return (
    <BrowserRouter>
      <Header />
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

        <Route
          path="/app"
          element={<Map />}
        />

        <Route 
          path="/upload" 
          element={<Upload />} 
        />

        <Route 
          path="/details" 
          element={<Details />} 
        />

      </Routes>
    </BrowserRouter>
  )
}

export default App
