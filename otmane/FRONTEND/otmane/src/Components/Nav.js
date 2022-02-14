import '../App.css';
import react,{useState} from 'react';
import { Outlet, Link, Navigate } from "react-router-dom";
import Register from  './Register';
import Login from  './Login';
import Help from  './Help';

function Nav() {
    const [token,setToken]=useState(null);
    const [switche,setSwitche]=useState(false);
    const logout=()=>{
        //console.log('logout');
        localStorage.setItem('token','');
        //setRedirect(true);
        //return <Navigate to="/login"/>
        localStorage.clear();
        setToken(null);         
    };
    //if(redirect)
    //{
    //    return <Navigate to="/"/>;
    //}
    if(localStorage.getItem('token'))
    {
        //setSwitche(true);
    }
    else
    {
        //setSwitche(!switche);
    }
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