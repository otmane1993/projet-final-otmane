import React,{useState} from 'react';
import Twin from '../Twin.png';
import Moughane from '../Moughane.png';
import Farah from '../Farah.png';
import Card from './Card';
function Results(props) {
  //const [data,setData]=useState([]);
  return (
    <section className="results">
          {console.log(props.data)}
          {
            props.data.map((item)=>{
              <Card day={props.data.day} price={props.data.price} hotel={props.data.hotel} ville={props.data.ville} image={props.data.image}/>
            })
          }
          {/*<Card ville="rabat" image={Farah} hotel="Farah"/>
          <Card ville="tanger" image={Moughane} hotel="Moughane"/>
        <Card ville="casablanca" image={Twin} hotel="Twin"/>*/}
    </section>
  )
}
export default Results;
