import React from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Redirect
} from "react-router-dom";
import { DataUsers } from './DataUsers';
import { NavBar } from './NavBar';
import { Footer } from './Footer';
export const Home = () => {
  return (
    <Router>
      <div id="app_container">
        <NavBar />
        <div className="cont_component">
          <Switch>
            <Route exact path="/userdata" component={DataUsers} /> 
            <Redirect to="/userdata" />
          </Switch>
        </div>
        <Footer />
      </div>
    </Router>
  )
}