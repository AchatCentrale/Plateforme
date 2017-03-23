import React from 'react';

import { Grid, Image, Card, Button } from 'semantic-ui-react'





export default class AgenceAdresse extends React.Component {



    constructor(props) {
        super(props);
        console.log(this.props)

    }
    componentWillMount(){

    }


    render() {

        let currentLocation = this.props;





        return(
            <div className="container-adresse-general">
                <div className="adresse-agence">
                    <Grid columns={3} divided>
                        <Grid.Row>
                            <Grid.Column>
                                <Card>
                                    <Card.Content>

                                        <Card.Header>
                                            Adresse de l'agence
                                        </Card.Header>
                                        <Card.Meta>
                                            {"        "}
                                        </Card.Meta>
                                        <Card.Description>
                                            <p>{this.props.client.clAdresse1}</p>
                                            <br/>
                                            <p>{this.props.client.clCp +"  "+ this.props.client.clVille}</p>
                                        </Card.Description>
                                    </Card.Content>
                                    <Card.Content extra>
                                        <div className='ui center'>
                                            <Button basic color='green'>Rendre principale</Button>
                                        </div>
                                    </Card.Content>
                                </Card>
                            </Grid.Column>
                            <Grid.Column>
                                <Card>
                                    <Card.Content>
                                        <Card.Header>
                                            Adresse de livraison
                                        </Card.Header>
                                        <Card.Meta>
                                            {this.props.adresseL.caPrincipale === 1 ? "Adresse principale" : " "}
                                        </Card.Meta>
                                        <Card.Description>
                                            <p>{this.props.adresseL.caAdresse1}</p>
                                            <br/>
                                            <p>{this.props.adresseL.caCp +"  "+ this.props.adresseL.caVille}</p>
                                        </Card.Description>
                                    </Card.Content>

                                </Card>
                            </Grid.Column>
                            <Grid.Column>
                                <Card>
                                    <Card.Content>
                                        <Card.Header>
                                            Adresse de Facturation
                                        </Card.Header>
                                        <Card.Meta>
                                            {this.props.adresseF.caPrincipale === 1 ? "Adresse principale" : " "}
                                        </Card.Meta>
                                        <Card.Description>
                                            <p>{this.props.adresseF.caAdresse1}</p>
                                            <br/>
                                            <p>{this.props.adresseF.caCp +"  "+ this.props.adresseF.caVille}</p>
                                        </Card.Description>
                                    </Card.Content>

                                </Card>
                            </Grid.Column>
                        </Grid.Row>
                    </Grid>
                </div>
            </div>
        );
    }

}





