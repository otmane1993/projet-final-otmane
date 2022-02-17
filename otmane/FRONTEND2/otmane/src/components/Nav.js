import '../App.css';
import react,{useState,useEffect} from 'react';
import { Outlet, Link, Navigate } from "react-router-dom";
import Register from  './Register';
import Login from  './Login';
import Help from  './Help';
import axios from 'axios';

function Nav() {
    const [token,setToken]=useState(null);
    const [name,setName]=useState('');
    const [mounted,setMounted]=useState(false);
    //const [switche,setSwitche]=useState(false);
    const logout=(e)=>{
        e.preventDefault();
        //console.log('logout');
        localStorage.setItem('token','');
        //setRedirect(true);
        //return <Navigate to="/login"/>
        //setSwitche(false);
        localStorage.clear();
        setToken(null);         
    };
    if(!mounted)
    {
        if(localStorage.getItem('token'))
        {
            //return <Navigate to="/"/>
            console.log('Home');
            const tokene=localStorage.getItem('token');
            axios.post('http://127.0.0.1:8000/user',tokene)
            .then((res)=>{ 
                console.log(res.firstname);
                setName(res.firstname);
            });
        }
    }
    if(localStorage.getItem('login'))
    {
        //setSwitche(true);
        console.log('Login');
    }
    //if(redirect)
    //{
    //    return <Navigate to="/"/>;
    //}
    /*if(localStorage.getItem('token'))
    {
        console.log('Home');
        const tokene=localStorage.getItem('token');
        axios.post('http://127.0.0.1:8000/user',tokene)
        .then((res)=>{ 
            console.log(res.firstname);
            setName(res.firstname);
        });
    }*/
    //setInterval(Nav, 1000);
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
                                <li><button className="btn btn-primary" onClick={logout}>Deconnexion</button></li>
                                <li>
                                    <button className="btn btn-success">Modify</button>
                                </li>
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