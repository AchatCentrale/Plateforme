import React from 'react';


import { List, Grid, Header, Table } from 'semantic-ui-react'



export default class DepenseContainer extends React.Component {





    getLogs(){


        let url = 'http://localhost:8000/Agence/'+this.props.params.id +'/logs';

        $.getJSON(url, (data) => {


            console.log(data)


            if(!data){
                this.setState({
                    logs : []
                });
            }
            else{
                this.setState({
                    logs : data
                });
            }

        })


    }



    componentWillMount(){


        this.getLogs.call(this);
    }

    constructor(props){
        super(props)

        this.state = {
            logs: [],
        };
    }



    render() {







        return(
            <div className="depense-container">

                <h2>Liste des logs de l'agence </h2>


                <Grid columns={2} divided='vertically' >


                    <Grid.Column width='7' floated='left'>
                        <List relaxed='very'>
                            <List.Item>
                                <List.Content>
                                    <List.Header as='a'>Fabiola GONZALES</List.Header>
                                    <List.Description>Navigation vers la page <a><b> Photos porcelaine </b></a> le  28/03/2017 à 17:21:37 </List.Description>
                                </List.Content>
                            </List.Item>


                        </List>
                    </Grid.Column>




                    <Grid.Column width='4' floated='right'>

                        <Table basic='very' celled collapsing>
                            <Table.Header>
                                <Table.Row>
                                    <Table.HeaderCell>Fournisseurs</Table.HeaderCell>
                                    <Table.HeaderCell>Nombre de tickets</Table.HeaderCell>
                                </Table.Row>
                            </Table.Header>

                            <Table.Body>
                                <Table.Row>
                                    <Table.Cell>
                                        <Header as='h4' image>
                                            <Header.Content>
                                                Cesar fleurs
                                                <Header.Subheader>Human Resources</Header.Subheader>
                                            </Header.Content>
                                        </Header>
                                    </Table.Cell>
                                    <Table.Cell>
                                        22
                                    </Table.Cell>
                                </Table.Row>
                                <Table.Row>
                                    <Table.Cell>
                                        <Header as='h4' image>
                                            <Header.Content>
                                                Matthew
                                                <Header.Subheader>Fabric Design</Header.Subheader>
                                            </Header.Content>
                                        </Header>
                                    </Table.Cell>
                                    <Table.Cell>
                                        15
                                    </Table.Cell>
                                </Table.Row>
                                <Table.Row>
                                    <Table.Cell>
                                        <Header as='h4' image>
                                            <Header.Content>
                                                Lindsay
                                                <Header.Subheader>Entertainment</Header.Subheader>
                                            </Header.Content>
                                        </Header>
                                    </Table.Cell>
                                    <Table.Cell>
                                        12
                                    </Table.Cell>
                                </Table.Row>
                                <Table.Row>
                                    <Table.Cell>
                                        <Header as='h4' image>
                                            <Header.Content>
                                                Mark
                                                <Header.Subheader>Executive</Header.Subheader>
                                            </Header.Content>
                                        </Header>
                                    </Table.Cell>
                                    <Table.Cell>
                                        11
                                    </Table.Cell>
                                </Table.Row>
                            </Table.Body>
                        </Table>

                    </Grid.Column>


                </Grid>
            </div>
        );
    }

}



