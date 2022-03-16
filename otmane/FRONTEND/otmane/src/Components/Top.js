import React from 'react';
import Card from './Card';
import CardTop from './CardTop';
import Farah from '../Images/Farah.png';
import Moughane from '../Images/Moughane.png';
import Twin from '../Images/Twin.png';
import {Link} from 'react-router-dom';
import Carousel from 'react-elastic-carousel';

function Top() {
  return (
    <section className="Top">
        <h1 id="top">Nos Top Sejours</h1>
        {/*<Carousel>         
          <CardTop ville="rabat" image={Farah} hotel="Farah" day="3" price="1500" depart="22-02-2022"/>
          <CardTop ville="tanger" image={Moughane} hotel="Moughane" day="5" price="2500" depart="25-02-2022"/>
          <CardTop ville="casablanca" image={Twin} hotel="Twin" day="7" price="2000" depart="25-02-2022"/>
  </Carousel>*/}
      <Carousel>
          <CardTop ville="rabat" image={Farah} hotel="Farah" day="3" price="1500" depart="22-02-2022"/>
          <CardTop ville="tanger" image={Moughane} hotel="Moughane" day="5" price="2500" depart="25-02-2022"/>
          <CardTop ville="casablanca" image={Twin} hotel="Twin" day="7" price="2000" depart="25-02-2022"/>
      </Carousel>
    </section>
  )
}
export default Top;
