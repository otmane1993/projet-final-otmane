import '../App.css';
import react,{useState} from 'react';
import { Outlet, Link } from "react-router-dom";
import Register from  './Register';
import Login from  './Login';
import Help from  './Help';

function Nav() {
    const [token,setToken]=useState(null);
    const logout=()=>{
        //console.log('logout');
        localStorage.setItem('token','');
        localStorage.clear();
        setToken(null);         
    };
  return (
    <>
        <header className="header-acceuil">
            <nav className="navbar navbar-inverse nav-accueil">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <Link className="navbar-brand" to="/">Agencia</Link>
                    </div>
                    <ul className="nav navbar-nav navbar-right">
                        {
                            localStorage.getItem('token')
                            ?
                            <>
                                <li><Link to="/register"><span className="glyphicon glyphicon-user"></span> Recherche</Link></li>
                                <button className="btn btn-primary" onClick={logout}>Deconnexion</button>
                            </>
                            :
                            <>
                                <li><Link to="/register"><span className="glyphicon glyphicon-user"></span> Sign Up</Link></li>
                                <li><Link to="/login"><span className="glyphicon glyphicon-log-in"></span> Login</Link></li>
                            </>
                        }
                    </ul>
                </div>
            </nav>
        </header>
        <Outlet/>
    </>
  );
}

export default Nav;