import React from 'react';
import Farah from '../Farah.png';
import Moughane from '../Moughane.png';
import Twin from '../Twin.png';


function Card(props) {
  return (
    <div className="card">
      <img width="200" height="200" src={props.image}/>
      <p>Le sejour est de {props.day} jours</p>
      <p>Le prix du sejour est {props.price}</p>
      <p>L'hotel {props.hotel} dans la ville {props.ville}</p>
    </div>
  )
}
export default Card;
