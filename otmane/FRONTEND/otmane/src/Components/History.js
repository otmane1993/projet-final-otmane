import React,{useState,useEffect} from 'react';
import axios from 'axios';
import Swal from 'sweetalert2';

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
          setUser(res.data[0].id);
          setBool(true);
      });
      (bool)?console.log('otmane'):Swal.fire('Wait...');
  }
  if(bool)
  {
    axios.get(`http://127.0.0.1:8000/api/reservation/fetch/${user}`).then((res)=>{
     console.log(res.data);
     setData(res.data);
     //Swal.fire('Data is ready');
     /*setBoole(true);
     (boole)?Swal.fire('Data is ready'):console.log('close sweet');
     setBoole(false);*/
     //(boole)?Swal.fire('Data is ready'):console.log('close sweet');
    });
    (data)?console.log('otmane'):Swal.fire('Wait...');
    
    //setBoole(false);
  }
  return (
    <div>
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
    </div>
  )
}
export default History;