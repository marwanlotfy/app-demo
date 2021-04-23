import { Component } from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
} from "react-router-dom";

import './App.css';
import Users from './UI/Views/Users';
import Login from './UI/Views/Login';

class App extends Component{
  render(){
    return(
      <Router>
        <div className="App">
          <ul>
            <li>
              <Link to="/">Users</Link>
            </li>
            <li>
              <Link to="/login">Log In</Link>
            </li>
          </ul>

          <Switch>
            <Route path="/login">
              <Login {...this.props} />
            </Route>
            <Route path="/">
              <Users {...this.props} />
            </Route>
          </Switch>
        </div>
      </Router>
    );
  }
}

export default App;
