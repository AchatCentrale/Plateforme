import React from 'react';
import { Button, Header, Icon, Modal, Select } from 'semantic-ui-react'


import ModalAction from '../ui/Modal-Action.jsx'


export default class TopBar extends React.Component {

    constructor(props){
        super (props);

        this.state = { open: false };
        this.show =  () => this.setState({ open: true })
        this.close = () => this.setState({ open: false })

    }





    render() {

        const { open } = this.state;

        return (

            <div>
                <div className="recherche">

                    <div onClick={this.show} className="add-action" >
                        <img src="/images/add_action.png" className="cursor" alt=""/>
                    </div>

                    <div className="ajout">
                        <div className="loupe">
                            🔍
                        </div>
                        <input type="text" placeholder="Recherche" />
                    </div>

                    <div className="notification">

                    </div>



                </div>

                <Modal open={open} onClose={this.close} closeIcon='close'>
                    <Header icon='tasks' content='Nouvel action' />
                    <Modal.Content>
                        <ModalAction />
                    </Modal.Content>
                    <Modal.Actions>
                        <Button color='green'>
                            <Icon name='save' /> Enregistrer
                        </Button>
                    </Modal.Actions>
                </Modal>




            </div>
        );
    }
}

