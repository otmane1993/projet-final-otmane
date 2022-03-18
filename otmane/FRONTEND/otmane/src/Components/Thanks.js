import React from 'react';
import Footer from './Footer';

function Thanks() {
  return (
    <>
      <section className="thanks">
        <h2 className="title-thanks">Merci pour ta reservation</h2>
        <p className="reser">La reservation s'est realise avec succes</p>
        <p className="reser"><span className="glyphicon glyphicon-envelope"></span>Un message vous sera envoye a votre boite Email bientot</p>
      </section>
      <Footer/>
    </>
  )
}
export default Thanks;