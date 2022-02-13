import React,{useState,useEffect} from 'react';
import axios from 'axios';
import '../App.css';

function Search(props) {
    const handleSubmit=(e)=>
    {
        e.preventDefault();
        //setShow(true);
        props.change(true);
        axios.get('http://127.0.0.1:8000/api/sejours')
        .then((res)=>{
            //console.log(res.data);
            setData(res.data);
            //props.fetch(data);
        });
    }
    const [data,setData]=useState([]);
    useEffect(()=>{
        props.fetch(data);  
    },[data]);
  return (
    <section className="search">
        <form class="formulaire-search" onSubmit={handleSubmit}>
            <div className="form-group form-search">
                <label htmlFor="destination">Destination</label>
                <select name="destination" id="destination" className="form-control input-search">
                    <option>Rabat</option>
                    <option>Fes</option>
                    <option>Meknes</option>
                </select>
            </div>
            <div className="form-group form-search">
                <label htmlFor="depart">Depart</label>
                <input type="date" name="depart" id="depart" className="form-control input-search"/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="arrive">Arrive</label>
                <input type="date" name="arrive" id="arrive" className="form-control input-search"/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="chambre">Chambres</label>
                <input type="text" name="chambre" id="chambre" className="form-control input-search" placeholder="1chambre,1adulte"/>
            </div>
            <div className="form-group form-search">
                <input type="submit" value="rechercher" className="form-control input-search"/>                        
            </div>
        </form>
    </section>
  )
}
export default Search;
