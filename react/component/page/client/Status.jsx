import React from "react";
import Sidebar from "../../ui/Sidebar.jsx";
import ActionBar from "../../../component/ActionBar.jsx";


import {Button, Grid, Header, Icon, Input, Label, Loader, Menu, Progress, Table} from "semantic-ui-react";

import {browserHistory, IndexRedirect, IndexRoute, Link, Redirect, Route, Router} from "react-router";


export default class Status extends React.Component {


    constructor(props) {
        super(props);


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


                            <div className="container-info-client">


                                <div className="container-info-progression">
                                    <Grid divided='vertically'>
                                        <Grid.Row columns={2}>
                                            <Grid.Column>
                                                <div className="container-info-gauche-status">
                                                    <div className="col-gauche-info">
                                                        <p>Status</p>
                                                        <p>Date d'inscription</p>
                                                        <p>Date d'adhésion</p>
                                                        <p>Date d'echeance</p>
                                                        <p>Ancienneté</p>
                                                    </div>

                                                    <div className="col-droite-info">
                                                        <p>
                                                            <Label color='orange'>
                                                                Prospect
                                                            </Label>
                                                        </p>
                                                        <p>
                                                            <Label>
                                                                26/12/2016
                                                            </Label>
                                                        </p>
                                                        <p>
                                                            <Label>
                                                                02/01/2017
                                                            </Label>
                                                        </p>
                                                        <p>
                                                            <Label>
                                                                2 mois
                                                            </Label>
                                                        </p>
                                                        <p>
                                                            <Label>
                                                                02/01/2017
                                                            </Label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </Grid.Column>
                                            <Grid.Column>
                                                <div className="container-info-gauche-progress">
                                                    <Grid divided='vertically'>
                                                        <Grid.Row columns={2}>
                                                            <Grid.Column>
                                                                <p>Numero d'adhésion</p>
                                                            </Grid.Column>
                                                            <Grid.Column>
                                                                <p>
                                                                    <Label color='grey'>
                                                                        15618-1681
                                                                    </Label>
                                                                </p>
                                                            </Grid.Column>
                                                        </Grid.Row>

                                                    </Grid>

                                                    <Progress percent={60} color="olive" warning progress/>
                                                </div>
                                            </Grid.Column>
                                        </Grid.Row>

                                    </Grid>
                                </div>

                                <div className="container-info-action">
                                    <Header as='h2'>
                                        <Icon name='history'/>
                                        <Header.Content>
                                            Historique des actions
                                        </Header.Content>
                                    </Header>

                                    <div className="container-info-action-table">
                                        <Table definition>
                                            <Table.Header>
                                                <Table.Row>
                                                    <Table.HeaderCell>Nom de l'action</Table.HeaderCell>
                                                    <Table.HeaderCell>Status</Table.HeaderCell>
                                                    <Table.HeaderCell>Responsable</Table.HeaderCell>
                                                    <Table.HeaderCell>Action</Table.HeaderCell>
                                                    <Table.HeaderCell>Autre</Table.HeaderCell>
                                                </Table.Row>
                                            </Table.Header>

                                            <Table.Body>



                                                <Table.Row>
                                                    <Table.Cell>Audit</Table.Cell>
                                                    <Table.Cell>
                                                        <Icon name='checkmark'/>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <p>
                                                            <Label>
                                                                <Icon name="user"/>Morgane
                                                            </Label>
                                                        </p>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <Button.Group>
                                                            <Button positive>Action effectué</Button>
                                                            <Button.Or text='ou' />
                                                            <Button >Mettre en attente</Button>
                                                        </Button.Group>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <Icon className='cursor' name='file pdf outline'/>
                                                    </Table.Cell>
                                                </Table.Row>



                                                <Table.Row>
                                                    <Table.Cell>Envoi code d'acces</Table.Cell>
                                                    <Table.Cell>
                                                        <Icon name='wait'/>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <p>
                                                            <Label>
                                                                <Icon name="user"/>Morgane
                                                            </Label>
                                                        </p>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <Button.Group>
                                                            <Button positive>Action effectué</Button>
                                                            <Button.Or text='ou' />
                                                            <Button >Mettre en attente</Button>
                                                        </Button.Group>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <Icon className='cursor' name='file pdf outline'/>
                                                    </Table.Cell>
                                                </Table.Row>




                                                <Table.Row error>
                                                    <Table.Cell>Envoi code promo</Table.Cell>
                                                    <Table.Cell><Icon name='remove'/></Table.Cell>
                                                    <Table.Cell>
                                                        <p>
                                                            <Label>
                                                                <Icon name="user"/>Morgane
                                                            </Label>
                                                        </p>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <Button.Group>
                                                            <Button positive>Action effectué</Button>
                                                            <Button.Or text='ou' />
                                                            <Button >Mettre en attente</Button>
                                                        </Button.Group>
                                                    </Table.Cell>
                                                    <Table.Cell>
                                                        <Icon className='cursor' name='file pdf outline'/>
                                                    </Table.Cell>
                                                </Table.Row>



                                            </Table.Body>
                                        </Table>
                                    </div>


                                </div>


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



