import React from 'react';
import Add from './ui/Add.ui.jsx';
import Export from './ui/Export.ui.jsx';
import Update from './ui/Update.ui.jsx';
import Logo from './ui/Logo.jsx';
import Delete from './ui/Delete.jsx';
import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';



export default class ActionBar extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            clientsUser: [],

        };
    }

    getClients(){
        let url =  "http://localhost:8000/Agence/"+this.props.context.params.id;
        $.getJSON(url, (data)=>{

            this.setState({
                clients:  data[0],
                loading: false
            });
        })
    }

    getClientsUser(){
        let url =  "http://localhost:8000/Agence/"+this.props.context.params.id + "/users";
        $.getJSON(url, (data)=>{

            let array = [];
            for (let i = 0; i < data.length; i++) {
                array.push(data[i]);
            }


            this.state = {
                clientsUser: array,
                loading: false
            };

        })
    }


    componentWillMount(){
        this.getClientsUser.call(this);
        this.getClients.call(this);
    }





    render() {
        return(
        <div className="container-actionBar-top" >
            <div className="container-actionBar">
                <Add />
                <Export />
                <Update />
            </div>
            <div className="container-groupe">
                <Logo client={this.state.clients} />
            </div>

        </div>
        );
    }
}

