import React from 'react';
import '../App.css';
import Footer from './Footer';

function Nopage() {
  return (
    <>
      <div class="mainbox">
        <div class="err">404</div>
        <i class="far fa-question-circle fa-spin"></i>
        {/*<div class="err2">4</div>*/}
        <div class="msg"><p>Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first place?Let's go <a href="#">home</a> and try from there.</p></div>
      </div>
      <Footer/>
    </>
  )
}
export default Nopage;