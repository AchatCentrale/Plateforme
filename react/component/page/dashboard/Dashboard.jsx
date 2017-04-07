import React from "react";

import {Divider,Button,Container, Header,  Grid, Image, Statistic, List} from "semantic-ui-react";


export default class Dashboard extends React.Component {


    constructor(props) {
        super(props);


    }


    render() {

        let now = moment().format('LLLL');

        return (
            <div className="container-dashboard">

                <div className="container-intro-dashboard">

                    <Grid>
                        <Grid.Column floated='left' width={5}>
                            <h3>Bonjour Jean-baptiste</h3>
                        </Grid.Column>
                        <Grid.Column floated='right' width={5}>
                            <h3>{now}</h3>
                        </Grid.Column>
                    </Grid>

                </div>

                <Divider />

                <Container text>
                    <Button positive>
                       Ajouter un nouveau client
                    </Button>
                    <Button content='Exporter la liste des clients en .pdf' icon='file pdf outline' labelPosition='right' />
                </Container>



                <div className="dashboard-content">

                    <div className="container-dashboard-detail">
                        <Grid>
                            <Grid.Row columns={3}>
                                <Grid.Column>
                                    <h2>Tâches a effectuer</h2>
                                    <List divided relaxed>



                                        <List.Item>
                                            <List.Icon name='tasks' size='large' verticalAlign='middle' />
                                            <List.Content>
                                                <List.Header as='a'>Completer l'audit ( ROC-ECLERC )</List.Header>
                                                <List.Description as='a'>Dans 2 jours</List.Description>
                                            </List.Content>
                                        </List.Item>


                                        <List.Item>
                                            <List.Icon name='phone' size='large' verticalAlign='middle' />
                                            <List.Content>
                                                <List.Header as='a'>Rappeler le fournisseur ( ELIS )</List.Header>
                                                <List.Description as='a'>Dans 2 jours</List.Description>
                                            </List.Content>
                                        </List.Item>


                                        <List.Item>
                                            <List.Icon name='tasks' size='large' verticalAlign='middle' />
                                            <List.Content>
                                                <List.Header as='a'>Completer l'audit ( ROC-ECLERC )</List.Header>
                                                <List.Description as='a'>Dans 2 jours</List.Description>
                                            </List.Content>
                                        </List.Item>


                                    </List>
                                </Grid.Column>
                                <Grid.Column>
                                    <h2>Dernieres actions effectué</h2>
                                </Grid.Column>
                                <Grid.Column>
                                    <h2>Liste des groupes</h2>
                                </Grid.Column>
                            </Grid.Row>
                        </Grid>
                    </div>
                </div>
            </div>
        )
    }
}


