import React from "react";
import Sidebar from "../../ui/Sidebar.jsx";
import ActionBar from "../../../component/ActionBar.jsx";


import {Label, Menu, Segment, Table, Grid, Icon} from "semantic-ui-react";



export default class Actions extends React.Component {


    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            clientsUser: [],

        };
    }

    componentWillMount() {

    }


    render() {

        let currentLocation = this.props;


        return (
            <div>
                <ActionBar context={this.props}/>
                <div className="container-general">


                    <Grid columns='equal'>
                        <Grid.Column width={12}>


                            <div className="container-client-action">
                                <h1>Historiques des actions</h1>

                                <Segment>

                                    <Menu>
                                        <Menu.Item className="cursor" name='En cours' onClick={this.handleItemClick}/>
                                        <Menu.Item className="cursor" name='Terminé' onClick={this.handleItemClick}/>
                                        <Menu.Item className="cursor" name='Délégués' onClick={this.handleItemClick}/>
                                    </Menu>
                                    <br/>
                                    <Table celled>
                                        <Table.Header>
                                            <Table.Row>
                                                <Table.HeaderCell>Date d'échéance</Table.HeaderCell>
                                                <Table.HeaderCell>Type</Table.HeaderCell>
                                                <Table.HeaderCell>Description</Table.HeaderCell>
                                                <Table.HeaderCell>Priorité</Table.HeaderCell>
                                                <Table.HeaderCell>Nom Agence</Table.HeaderCell>
                                                <Table.HeaderCell>Action achevé ?</Table.HeaderCell>
                                            </Table.Row>
                                        </Table.Header>

                                        <Table.Body>
                                            <Table.Row>
                                                <Table.Cell>28-10-2016</Table.Cell>
                                                <Table.Cell>Relance</Table.Cell>
                                                <Table.Cell >Relancer suite devis envoyé</Table.Cell>
                                                <Table.Cell > <Label color='red' as='a'>1</Label></Table.Cell>
                                                <Table.Cell >ROC ECLERC PARIS ORDENER</Table.Cell>
                                                <Table.Cell >
                                                    <Icon className="cursor" name="checkmark" circular />
                                                </Table.Cell>
                                            </Table.Row>

                                            <Table.Row>
                                                <Table.Cell>28-10-2016</Table.Cell>
                                                <Table.Cell>Relance</Table.Cell>
                                                <Table.Cell >Relancer suite devis envoyé</Table.Cell>
                                                <Table.Cell > <Label color='red' as='a'>1</Label></Table.Cell>
                                                <Table.Cell >ROC ECLERC PARIS ORDENER</Table.Cell>
                                                <Table.Cell >
                                                    <Icon className="cursor" name="checkmark" circular />
                                                </Table.Cell>
                                            </Table.Row>


                                            <Table.Row>
                                                <Table.Cell>28-10-2016</Table.Cell>
                                                <Table.Cell>Relance</Table.Cell>
                                                <Table.Cell >Relancer suite devis envoyé</Table.Cell>
                                                <Table.Cell > <Label color='red' as='a'>1</Label></Table.Cell>
                                                <Table.Cell >ROC ECLERC PARIS ORDENER</Table.Cell>
                                                <Table.Cell >
                                                    <Icon className="cursor" name="checkmark" circular />
                                                </Table.Cell>
                                            </Table.Row>


                                        </Table.Body>
                                    </Table>


                                </Segment>


                            </div>


                        </Grid.Column>
                        <Grid.Column>


                            <div className="container-sidebar">

                                <Menu pointing vertical>
                                    <Sidebar content="General" context={currentLocation}/>
                                    <Sidebar content="Adresse" context={currentLocation}/>
                                    <Sidebar content="Status" context={currentLocation}/>
                                    <Sidebar content="Dépenses" context={currentLocation}/>
                                    <Sidebar content="Actions" context={currentLocation}/>
                                    <Sidebar content="Historique" context={currentLocation}/>
                                </Menu>


                            </div>


                        </Grid.Column>
                    </Grid>


                </div>
            </div>
        );
    }

}



