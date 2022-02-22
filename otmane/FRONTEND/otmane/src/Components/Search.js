import React,{useState,useEffect} from 'react';
import axios from 'axios';
import '../App.css';

function Search(props) {
    const handleRoom=()=>
    {
        alert(<button></button>);
    }
    const handleSubmit=(e)=>
    {
        e.preventDefault();
        //setShow(true);
        props.change(true);
        axios.post('http://127.0.0.1:8000/api/search',input)
        .then((res)=>{
            //console.log(res.data);
            setData(res.data);
            //props.fetch(data);
        });
    }
    const [data,setData]=useState([]);
    const [mounted,setMounted]=useState(false);
    const [date,setDate]=useState('2022-02-22');
    const [datee,setDatee]=useState('2022-02-23');
    const [input,setInput]=useState({
        destination:'Selectionnez une ville',
        depart:'',
        arrive:'',
        chambre:'',
        sejour:0,
        villes:[],
    });
    const formDate=()=>
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
    }
    if(!mounted)
    {
        //formDate();
        axios.get('http://127.0.0.1:8000/api/villes').then((res)=>{
            //console.log(res.data);
            setInput({...input,villes:res.data});
        });
    }

    useEffect(()=>{
        setMounted(true);  
    },[]);
    useEffect(()=>{
        props.fetch(data);  
    },[data]);
  return (
    <section className="search">
        <form class="formulaire-search" onSubmit={handleSubmit}>
            <div className="form-group form-search">
                <label htmlFor="destination">Destination</label>
                <select name="destination" value={input.destination} id="destination" className="form-control input-search" onChange={(e)=>{setInput({...input,destination:e.target.value})}}>
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
                <input type="date" value={date} name="depart" id="depart" className="form-control input-search" onChange={(e)=>{setInput({...input,depart:e.target.value})}}/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="arrive">Arrive</label>
                <input type="date" name="arrive" value={datee} id="arrive" className="form-control input-search" onChange={(e)=>{setInput({...input,arrive:e.target.value})}}/>
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
