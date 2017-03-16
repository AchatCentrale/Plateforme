import React from 'react';
import Info from '../../ui/General/info.ui.jsx'
import ContactList from '../../ui/General/ContactList.ui.jsx'
import Sidebar from '../../ui/Sidebar.jsx';
import ActionBar from '../../../component/ActionBar.jsx';


import Loader from '../../ui/Loader.jsx';


import { Input, Label, Menu } from 'semantic-ui-react'

import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';




export default class General extends React.Component {


    getClients(){
        let url =  "http://localhost:8000/Agence/"+this.props.params.id;
        $.getJSON(url, (data)=>{

            this.setState({
                clients:  data[0],
                loading: false
            });
        })
    }

    getClientsUser(){
        let url =  "http://localhost:8000/Agence/"+this.props.params.id + "/users";
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

    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            clientsUser: [],
            loading: true
        };
    }
    componentWillMount(){
        this.getClientsUser.call(this);
        this.getClients.call(this);
    }


    render() {

        let currentLocation = this.props;


        if(this.state.loading){
            return(
                <div>
                    <Loader isActive={true}/>
                </div>
            )
        }else{
            return(
                <div>
                    <ActionBar context={this.props} />
                <div className="container-general" >
                   <div className="container-info-client">
                       <Info clients={this.state.clients}   />
                       <ContactList clientsUser={this.state.clientsUser} />
                   </div>
                    <div className="container-sidebar">

                        <Menu pointing vertical>
                            <Sidebar content="General" context={currentLocation} />
                            <Sidebar content="Adresse" context={currentLocation} />
                            <Sidebar content="Status" context={currentLocation} />
                            <Sidebar content="Dépenses" context={currentLocation} />
                            <Sidebar content="Actions" context={currentLocation} />
                            <Sidebar content="Hierarchie" context={currentLocation} />
                        </Menu>


                    </div>
                </div>
                </div>
            );
        }
    }
}

