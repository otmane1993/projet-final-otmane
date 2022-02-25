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
        //setShow(true);
        setSubmited(true);
        props.change(true);
        axios.post('http://127.0.0.1:8000/api/search',input)
        .then((res)=>{
            //console.log(res.data);
            if(res.status===201)
            {
                //console.log(res.data);
                setError(res.data);
                setData([]);
            }
            else{
               setData(res.data);
               setSwitcha(!switcha);
               /*if(data.length===0)
               {
                    setMessage('There is no sejour Available for this date and this city');
                    //console.log('mou3e');
               }
               else
               {
                    setMessage('');
               }*/
               setError(
                {error:{
                    destination:'',
                    depart:'',
                    arrive:'',
                }}
               ); 
            }
            //props.fetch(data);
        })



        /*const token=localStorage.getItem('token');
        axios.post('http://127.0.0.1:8000/api/search',input, {
          headers: {
              'Content-Type': 'application/json',
              'Authorization': 'Bearer '+token
          },      
        })      
        .then((res) => {
            console.log(res.data);
            setData(res.data);
        })
        .catch((error) => {
            //console.log(error);
            if(error.response.status===401)
            {
                console.log(error);
            }
        })
        /*.catch((err)=>{
            console.log(err);
            
        });*/


        
    }
    const [data,setData]=useState([]);
    const [submited,setSubmited]=useState(false);
    const [switche,setSwitche]=useState(false);
    const [switcha,setSwitcha]=useState(false);
    const [mounted,setMounted]=useState(false);
    //const [dat,setDat]=useState(new Date());
    const [date,setDate]=useState('');
    const [message,setMessage]=useState('');
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
    /*const formDate=()=>
    {
        const d=new Date();
        let dd=d.getDate();
        let ddd=dd+1;
        let mm=d.getMonth()+1;
        let yy=d.getFullYear();
        if(dd<10)
        {
            dd='0'+dd;
        }
        if(ddd<10)
        {
            ddd='0'+ddd;
        }
        if(mm<10)
        {
            mm='0'+mm;
        }
        let newDate=yy+'-'+mm+'-'+dd;
        let newDatee=yy+'-'+mm+'-'+ddd;
        setDate(newDate);
        setDatee(newDatee);
    }*/
    if(!mounted)
    {
        //formDate();
        axios.get('http://127.0.0.1:8000/api/villes').then((res)=>{
            //console.log(res.data);
            setInput({...input,villes:res.data});
        //}).then((res)=>{
            axios.get('http://127.0.0.1:8000/api/date').then((rese)=>{
            //console.log(rese.data);
            setDate(rese.data.depart);
            setDatee(rese.data.arrive);
            setTimeout(()=>{setSwitche(true)},100);
            /*setInput({...input,depart:date});
            setInput({...input,arrive:datee});*/   
        })
        });
    }
    /*useState(()=>{
        setInput({...input,depart:250,arrive:300});
        setTimeout(()=>{console.log(date)},1000);  
    },[switche]);*/
    /*useState(()=>{
        setInput({...input,arrive:datee});
        console.log('Arrive');
    },[datee]);*/
    useEffect(()=>{
        setMounted(true);  
    },[]);
    useEffect(()=>{
        if(submited)
        {
        if(data.length===0)
        {
                setMessage('There is no sejour Available for this date and this city');
                //console.log('mou3e');
                //props.mess(message);
        }
        else
        {
                setMessage('');
        }
        props.mess(message);
        //console.log('boubou');
    }       
    },[switcha]);
    useEffect(()=>{
        props.fetch(data);
        //props.mess(message);  
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
                    {/*<option>Rabat</option>
                    <option>Fes</option>
                    <option>Meknes</option>*/}
                </select>
            </div>
            <div className="form-group form-search">
                <label htmlFor="depart">Depart</label>
                <input type="date" value={date} name="depart" id="depart" className={(error.error.depart?"is-invalid ":"")+"form-control input-search"} onChange={(e)=>{setDate(e.target.value);setInput({...input,depart:e.target.value})}}/>
                {/*<Flatpickr data-enable-time options={{altFormat:'d M Y',dateFormat:'Y-m-d'}} value={input.depart} onChange={(e) => { setInput({...input,depart:e.target.value}); }}/>*/}
            </div>
            <div className="form-group form-search">
                <label htmlFor="arrive">Arrive</label>
                <input type="date" name="arrive" value={datee} id="arrive" className={(error.error.arrive?"is-invalid ":"")+"form-control input-search"} onChange={(e)=>{setDatee(e.target.value);setInput({...input,arrive:e.target.value})}}/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="chambre">Chambres</label>
                {/*<input type="text" name="chambre" id="chambre" className="form-control input-search" placeholder="1chambre,1adulte"/>*/}
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
