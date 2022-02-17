import React from 'react';
import Card from './Card';
import Farah from '../Images/Farah.png';
import Moughane from '../Images/Moughane.png';
import Twin from '../Images/Twin.png';

function Top() {
  return (
    <section className="Top">
        <h1>Nos Top Sejours</h1>
        <div className="card-top">
          <Card ville="rabat" image={Farah} hotel="Farah"/>
          <Card ville="tanger" image={Moughane} hotel="Moughane"/>
          <Card ville="casablanca" image={Twin} hotel="Twin"/>
        </div>
    </section>
  )
}
export default Top;