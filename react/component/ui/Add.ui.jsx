import React from "react";


import {
    Button,
    Checkbox,
    Form,
    Header,
    Icon,
    Image,
    Input,
    Label,
    Modal,
    Options,
    Radio,
    Select,
    TextArea
} from "semantic-ui-react";

import {browserHistory, IndexRedirect, IndexRoute, Link, Redirect, Route, Router} from "react-router";


export default class Add extends React.Component {


    constructor(props) {
        super(props);

        this.state = {open: false};
        this.show = () => this.setState({open: true});
        this.close = () => this.setState({open: false});

    }


    render() {

        const {open} = this.state;

        return (
            <div className='update-icon cursor'>
                <div onClick={this.show}>
                    Ajouter <Icon name='add'/>
                </div>


                <Modal open={open} onClose={this.close} closeIcon='close'>
                    <Header icon='add user' content='Ajouter un nouveau client'/>
                    <Modal.Content>
                        <Form>
                            <Form.Group widths='equal'>
                                <Form.Field control={Input} label='Raison sociale'
                                            placeholder="Raison sociale de l'entreprise"/>
                                <Form.Field control={Input} label='Siret'
                                            placeholder="Numero de siret de l'entreprise"/>
                                <Label>
                                    <Icon name='id card outline'/> RERD-RZERZ
                                </Label>
                            </Form.Group>
                            <Form.Group widths='equal'>
                                <Form.Field control={Input} label='Adresse'
                                            placeholder="Adresse de l'entreprise"/>
                                <Form.Field control={Input} label='Ville'
                                            placeholder="Ville de l'entreprise"/>
                                <Form.Field control={Input} label='Code postal'
                                            placeholder="Code postal de l'entreprise"/>
                            </Form.Group>
                            <Form.Group widths='equal'>
                                <Form.Field control={Input} label='Téléphone'
                                            placeholder="Numero de téléphone de l'entreprise"/>
                                <Form.Field control={Input} label='Mail'
                                            placeholder="Adresse mail de l'entreprise"/>
                            </Form.Group>
                            <Form.Field control={Checkbox} label='Cet utilisateur est-il Adhérent ?'/>
                        </Form>
                    </Modal.Content>
                    <Modal.Actions>
                        <Button color='green'>
                            <Icon name='save'/> Enregistrer
                        </Button>
                    </Modal.Actions>
                </Modal>
            </div>
        );
    }
}

