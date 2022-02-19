import './App.css';
import Nav from './Components/Nav';
import Home from './Components/Home';
import Login from './Components/Login';
import Register from './Components/Register';
import Help from './Components/Help';
import Nopage from './Components/Nopage';
import Index from './Components/Index';
import History from './Components/History';
import Thanks from './Components/Thanks';
import ReactDOM from "react-dom";
import Modify from './Components/Modify';
import ProtectedRoutes from './Components/ProtectedRoutes';
import ProtectedAuth from './Components/ProtectedAuth';
import { BrowserRouter, Routes, Route } from "react-router-dom";

function App() {
  const token=localStorage.getItem('token');
  return (
    <div className="App">
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Nav />}>
              <Route path="home" element={<Home />} />
              
              {/*<Protected exact path="modify" component={Modify}/>*/}
              <Route path="" element={<Index />} />
              <Route element={<ProtectedAuth/>}>
                <Route path="login" element={<Login />} />
                <Route path="register" element={<Register />} />
              </Route>
              
              
              <Route element={<ProtectedRoutes/>}>
                <Route path="thanks" element={<Thanks />} />
                <Route path="modify" element={<Modify />}/> 
                <Route path="history" element={<History />} />
              </Route>
              
              <Route path="help" element={<Help />} />
              <Route path="*" element={<Nopage/>} />
            </Route>
          </Routes>
        </BrowserRouter>
    </div>
  );
}

export default App;