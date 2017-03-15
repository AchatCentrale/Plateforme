import React from 'react';
import ActionBar from './component/ActionBar.jsx';
import Dashboard from './component/page/dashboard/Dashboard.jsx';
import Exemple from './component/page/Exemple.jsx';
import ClientListe from './component/page/ClientListe.jsx';
import General from './component/page/client/General.jsx';
import Depenses from './component/page/client/Depenses.jsx';
import EtatClient from './component/page/client/EtatClient.jsx';
import Adresse from './component/page/client/Adresse.jsx';
import Hierarchie from './component/page/client/Hierarchie.jsx';
import Actions from './component/page/client/Actions.jsx';
import Sidebar from './component/ui/Sidebar.jsx';
import TopBar from './component/ui/TopBar.jsx';
import NavBar from './component/ui/NavBar.jsx';
import {render} from 'react-dom';
import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';

import { Table } from 'semantic-ui-react'



class App extends React.Component {



    getTheUser(){
        let url = "http://localhost:8000/who";

        $.getJSON(url, (data)=>{
            console.log(data );
            this.setState({
                user:  data,

            });
        })


    }


    constructor(props){

        super(props);
        this.state = {
            user : ''
        }
    }


    componentDidMount(){
        this.getTheUser.call(this);

    }


    render() {



        return (

            <div>
                <TopBar />

                <div className="continer-nav-bar">
                    <NavBar />
                </div>
                <div className="container-content">

                    <div className="container-page" >
                        {this.props.children}
                    </div>
                </div>

            </div>
        );
    }
}



render((
    <Router history={browserHistory}>

        <Route path="/" component={App}>
            <IndexRoute component={Dashboard} />
            <Route path="/client" component={ClientListe}/>
            <Route path="/client/:id" component={General}/>
        </Route>
    </Router>
), document.getElementById('app'));