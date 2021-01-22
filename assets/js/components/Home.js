import React from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect
} from "react-router-dom";
import { DataUsers } from './DataUsers';
import { NavBar } from './NavBar';
export const Home = () => {
  return (
    <Router>
      <div id="app_container">
        <NavBar />
        <div className="container">
          <Switch>
            <Route exact path="/userdata" component={DataUsers} /> 
            <Redirect to="/userdata" />
          </Switch>
        </div>
      </div>
    </Router>
  )
}