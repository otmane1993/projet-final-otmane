import React,{useState} from 'react';
import '../App.css';

function Register() {
  const [state,setState]=useState({
    firstname:'',
    lastname:'',
    email:'',
    password:'',
    confirm:'',
  });
  return (
    <>
        <form action="" method="POST" onSubmit={(e)=>{e.preventDefault();}} className="container">
        <div className="form-group">
            <label htmlFor="firstname">Firstname:</label>
            <input type="text" className="form-control" id="firstname" name="firstname" onChange={(e)=>{setState({...state,firstname:e.target.value})}}/>
          </div>
          <div className="form-group">
            <label htmlFor="lastname">Lastname:</label>
            <input type="text" className="form-control" id="lastname" onChange={(e)=>{setState({...state,lastname:e.target.value})}}/>
          </div>
          <div className="form-group">
            <label htmlFor="email">Email address:</label>
            <input type="email" class="form-control" id="email" onChange={(e)=>{setState({...state,email:e.target.value})}}/>
          </div>
          <div className="form-group">
            <label htmlFor="password">Password:</label>
            <input type="password" className="form-control" id="password" onChange={(e)=>{setState({...state,password:e.target.value})}}/>
          </div>
          <div className="form-group">
            <label htmlFor="confirm">Confirm Password:</label>
            <input type="password" className="form-control" id="confirm" onChange={(e)=>{setState({...state,confirm:e.target.value})}}/>
          </div>
          <button type="submit" className="btn btn-default">Register</button>
        </form>
    </>
  )
}
export default Register;