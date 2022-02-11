import React from 'react';
import Farah from '../Farah.png';
import Moughane from '../Moughane.png';
import Twin from '../Twin.png';


function Card(props) {
  return (
    <div className="card-accueil">
        <img width="300" height="300" src={props.image}/>
        <p>4 jours a {props.ville} Hotel {props.hotel}</p>
        <p>Maroc</p>
        <p>Des 3000 dh par personne</p>
    </div>
  )
}
export default Card;
