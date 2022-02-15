import React,{useState} from 'react';
import axios from 'axios';
import {useNavigate,Navigate} from "react-router-dom";
import '../App.css';

function Register() {
  let navigate = useNavigate();
  const [state,setState]=useState({
    firstname:'',
    lastname:'',
    email:'',
    password:'',
    confirm:'',
    redirect:false,
    error:[],
  });
  const handleSubmit=(e)=>
  {
    e.preventDefault();
    axios.post('http://127.0.0.1:8000/api/register',state).then((res)=>{
      console.log(res.data);
      //localStorage.setItem('token',res.data.api_token);
      setState({...state,redirect:true});
    })
    .catch((err)=>{
     if(err.response.status===401)
     {
        setState({...state,error:err.response.data.error});    
     }
    });
  }
  if(state.redirect)
  {
    return <Navigate to="/login"/>;
  }
  //if(localStorage.getItem('token'))
  //{
  //  setState({...state,redirect:true});
  //}
  return (
    <section className="section-register">
        <h1>Register:</h1>
        <form action="" method="POST" onSubmit={handleSubmit} className="container register-form">
        <div className="form-group">
            <label htmlFor="firstname">Firstname:</label>
            <input type="text" className={`form-control ${state.error && state.error.firstname ? "invalid-input":null}`} id="firstname" name="firstname" onChange={(e)=>{setState({...state,firstname:e.target.value})}}/>
            {(state.error && state.error.firstname)?<p class="invalid">{state.error.firstname[0]}</p>:''}
          </div>
          <div className="form-group">
            <label htmlFor="lastname">Lastname:</label>
            <input type="text" className={`form-control ${state.error && state.error.lastname ? "invalid-input":null}`} id="lastname" name="lastname" onChange={(e)=>{setState({...state,lastname:e.target.value})}}/>
            {(state.error && state.error.lastname)?<p class="invalid">{state.error.lastname[0]}</p>:''}
          </div>
          <div className="form-group">
            <label htmlFor="email">Email address:</label>
            <input type="email" class={`form-control ${state.error && state.error.email ? "invalid-input":null}`} id="email" name="email" onChange={(e)=>{setState({...state,email:e.target.value})}}/>
            {(state.error && state.error.email)?<p class="invalid">{state.error.email[0]}</p>:''}
          </div>
          <div className="form-group">
            <label htmlFor="password">Password:</label>
            <input type="password" className={`form-control ${state.error && state.error.password ? "invalid-input":null}`} id="password" name="password" onChange={(e)=>{setState({...state,password:e.target.value})}}/>
            {(state.error && state.error.password)?<p class="invalid">{state.error.password[0]}</p>:''}
          </div>
          <div className="form-group">
            <label htmlFor="confirm">Confirm Password:</label>
            <input type="password" className={`form-control ${state.error && state.error.confirm ? "invalid-input":null}`} id="confirm" name="confirm" onChange={(e)=>{setState({...state,confirm:e.target.value})}}/>
            {(state.error && state.error.confirm)?<p class="invalid">{state.error.confirm[0]}</p>:''}
          </div>
          <button type="submit" className="btn btn-default">Register</button>
        </form>
    </section>
  )
}
export default Register;