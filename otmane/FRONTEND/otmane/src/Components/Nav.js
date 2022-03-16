import '../App.css';
import react,{useState,useEffect} from 'react';
import { Outlet, Link,useNavigate, Navigate } from "react-router-dom";
import Register from  './Register';
import Login from  './Login';
import Help from  './Help';
import axios from 'axios';
import logo from '../Images/logo.png';

function Nav() {
    let navigate=useNavigate();
    const [switche,setSwitche]=useState(false);
    const [showNave,setShowNave]=useState(false);
    const [redirect,setRedirect]=useState(false);
    const [token,setToken]=useState(null);
    const [tokene,setTokene]=useState('');
    const [name,setName]=useState('');
    const [mounted,setMounted]=useState(false);
    const logout=(e)=>{
        e.preventDefault();
        localStorage.setItem('token','');
        localStorage.clear();
        setSwitche(false);
        setName('');
        setToken(null);
        setRedirect(true);       
    };
    const showNav=(e)=>
    {
        setShowNave(!showNave);                  
    }
    if(!mounted)
    {
        setInterval(()=>{
            if(localStorage.getItem('token'))
            {
                setSwitche(true);
            }
        },1000);
        //console.log('otmane KSAANI');
        if(localStorage.getItem('token'))
        {
            //setSwitche(true);
            const accessToken=localStorage.getItem('token');
            
            var reqData = {
                "tokene": `${accessToken}`,
            };
            axios({
                method: 'post',
                url: 'http://127.0.0.1:8000/api/user',
                //withCredentials: true,
                crossdomain: true,
                data: Object.keys(reqData).map(function(key) {
                    return encodeURIComponent(key) + '=' + encodeURIComponent(reqData[key])
                }).join('&'),    
            headers: { 
              "Content-Type": "application/x-www-form-urlencoded",
              "Cache-Control": "no-cache",
              "Postman-Token": `Bearer ${accessToken}`,
            }
            }).then((res)=>{ 
                setName(res.data[0].lastname);
                //setSwitche(true);
            })
            .catch(function (error) {
               
            }); 
        }
    }
    if(redirect)
    {
        setTimeout(()=>{setRedirect(false)},1);
        return <Navigate to="/"/>;
    }
  return (
    <>
        <header className="header-acceuil">
            {/*<nav className="navbar navbar-inverse nav-accueil">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <Link className="navbar-brand" to="/"><img src={logo} width="100" height="100"/></Link>
                    </div>
                    <ul className="nav navbar-nav navbar-right">
                        {
                            //localStorage.getItem('token')
                            switche
                            ?
                            <>
                                <li>
                                    <h4>Bonjour {name}</h4>
                                </li>
                                <li><Link to="/history"><span className="glyphicon glyphicon-user"></span>History</Link></li>
                                <li><Link to="/"><span className="glyphicon glyphicon-user"></span>Recherche</Link></li>
                                <li><button className="btn btn-primary" onClick={logout}>Deconnexion</button></li>
                                <li>
                                <Link to="/modify"><span className="glyphicon glyphicon-user"></span>Modify</Link>
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
                    </nav>*/}
            <nav className={(showNave)?'heigh':''}>
                <input type="checkbox" id="check"/>
                <label for="check" className="check-btn">
                <i class="fas fa-bars"></i>
                </label>
                <Link className="navbar-brand" to="/"><img src={logo} width="100" height="100"/></Link>
                <ul className={(showNave)?'show':''}>
                {
                    //localStorage.getItem('token')
                    switche
                    ?
                    <>
                        <li>
                            <h4 className="hello-name">Bonjour {name}</h4>
                        </li>
                        <li><Link to="/history"><span className="glyphicon glyphicon-user"></span>Historique</Link></li>
                        <li><Link to="/"><span className="glyphicon glyphicon-search"></span>Recherche</Link></li>
                        <li><button className="btn btn-primary" onClick={logout}>Deconnexion</button></li>
                        <li>
                        <Link to="/modify"><span className="glyphicon glyphicon-edit"></span>Modifier</Link>
                        </li>
                    </>
                    :
                    <>
                        <li><Link to="/register"><span className="glyphicon glyphicon-user"></span> S'inscrire</Link></li>
                        <li><Link to="/login"><span className="glyphicon glyphicon-log-in"></span> Se connecter</Link></li>
                    </>
                }
                </ul>
                <div className="hiddene" onClick={showNav}></div>
            </nav>
        </header>
        <Outlet/>
    </>
  );
}

export default Nav;