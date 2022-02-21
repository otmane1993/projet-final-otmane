import React,{useState} from 'react';
import '../App.css';
import Search from './Search';
import Top from './Top';
import Results from './Results';
import Footer from './Footer';

function Index() {
  const [show,setShow]=useState(false);
  const [data,setData]=useState([]);
  //const changeShowe=(bool)=>
  //{
  //  setShowe(bool);
  //}
  return (
    <>
        <Search change={(bool)=>{setShow(bool)}} fetch={(array)=>{setData(array)}}/>
        {(show)?<Results data={data}/>:null}
        <Top/>
        <Footer/>
    </>
  )
}
export default Index;