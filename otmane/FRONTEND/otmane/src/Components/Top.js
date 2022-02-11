import React from 'react';
import Card from './Card';
import Farah from '../Farah.png';
import Moughane from '../Moughane.png';
import Twin from '../Twin.png';

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
