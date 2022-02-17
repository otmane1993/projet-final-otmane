import React,{useState} from 'react';
import axios from 'axios';

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
            //console.log(res.data[0].id);
            setId(res.data[0].id);
            //setName(res.data);
        })
        .catch(function (error) {
            console.log("Post Error : " +error);
        });
      }
    };
    const handleSubmit=(e)=>{
      e.preventDefault();
      axios.put(`http://127.0.0.1:8000/api/user/update/${id}`,data).then((res)=>{
        console.log(res.data.message);
        setMessage(res.data.message);
      });
    };
  return (
    <>
      <form method="POST" onSubmit={handleSubmit}>
        <div className="form-group">
          <label htmlFor="password">Nouveau Mot de passe</label>
          <input type="text" name="password" id="password" className="form-control" onChange={(e)=>{setData({...data,password:e.target.value});setMessage('')}}/>
        </div>
        <div className="form-group">
          <label htmlFor="firstname">Nouveau Firstname</label>
          <input type="text" name="firstname" id="firstname" className="form-control" onChange={(e)=>{setData({...data,firstname:e.target.value});setMessage('')}}/>
        </div>
        <div className="form-group">
          <label htmlFor="lastname">Nouveau Lastname</label>
          <input type="text" name="lastname" id="lastname" className="form-control" onChange={(e)=>{setData({...data,lastname:e.target.value});setMessage('')}}/>
        </div>
        <div>
          <input type="submit" value="modify"/>
        </div>
      </form>
      <p>{message}</p>
    </>
  )
}
export default Modify;