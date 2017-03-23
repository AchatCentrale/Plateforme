import React from 'react';
import Sidebar from '../../ui/Sidebar.jsx';
import ActionBar from '../../../component/ActionBar.jsx';
import AgenceAdresse from '../../ui/Adresse/AgenceAdresse.jsx';





import { Input, Label, Menu, Loader} from 'semantic-ui-react'

import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';




export default class Adresse extends React.Component {






    getClients(){
        let url =  "http://localhost:8000/Agence/"+this.props.params.id;
        $.getJSON(url, (data)=>{

            this.setState({
                clients:  data[0],
                loading: false

            });
        })
    }


    getAdresseLivraison(){

        let url =  "http://localhost:8000/Agence/"+this.props.params.id+ "/adresse/L";
        $.getJSON(url, (data)=>{

            this.setState({
                AdresseLivraison:  data[0],


            });
        })


    }
    getAdresseFacturation(){

        let url =  "http://localhost:8000/Agence/"+this.props.params.id+ "/adresse/F";
        $.getJSON(url, (data)=>{

            this.setState({
                AdresseFacturation:  data[0],


            });
        })


    }



    constructor(props) {
        super(props);


        this.state = {
            clients: [],
            AdresseLivraison : [],
            AdresseFacturation : [],
            loading: true
        };


    }
    componentWillMount(){
        this.getClients.call(this);
        this.getAdresseLivraison.call(this);
        this.getAdresseFacturation.call(this);

    }


    render() {

        let currentLocation = this.props;

        if(this.state.loading){
            return(
                <div>
                    <Loader active size='large'>Loading</Loader>
                </div>
            )
        }else{
            return(
                <div>
                    <ActionBar context={this.props} />
                    <div className="container-general" >
                        <div className="container-info-client">
                            <AgenceAdresse adresseF={this.state.AdresseFacturation}  adresseL={this.state.AdresseLivraison} client={this.state.clients} context={currentLocation} />
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



