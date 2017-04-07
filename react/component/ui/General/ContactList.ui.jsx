import React from 'react';


import { Table, Icon } from 'semantic-ui-react'





export default class ContactList extends React.Component {



    sendMail(id, e){

        let url = "http://localhost:8000/send/client/"+ id;

        $.getJSON(url, (data)=>{
            console.log(data, e);
        })
    }



    constructor(props) {
        super(props);


    }


    componentWillMount() {

    }


    render() {
        return (
            <div className="container-contact-list">
                <h3>Liste des contacts</h3>

                <Table singleLine selectable celled>
                    <Table.Header>
                        <Table.Row>
                            <Table.HeaderCell>Nom</Table.HeaderCell>
                            <Table.HeaderCell>Prenom</Table.HeaderCell>
                            <Table.HeaderCell>Mail</Table.HeaderCell>
                            <Table.HeaderCell>Options</Table.HeaderCell>
                        </Table.Row>
                    </Table.Header>

                    <Table.Body>

                        {
                            this.props.clientsUser.map(function (x) {
                                return (<Table.Row className="cursor" >
                                        <Table.Cell>{x.ccNom}</Table.Cell>
                                        <Table.Cell>{x.ccPrenom}</Table.Cell>
                                        <Table.Cell>{x.ccMail}</Table.Cell>
                                        <Table.Cell>
                                            <Icon onClick={this.sendMail.bind(this, x.ccId)} data className="icon-mail-client-user" fitted bordered link name=' mail outline' />
                                        </Table.Cell>

                                    </Table.Row>


                                )
                            }.bind(this))
                        }

                    </Table.Body>
                </Table>

            </div>
        );
    }


}



