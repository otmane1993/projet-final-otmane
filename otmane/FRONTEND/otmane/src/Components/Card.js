import React,{useState,useEffect} from 'react';
import Farah from '../Images/Farah.png';
import Moughane from '../Images/Moughane.png';
import Twin from '../Images/Twin.png';
import { Navigate } from 'react-router-dom';
import axios from 'axios';


function Card(props) {
  const [redirect,setRedirect]=useState(false);
  const [redir,setRedir]=useState(false);
  const [sejour,setSejour]=useState(0);
  const [user,setUser]=useState(0);
  const [data,setData]=useState({
    sejour:0,
    user:0,
  });
  const [mounted,setMounted]=useState(false);
  const handleClick=()=>
  {
    if(!localStorage.getItem('token'))
    {
      setRedir(true);
      //return <Navigate to="/login"/>
    }
    setSejour(props.sejour);
    //setData({...data,sejour:sejour});
    //setRedirect(true);
    /***** ******/
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
      //console.log('Otmane');
      //console.log(res.data[0].lastname);
      setUser(res.data[0].id);
      //setData({...data,user:user,sejour:sejour});
      //setData({...data,user:user,sejour:sejour});
      /*axios.post('http://127.0.0.1:8000/api/reservation/store',data).then((res)=>{
      console.log(res.data);
      setRedirect(true);*/
    //});
    //
  });
  }
  useEffect(() => {
    setData({...data,user:user,sejour:sejour});
  }, [user]);
  useEffect(() => {
    axios.post('http://127.0.0.1:8000/api/reservation/store',data).then((res)=>{
      console.log(res.data);
      setRedirect(true);
    });
  }, [data]);
  if(!mounted)
  {
    //setSejour(props.sejour);
  }
  if(redirect)
  {
    return <Navigate to="/thanks"/>
  }
  if(redir)
  {
    return <Navigate to="/login"/>
  }
  return (
    <div className="card">
      <img width="400" height="200" src={`http://127.0.0.1:8000/storage/files/${props.image}`}/>
      <p>Le sejour commence le <span>{props.depart}</span> et dure <span>{props.day} jours</span></p>
      <p>Le prix du sejour est <span>{props.price} DHs</span></p>
      <p>Le sejour se deroule dans <span>l'hotel {props.hotel}</span> dans la ville <span>{props.ville}</span></p>
      <button className="btn btn-primary btn-lg" onClick={handleClick}>Reserver</button>
    </div>
  )
}
export default Card;
