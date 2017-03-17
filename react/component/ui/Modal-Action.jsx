import React from 'react';

import { Grid, Segment, Input, Form, TextArea, Select } from 'semantic-ui-react'


export default class ModalAction extends React.Component {

    constructor(props){
       super();
    }





    render() {



        return (

            <div>
                <Grid columns='equal'>
                    <Grid.Row>
                        <Grid.Column>

                                <div className="interlocuteur">
                                    <div>
                                        <p>Interlocuteur</p>
                                    </div>
                                    <div>
                                        <Input icon='users' iconPosition='left' placeholder='Utilisateur ..' />
                                    </div>
                                </div>

                        </Grid.Column>
                        <Grid.Column>
                            <div className="interlocuteur">
                                <div>
                                    <p>Entreprise</p>
                                </div>
                                <div>
                                    <Input icon='briefcase' iconPosition='left' placeholder='Nom entreprise ..' />
                                </div>
                            </div>
                        </Grid.Column>
                        <Grid.Column>
                            <p>Date : { moment().format("D MMMM GGGG" ) }</p>
                        </Grid.Column>

                    </Grid.Row>
                    <Grid.Row>
                        <Grid.Column>
                            <Select placeholder="Selectionnez le type d'action"  />
                        </Grid.Column>
                        <Grid.Column>
                            <Select placeholder="Assigné à"  />
                        </Grid.Column>
                        <Grid.Column>
                            <Select placeholder="Priorité"  />
                        </Grid.Column>
                    </Grid.Row>
                    <Grid.Row>
                        <Grid.Column>
                            <Form>
                                <TextArea placeholder='Votre commentaire ...' />
                            </Form>
                        </Grid.Column>

                    </Grid.Row>
                </Grid>

            </div>
        );
    }
}

