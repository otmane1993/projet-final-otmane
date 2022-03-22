import React from 'react';
import '../App.css';
import Footer from './Footer';

function Nopage() {
  return (
    <>
      <div className="mainbox">
        <div className="err">Error 404</div>
        <i className="far fa-question-circle fa-spin"></i>
        {/*<div class="err2">4</div>*/}
        <div className="msg"><p>Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first place?Let's go <a href="#">home</a> and try from there.</p></div>
      </div>
      <Footer/>
    </>
  )
}
export default Nopage;