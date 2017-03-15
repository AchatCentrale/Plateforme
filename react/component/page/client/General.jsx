import React from 'react';
import Info from '../../ui/General/info.ui.jsx'
import ContactList from '../../ui/General/ContactList.ui.jsx'

import Loader from '../../ui/Loader.jsx';






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
        if(this.state.loading){
            return(
                <div>
                    <Loader isActive={true}/>
                </div>
            )
        }else{
            return(
                <div className="container-general" >
                    <Info clients={this.state.clients}   />
                    <ContactList clientsUser={this.state.clientsUser} />
                </div>
            );
        }
    }
}

