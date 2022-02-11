import React,{useState} from 'react';
import '../App.css';

function Login() {
  const [state,setState]=useState({
    email:'',
    password:'',
  });
  return (
    <>
        <form action="" className="container" onSubmit={(e)=>{e.preventDefault()}}>
          <div className="form-group">
            <label for="email">Email address:</label>
            <input type="email" className="form-control" id="email" name="email" onChange={(e)=>{setState({...state,email:e.target.value})}}/>
          </div>
          <div className="form-group">
            <label for="password">Password:</label>
            <input type="password" className="form-control" id="password" name="password" onChange={(e)=>{setState({...state,password:e.target.value})}}/>
          </div>
          <div className="checkbox">
            <label><input type="checkbox"/> Remember me</label>
          </div>
          <button type="submit" className="btn btn-default">Submit</button>
        </form>
    </>
  )
}
export default Login;
