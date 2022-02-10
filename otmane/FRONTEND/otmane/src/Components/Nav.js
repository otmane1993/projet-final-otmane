import '../App.css';
import react from 'react';
import { BrowserRouter,Link } from "react-router-dom";

function Nav() {
  return (
    <div>
        <nav>
            <ul>
                <li>
                    <Link to="/login">Login</Link>
                </li>
                <li>
                    <Link to="/register">Register</Link>
                </li>
                <li>
                    <Link to="/help">Help</Link>
                </li>
            </ul>
        </nav>
        <Route path="/login"><Login/></Route>
        <Route path="/register"><Register/></Route>
        <Route path="/help"><Help/></Route>
    </div>
  );
}

export default Nav;