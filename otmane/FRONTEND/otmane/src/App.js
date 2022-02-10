import './App.css';
import Nav from './Components/Nav';
import { BrowserRouter,Link,Route,Switch } from "react-router-dom";
function App() {
  return (
    <div className="App">
      <header>
        <img src=''/>
        <nav>
            <ul>
                <li>
                    <Link to="/login">Login</Link>
                </li>
                <li>
                    <Link to="/register">Register</Link>
                </li>
                <li>
                    <Link to="/help">Help</Link>
                </li>
            </ul>
            <Route path="/login"><Login/></Route>
            <Route path="/register"><Register/></Route>
            <Route path="/help"><Help/></Route>
        </nav>
        <p>Otmane KSAANI</p>
      </header>
    </div>
  );
}

export default App;
