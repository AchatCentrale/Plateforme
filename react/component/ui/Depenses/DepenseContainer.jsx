import React from 'react';


import { List, Grid, Header, Table } from 'semantic-ui-react'



export default class DepenseContainer extends React.Component {


    getCommande(){

        let url = "http://localhost:8000/Agence/"+ this.props.context.params.id +"/commande";


        $.getJSON(url,(data) => {
            this.setState({
                commande: data,
            });
        })


    }


    getLogs(){

        let url = "http://localhost:8000/Agence/"+ this.props.context.params.id +"/logs";


        $.getJSON(url,(data) => {
            this.setState({
                logs: data,
            });
        })

    }


    constructor(props){
        super(props)


        this.state = {
            logs: [],
            commande: [],
        };

    }






    componentWillMount(){

        this.getLogs.call(this);
        this.getCommande.call(this);

    }





    render() {





        const cmd = this.state.commande.map((commande, index) => {
            console.log(commande);


            return (
                <Table.Row>
                    <Table.Cell>
                        <Header as='h4' image>
                            <Header.Content>
                                {commande.FO_RAISONSOC}
                            </Header.Content>
                        </Header>
                    </Table.Cell>
                    <Table.Cell>
                        {commande.NB_CMD}
                    </Table.Cell>
                    <Table.Cell>
                        {commande.NB_TICKETS}
                    </Table.Cell>
                </Table.Row>)


        });


        return(

            <div>

                <h2>Liste des logs de l'agence </h2>


                <Grid columns={2} divided='vertically' >


                    <Grid.Column width='7' floated='left'>
                        <List relaxed='very'>
                            <List.Item>


                            {this.state.logs.map((data)=>{
                                return (
                                    <List.Content>
                                    <List.Header as='a'>Fabiola GONZALES</List.Header>
                                    <List.Description>{data.LO_DESCR}</List.Description>
                                </List.Content>
                                )
                            })}
                            </List.Item>

                        </List>
                    </Grid.Column>




                    <Grid.Column width='6' floated='right'>

                        <Table basic='very' celled collapsing>
                            <Table.Header>
                                <Table.Row>
                                    <Table.HeaderCell>Fournisseurs</Table.HeaderCell>
                                    <Table.HeaderCell>Nombre de tickets</Table.HeaderCell>
                                    <Table.HeaderCell>Nombre de commandes</Table.HeaderCell>
                                </Table.Row>
                            </Table.Header>

                            <Table.Body>

                                {cmd}

                            </Table.Body>
                        </Table>

                    </Grid.Column>


                </Grid>
            </div>
        );
    }


}



