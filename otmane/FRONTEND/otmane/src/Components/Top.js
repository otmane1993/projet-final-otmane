import React from 'react';
import Card from './Card';
import CardTop from './CardTop';
import Farah from '../Images/Farah.png';
import Moughane from '../Images/Moughane.png';
import Twin from '../Images/Twin.png';
import {Link} from 'react-router-dom';
import { Carousel } from 'react-responsive-carousel';
import styles from 'react-responsive-carousel/lib/styles/carousel.min.css';

function Top() {
  return (
    <section className="Top">
        <h1>Nos Top Sejours</h1>
        {/*<div className="card-top">
          <Card ville="rabat" image={Farah} hotel="Farah"/>
          <Card ville="tanger" image={Moughane} hotel="Moughane"/>
          <Card ville="casablanca" image={Twin} hotel="Twin"/>
  </div>*/}
        <Carousel>         
          <CardTop ville="rabat" image={Farah} hotel="Farah" day="3" price="1500" ville="Casablanca" depart="22-02-2022"/>
          <CardTop ville="tanger" image={Moughane} hotel="Moughane" day="5" price="2500" ville="Tanger" depart="25-02-2022"/>
          <CardTop ville="casablanca" image={Twin} hotel="Twin" day="7" price="2000" ville="Fes" depart="25-02-2022"/>
        </Carousel>
    </section>
  )
}
export default Top;
