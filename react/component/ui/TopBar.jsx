import React from "react";
import {Button, Grid, Header, Icon, Modal, Segment, Select} from "semantic-ui-react";

import { Link } from 'react-router'



import ModalAction from "../ui/Modal-Action.jsx";


export default class TopBar extends React.Component {

    constructor(props) {
        super(props);

        this.state = {open: false};
        this.show = () => this.setState({open: true});
        this.close = () => this.setState({open: false});

    }


    render() {

        const {open} = this.state;

        return (

            <div>
                <div class="recherche">
                    <div class="add-action">
                        <img onClick={this.show} src="/images/add_action.png" class="cursor" alt=""/>
                    </div>

                    <div class="avatar-topBar">
                        <Segment>
                            <Grid>
                                <Grid.Column floated='left' width={4}>
                                    <Icon name='user circle '/>{this.props.user}
                                </Grid.Column>
                                <Grid.Column floated='right' width={7}>

                                    <Link to="/profile">
                                        <Icon name='setting'/>Modifier mon profil
                                    </Link>
                                </Grid.Column>
                            </Grid>

                        </Segment>


                    </div>

                    <div class="ajout">
                        <div class="loupe">
                            🔍
                        </div>
                        <input type="text" placeholder="Recherche"/>
                    </div>

                    <div class="notification">

                    </div>


                </div>

                <Modal open={open} onClose={this.close} closeIcon='close'>
                    <Header icon='tasks' content='Nouvel action'/>
                    <Modal.Content>
                        <ModalAction />
                    </Modal.Content>

                </Modal>


            </div>
        );
    }
}

