import React from 'react';
import '../App.css';

function Search() {
  return (
    <section className="search">
        <form class="formulaire-search">
            <div className="form-group form-search">
                <label htmlFor="destination">Destination</label>
                <select name="destination" id="destination" className="form-control input-search">
                    <option>Rabat</option>
                    <option>Fes</option>
                    <option>Meknes</option>
                </select>
            </div>
            <div className="form-group form-search">
                <label htmlFor="depart">Depart</label>
                <input type="date" name="depart" id="depart" className="form-control input-search"/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="arrive">Arrive</label>
                <input type="date" name="arrive" id="arrive" className="form-control input-search"/>
            </div>
            <div className="form-group form-search">
                <label htmlFor="chambre">Chambres</label>
                <input type="text" name="chambre" id="chambre" className="form-control input-search" placeholder="1chambre,1adulte"/>
            </div>
            <div className="form-group form-search">
                <input type="submit" value="rechercher" className="form-control input-search"/>                        
            </div>
        </form>
    </section>
  )
}
export default Search;
