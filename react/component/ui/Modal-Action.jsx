import React, { PropTypes } from 'react'
import {Checkbox, Form, Grid, Input, Select, TextArea, Label, Button,Icon} from "semantic-ui-react";
import Priorite from './Priorite.jsx'

export default class ModalAction extends React.Component {

    constructor(props) {
        super();
        $( function() {
            $( ".datepicker" ).datepicker();
        } );
    }


    handleClickSave(e){

        console.log(e.target.value);

    }

    componentWillMount() {


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
                                    <Input id="utilisateur-action" onChange={e => this.handleClickSave(e)}  icon='users' iconPosition='left' placeholder='Utilisateur ..'/>
                                </div>
                            </div>
                        </Grid.Column>
                        <Grid.Column>
                            <div className="interlocuteur">
                                <div>
                                    <p>Entreprise</p>
                                </div>
                                <div>
                                    <Input id="raisonsoc-action" onChange={e => this.handleClickSave(e)} icon='briefcase' iconPosition='left' placeholder='Nom entreprise ..'/>
                                </div>
                            </div>
                        </Grid.Column>
                    </Grid.Row>


                    <Grid.Row>
                        <Grid.Column>
                            <Checkbox onChange={e => this.handleClickSave(e)} id="referent-action"  label='Notifier le référent ?'/>
                        </Grid.Column>
                        <Grid.Column>
                            <p>Date : { moment().format("D MMMM GGGG") }</p>
                        </Grid.Column>
                        <Grid.Column>
                            <p>Date d'échéance : <input  id="echeance-action"  type="text" className="datepicker"/>
                            </p>
                        </Grid.Column>
                    </Grid.Row>


                    <Grid.Row>
                        <Grid.Column>
                            <Select  id="type-action" onChange={e => this.handleClickSave(e)}   placeholder="Selectionnez le type d'action"/>
                        </Grid.Column>
                        <Grid.Column>
                            <Select  id="contact-action" onChange={e => this.handleClickSave(e)}   placeholder="Assigné à"/>
                        </Grid.Column>
                        <Grid.Column>
                            <Priorite onChange={e => this.handleClickSave(e)} />
                        </Grid.Column>
                    </Grid.Row>


                    <Grid.Row>
                        <Grid.Column>
                            <Form>
                                <TextArea id="desc-action" onChange={e => this.handleClickSave(e)} className="action-for-save"  placeholder='Votre commentaire ...'/>
                            </Form>
                        </Grid.Column>
                    </Grid.Row>



                    <Grid.Row textAlign='center'>
                        <Grid.Column>
                            <Button fluid onClick={this.handleClickSave.bind(this)} color='green'>
                                <Icon name='save'/> Enregistrer
                            </Button>
                        </Grid.Column>
                    </Grid.Row>


                </Grid>

            </div>
        );
    }
}

