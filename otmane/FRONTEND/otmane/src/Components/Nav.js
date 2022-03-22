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
        if(localStorage.getItem('token'))
        {
            const accessToken=localStorage.getItem('token');
            
            var reqData = {
                "tokene": `${accessToken}`,
            };
            axios({
                method: 'post',
                url: 'http://127.0.0.1:8000/api/user',
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
            })
            .catch(function (error) {
               
            }); 
        }
    }
    if(redirect)
    {
        //setRedirect(false);
        setTimeout(()=>{setRedirect(false)},1);
        return <Navigate to="/"/>;  
    }
    /*useEffect(()=>{
        return <Navigate to="/"/>;
    },[redirect]);*/
  return (
    <>
        <header className="header-acceuil">
            <nav className={(showNave)?'heigh':''}>
                <input type="checkbox" id="check"/>
                <label for="check" className="check-btn">
                <i class="fas fa-bars"></i>
                </label>
                <Link className="navbar-brand" to="/"><img src={logo} width="100" height="100"/></Link>
                <ul className={(showNave)?'show':''}>
                {
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