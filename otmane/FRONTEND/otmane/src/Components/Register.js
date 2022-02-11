import React from 'react';
import '../App.css';

function Register() {
  return (
    <>
        <form action="" className="container">
        <div className="form-group">
            <label htmlFor="firstname">Firstname:</label>
            <input type="text" className="form-control" id="firstname"/>
          </div>
          <div className="form-group">
            <label htmlFor="lastname">Lastname:</label>
            <input type="text" className="form-control" id="lastname"/>
          </div>
          <div className="form-group">
            <label htmlFor="email">Email address:</label>
            <input type="email" class="form-control" id="email"/>
          </div>
          <div className="form-group">
            <label htmlFor="password">Password:</label>
            <input type="password" className="form-control" id="password"/>
          </div>
          <div className="form-group">
            <label htmlFor="confirm">Confirm Password:</label>
            <input type="password" className="form-control" id="confirm"/>
          </div>
          <button type="submit" className="btn btn-default">Register</button>
        </form>
    </>
  )
}
export default Register;