import React,{useState,useEffect} from 'react';
import axios from 'axios';
import Swal from 'sweetalert2';
import Footer from './Footer';

function History() {
  const [mounted,setMounted]=useState(false);
  const [user,setUser]=useState(0);
  const [data,setData]=useState([]);
  const [bool,setBool]=useState(false);
  const [boole,setBoole]=useState(false);
  if(!mounted)
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
          setUser(res.data[0].id);
          setBool(true);
      });
      (bool)?console.log('otmane'):Swal.fire('Wait...');
      (boole)?Swal.fire('data ready'):console.log('otmane');
  }
  useEffect(()=>{
    axios.get(`http://127.0.0.1:8000/api/reservation/fetch/${user}`).then((res)=>{
     setData(res.data);
         setTimeout(()=>{setBoole(true)},1000);
    });
  },[bool]);
  return (
    <div className="history">
      <h1>History:</h1>
      <table className="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Numero:</th>
            <th>Date depart:</th>
            <th>Hotel:</th>
            <th>Ville:</th>
            <th>Nombre de jours:</th>
          </tr>
        </thead>
        <tbody>
          {
            data.map((item)=>{
              return <tr>
                <td>{item.numero}</td>
                <td>{item.depart}</td>
                <td>{item.hotel}</td>
                <td>{item.ville}</td>
                <td>{item.day}</td>
              </tr>
            })
          }
        </tbody>
      </table>
      <Footer/>
    </div>
  )
}
export default History;