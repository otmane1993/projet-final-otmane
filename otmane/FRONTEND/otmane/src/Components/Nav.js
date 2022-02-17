import '../App.css';
import react,{useState,useEffect} from 'react';
import { Outlet, Link, Navigate } from "react-router-dom";
import Register from  './Register';
import Login from  './Login';
import Help from  './Help';
import axios from 'axios';

function Nav() {
    const [token,setToken]=useState(null);
    const [tokene,setTokene]=useState('');
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
        //setTokene(localStorage.getItem('token'));
        if(localStorage.getItem('token'))
        {
            //return <Navigate to="/"/>
            //console.log('Home');
            const accessToken=localStorage.getItem('token');
            //console.log(tokenee);
            //axios.get('http://127.0.0.1:8000/api/villes')
            //.then((res)=>{
            //    setTokene(localStorage.getItem('token'));
            /*const authAxios=axios.create({
                baseURL:'http://127.0.0.1:8000/api',
                headers:{
                    Authorization:`Bearer ${accessToken}`,
                },
            });
            authAxios.post('/user',accessToken)
            .then((res)=>{ 
                //console.log('Otmane');
                console.log(res);
                //setName(res.data.firstname);
            });*/
            
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
                //console.log('Otmane');
                //console.log(res.data[0].lastname);
                setName(res.data[0].lastname);
            })
            .catch(function (error) {
                //console.log("Post Error : " +error);
            }); 
                 
                //console.log(res.data);
                //setName(res.firstname);
            //});
        }
    }
    if(localStorage.getItem('login'))
    {
        //setSwitche(true);
        //console.log('Login');
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
                                <li>
                                    <h4>Bonjour {name}</h4>
                                </li>
                                <li><Link to="/history"><span className="glyphicon glyphicon-user"></span>History</Link></li>
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
            </nav>
        </header>
        <Outlet/>
    </>
  );
}

export default Nav;