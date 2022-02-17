import React from 'react';

function Modify() {
  return (
    <form method="POST">
      <div className="form-group">
        <label htmlFor="password">Changer Mot de passe</label>
        <input type="text" name="password" id="password" className="form-control"/>
      </div>
      <div className="form-group">
        <label htmlFor="firstname">Changer Firstname</label>
        <input type="text" name="firstname" id="firstname" className="form-control"/>
      </div>
      <div className="form-group">
        <label htmlFor="firstname">Changer Firstname</label>
        <input type="text" name="firstname" id="firstname" className="form-control"/>
      </div>
      <div>
        <input type="submit" value="modify"/>
      </div>
    </form>
  )
}
export default Modify;