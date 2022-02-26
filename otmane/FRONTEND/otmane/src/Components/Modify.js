import React,{useState} from 'react';
import axios from 'axios';
import {Navigate} from 'react-router-dom';
import Footer from './Footer';

function Modify() {
  const [mounted,setMounted]=useState(false);
  const [id,setId]=useState(0);
  const [message,setMessage]=useState('');
  const [data,setData]=useState({
    password:'',
    firstname:'',
    lastname:'',
  });
  if(!mounted)
    {
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
            setId(res.data[0].id);
        })
        .catch(function (error) {
            console.log("Post Error : " +error);
        });
      }
    };
    const handleSubmit=(e)=>{
    if(window.confirm('Do you really want to update coordinates?')==true)
      {
        e.preventDefault();
        axios.put(`http://127.0.0.1:8000/api/user/update/${id}`,data).then((res)=>{
        console.log(res.data.message);
        setMessage(res.data.message);
      });
    }
    else
    {
      e.preventDefault();
    }
  }
  return (
    <>
      <h1 class="title-coordinate">Mes coordonnees:</h1>
      <form method="POST" onSubmit={handleSubmit} className="container modify-form">
        <div className="form-group">
          <label htmlFor="password">Nouveau Mot de passe</label>
          <input type="text" name="password" placeholder="Entrez nouveau password" id="password" className="form-control" onChange={(e)=>{setData({...data,password:e.target.value});setMessage('')}}/>
        </div>
        <div className="form-group">
          <label htmlFor="firstname">Nouveau Firstname</label>
          <input type="text" name="firstname" placeholder="Entrez nouveau firstname" id="firstname" className="form-control" onChange={(e)=>{setData({...data,firstname:e.target.value});setMessage('')}}/>
        </div>
        <div className="form-group">
          <label htmlFor="lastname">Nouveau Lastname</label>
          <input type="text" name="lastname" id="lastname" placeholder="Entrez nouveau lastname" className="form-control" onChange={(e)=>{setData({...data,lastname:e.target.value});setMessage('')}}/>
        </div>
        <div>
          <input type="submit" value="modify" className="btn btn-info btn-lg"/>
        </div>
      </form>
      {(message)?<p className="message-modify container">{message}</p>:<p></p>}
      <Footer/>
    </>
  )
}
export default Modify;