import React from 'react';
import Twin from '../Twin.png';
import Moughane from '../Moughane.png';
import Farah from '../Farah.png';
import Card from './Card';
function Results() {
  return (
    <section className="results">
          <Card ville="rabat" image={Farah} hotel="Farah"/>
          <Card ville="tanger" image={Moughane} hotel="Moughane"/>
          <Card ville="casablanca" image={Twin} hotel="Twin"/>
    </section>
  )
}
export default Results;
