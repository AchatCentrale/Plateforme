import React from 'react';
import Info from '../../ui/General/info.ui.jsx'
import ContactList from '../../ui/General/ContactList.ui.jsx'






export default class General extends React.Component {



    getClients(){
        let url =  "http://localhost:8000/Agence/"+this.props.params.id;
        $.getJSON(url, (data)=>{
            console.log(data)
            console.log(data[0].clActivite);

            this.setState({
                clients:  data[0]
            });
        })
    }


    constructor(props) {
        super(props);

        this.state = {
            clients: []
        };
    }


    componentWillMount(){

        this.getClients.call(this);

    }


    render() {
        return(
            <div className="container-general" >
                <Info clients={this.state.clients}  />
                <ContactList />
            </div>
        );
    }
}

