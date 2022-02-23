import React from 'react';
import Farah from '../Images/Farah.png';
import Moughane from '../Images/Moughane.png';
import Twin from '../Images/Twin.png';

function CardTop(props) {
  return (
    <div className="card">
      <img width="400" height="200" src={props.image}/>
      <p>Le sejour commence le <span>{props.depart}</span> et dure <span>{props.day} jours</span></p>
      <p>Le prix du sejour est <span>{props.price} DHs</span> par nuit</p>
      <p>Le sejour se deroule dans <span>l'hotel {props.hotel}</span> dans la ville <span>{props.ville}</span></p>
      {/*<button className="btn btn-primary btn-lg" onClick={handleClick}>Reserver</button>*/}
    </div>
  )
}
export default CardTop;