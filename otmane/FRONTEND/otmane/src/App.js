import './App.css';
import Nav from './Components/Nav';
import Home from './Components/Home';
import Login from './Components/Login';
import Register from './Components/Register';
import Help from './Components/Help';
import Nopage from './Components/Nopage';
import Index from './Components/Index';
import ReactDOM from "react-dom";
import { BrowserRouter, Routes, Route } from "react-router-dom";
function App() {
  return (
    <div className="App">
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Nav />}>
              <Route path="p" element={<Home />} />
              <Route path="index" element={<Index />} />
              <Route path="login" element={<Login />} />
              <Route path="register" element={<Register />} />
              <Route path="help" element={<Help />} />
              <Route path="*" element={<Nopage/>} />
            </Route>
          </Routes>
        </BrowserRouter>
        <img src=''/>
    </div>
  );
}

export default App;
