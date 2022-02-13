import React,{useState} from 'react';
import Twin from '../Twin.png';
import Moughane from '../Moughane.png';
import Farah from '../Farah.png';
import Card from './Card';
function Results(props) {
  //const [data,setData]=useState([]);
  return (
    <section className="results">
          {/*{console.log(props.data)}*/}
          {
            props.data.map((item)=>{

              return <Card day={item.day} price={item.price} hotel={item.hotel} ville={item.ville} image={item.image}/>
            })
          }
          {/*<Card ville="rabat" image={Farah} hotel="Farah"/>
          <Card ville="tanger" image={Moughane} hotel="Moughane"/>
        <Card ville="casablanca" image={Twin} hotel="Twin"/>*/}
    </section>
  )
}
export default Results;
