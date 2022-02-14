import React,{useState} from 'react';
import {useNavigate,Navigate} from "react-router-dom";
import axios from 'axios';
import '../App.css';

function Login() {
  let navigate=useNavigate();
  const [state,setState]=useState({
    email:'',
    password:'',
    redirect:false,
    error:[],
  });
  const handleSubmit=(e)=>
  {
    e.preventDefault();
    axios.post('http://127.0.0.1:8000/api/login',state).then((res)=>{
      console.log(res.data);
      localStorage.setItem('token',res.data.api_token);
      setState({...state,redirect:true});
    })
    .catch((err)=>{
      console.log(err);
      if(err.response.status===401)
      {
          setState({...state,error:err.response.data.error});    
      }
    });
  }
  if(state.redirect)
  {
    return <Navigate to="/"/>;
  }
  //if(localStorage.getItem('token'))
  //{
  //  setState({...state,redirect:true});
  //}
  return (
    <>
        <form action="" className="container" onSubmit={handleSubmit}>
          <div className="form-group">
            <label for="email">Email address:</label>
            <input type="email" className={`form-control ${state.error && state.error.email ? "invalid-input":null}`} id="email" name="email" onChange={(e)=>{setState({...state,email:e.target.value})}}/>
            {(state.error && state.error.email)?<p className="invalid">{state.error.email[0]}</p>:''}
          </div>
          <div className="form-group">
            <label for="password">Password:</label>
            <input type="password" className={`form-control ${state.error && state.error.password ? "invalid-input":null}`} id="password" name="password" onChange={(e)=>{setState({...state,password:e.target.value})}}/>
            {(state.error && state.error.password)?<p className="invalid">{state.error.password[0]}</p>:''}
          </div>
          {(state.error && state.error=="Bad credentials")?<p className="invalid">{state.error}</p>:''}
          <div className="checkbox">
            <label><input type="checkbox"/> Remember me</label>
          </div>
          <button type="submit" className="btn btn-default">Submit</button>
        </form>
    </>
  )
}
export default Login;
