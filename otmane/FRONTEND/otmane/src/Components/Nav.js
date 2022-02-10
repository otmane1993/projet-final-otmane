import '../App.css';
import react from 'react';
import { Outlet, Link } from "react-router-dom";
import Register from  './Register';
import Login from  './Login';
import Help from  './Help';

function Nav() {
  return (
    <>
        <header className="header-acceuil">
        <nav className="nav-accueil">
            <ul className="ul-accueil">
                <li>
                    <Link to="/">Home</Link>
                </li>
                <li>
                    <Link to="/login">Login</Link>
                </li>
                <li>
                    <Link to="/register">Register</Link>
                </li>
                <li>
                    <Link to="/help">Help</Link>
                </li>
                <li>
                    <Link to="/index">Index</Link>
                </li>
            </ul>
        </nav>
        </header>
        <Outlet/>
    </>
  );
}

export default Nav;