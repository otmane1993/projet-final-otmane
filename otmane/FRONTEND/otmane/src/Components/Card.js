import React from 'react';
import Farah from '../Farah.png';
import Moughane from '../Moughane.png';
import Twin from '../Twin.png';


function Card(props) {
  return (
    <div className="card">
        <p>Le sejour est de {props.day} jours</p>
    </div>
  )
}
export default Card;
