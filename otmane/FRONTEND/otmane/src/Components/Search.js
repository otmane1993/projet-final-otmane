import React,{useState,useEffect} from 'react';
import axios from 'axios';
import '../App.css';
import Flatpickr from "react-flatpickr";
import "flatpickr/dist/themes/material_green.css";

function Search(props) {
    const handleRoom=()=>
    {
        alert(<button></button>);
    }
    const handleSubmit=(e)=>
    {
        e.preventDefault();
        setSubmited(true);
        props.change(true);
        axios.post('http://127.0.0.1:8000/api/search',input)
        .then((res)=>{
            if(res.status===201)
            {
                setError(res.data);
                setMessageError('Fill in the empty fields');
                setMessage('');
                setData([]);
            }
            else{
               setData(res.data);
               setSwitcha(!switcha);
               setError(
                {error:{
                    destination:'',
                    depart:'',
                    arrive:'',
                }}
               );
               setMessageError('');
            }
        })
    }
    const [data,setData]=useState([]);
    const [submited,setSubmited]=useState(false);
    const [switche,setSwitche]=useState(false);
    const [switcha,setSwitcha]=useState(false);
    const [mounted,setMounted]=useState(false);
    const [date,setDate]=useState('');
    const [message,setMessage]=useState('');
    const [messageError,setMessageError]=useState('');  
    const [datee,setDatee]=useState('');
    const [error,setError]=useState({
        error:{
            destination:'',
            depart:'',
            arrive:'',
        }
    });
    const [input,setInput]=useState({
        destination:'Selectionnez une ville',
        depart:'',
        arrive:'',
        chambre:1,
        sejour:0,
        villes:[],
    });
    if(!mounted)
    {
        axios.get('http://127.0.0.1:8000/api/villes').then((res)=>{
            setInput({...input,villes:res.data});
            axios.get('http://127.0.0.1:8000/api/date').then((rese)=>{
            setDate(rese.data.depart);
            setDatee(rese.data.arrive);
            setTimeout(()=>{setSwitche(true)},100);  
        })
        });
    }
    useEffect(()=>{
        setMounted(true);  
    },[]);
    useEffect(()=>{
        if(submited)
        {
        if(data.length===0)
        {
                setMessage('There is no sejour Available for this date and this city');
                setMessageError('');
        }
        else
        {
                setMessage('');
        }
    }       
    },[switcha]);
    useEffect(()=>{
        setInput({...input,depart:date});
    },[date]);
    useEffect(()=>{
        setInput({...input,arrive:datee});
    },[datee]);
    useEffect(()=>{
        props.mess(message);
   },[message]);
    useEffect(()=>{
         props.error(messageError);
    },[messageError]);
    useEffect(()=>{
        props.fetch(data);  
    },[data]);
  return (
    <section className="search">
        <form class="formulaire-search" method="POST" onSubmit={handleSubmit}>
            <div className="form-group form-search">
                <label htmlFor="destination">Destination</label>
                <select name="destination" value={input.destination} id="destination" className={(error.error.destination?"is-invalid ":"")+"form-control input-search"} onChange={(e)=>{setInput({...input,destination:e.target.value})}}>
                    <option className="hidden-option" value="Selectionnez une ville">Selectionnez une ville</option>
                    {input.villes.map((item)=>{
                        return <option value={item.name_ville}>{item.name_ville}</option>
                    })}
                </select>
            </div>
            <div className="form-group form-search">
                <label htmlFor="depart">Depart</label>
                <input type="date" value={input.depart} name="depart" id="depart" className={(error.error.depart?"is-invalid ":"")+"form-control input-search"} onChange={(e)=>{setDate(e.target.value);setInput({...input,depart:e.target.value})}}/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="arrive">Arrive</label>
                <input type="date" name="arrive" value={input.arrive} id="arrive" className={(error.error.arrive?"is-invalid ":"")+"form-control input-search"} onChange={(e)=>{setDatee(e.target.value);setInput({...input,arrive:e.target.value})}}/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="chambre">Chambres</label>
                <select name="chambre" id="chambre" className="form-control input-search" onChange={(e)=>{setInput({...input,chambre:e.target.value})}}>
                    <option value="1">1 chambre</option>
                    <option value="2">2 chambre</option>
                    <option value="3">3 chambre</option>
                </select>
            </div>
            <div className="form-group form-search">
                <input type="submit" value="rechercher" className="form-control input-search"/>                        
            </div>
        </form>
    </section>
  )
}
export default Search;
