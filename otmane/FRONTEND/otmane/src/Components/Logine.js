import React, { Component } from 'react';
import {Navigate} from 'react-router-dom';
import axios from 'axios';

class Logine extends Component {
    
  constructor() {
        super();
        this.state = {
            email:'',
            password:'',
            redirect:false,
            error:[],
          };
      }
      componentWillMount()
      {
          if(localStorage.getItem('token'))
          {
            this.setState({redirect:true});
          }
      }
  render(){ 
    const handleSubmit=(e)=>
    {
    e.preventDefault();
    axios.post('http://127.0.0.1:8000/api/login',this.state).then((res)=>{
      //console.log(res.data);
      localStorage.setItem('token',res.data.api_token);
      localStorage.setItem('login',true);
      if(localStorage.getItem('token'))
      {
      this.setState({redirect:true});
      }
    })
    .catch((err)=>{
      console.log(err);
      if(err.response.status===401)
      {
          this.setState({error:err.response.data.error});    
      }
    });
  }
  if(this.state.redirect)
  {
    return <Navigate to="/"/>;
  }
    return (
        <section className="section-login">
        <h1>Login:</h1>
        <form action="" className="container login-form" onSubmit={handleSubmit}>
          <div className="form-group">
            <label for="email">Email address:</label>
            <input type="email" className={`form-control ${this.state.error && this.state.error.email ? "invalid-input":null}`} id="email" name="email" placeholder="enter your email" onChange={(e)=>{this.setState({email:e.target.value})}}/>
            {(this.state.error && this.state.error.email)?<p className="invalid">{this.state.error.email[0]}</p>:''}
          </div>
          <div className="form-group">
            <label for="password">Password:</label>
            <input type="password" className={`form-control ${this.state.error && this.state.error.password ? "invalid-input":null}`} id="password" placeholder="enter your password" name="password" onChange={(e)=>{this.setState({password:e.target.value})}}/>
            {(this.state.error && this.state.error.password)?<p className="invalid">{this.state.error.password[0]}</p>:''}
          </div>
          {(this.state.error && this.state.error=="Bad credentials")?<p className="invalid">{this.state.error}</p>:''}
          <div className="checkbox">
            <label><input type="checkbox"/> Remember me</label>
          </div>
          <button type="submit" className="btn btn-primary btn-lg">Submit</button>
        </form>
    </section>
    )
  }
}
export default Logine;
