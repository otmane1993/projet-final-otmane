import React,{useState} from 'react';
import Twin from '../Images/Twin.png';
import Moughane from '../Images/Moughane.png';
import Farah from '../Images/Farah.png';
import Card from './Card';
function Results(props) {
  return (
    <section className="results">
          <h2>Results:</h2>
          {(props.message)?<p className="nosejour">{props.message}</p>:<p></p>}
          {(props.mesError)?<p className="nosejour">{props.mesError}</p>:<p></p>}
          {
            props.data.map((item)=>{

              return <Card day={item.day} price={item.price} hotel={item.hotel} ville={item.ville} image={item.image} sejour={item.sejour} depart={item.depart}/>
            })
          }
    </section>
  )
}
export default Results;
