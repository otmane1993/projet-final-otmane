import React from 'react';
import Farah from '../Images/Farah.png';
import Moughane from '../Images/Moughane.png';
import Twin from '../Images/Twin.png';

function CardTop(props) {
  return (
    <div>
        <img width="200" height="200" src={props.image}/>
        <p>Le sejour est de {props.day} jours</p>
        <p>Le prix du sejour est {props.price}</p>
        <p>L'hotel {props.hotel} dans la ville {props.ville}</p>
    </div>
  )
}
export default CardTop;