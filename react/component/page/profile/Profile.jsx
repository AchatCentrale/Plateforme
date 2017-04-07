import React from "react";

import { Container, Header, Button, Form } from 'semantic-ui-react'



export default class Profile extends React.Component {

    constructor(props) {
        super(props);



    }


    render() {



        return (

            <div>
               <div className="container-profile">
                   <Container text className="container-form">

                       <Header size='medium'>Modifier votre profil</Header>
                       <Form>
                           <Form.Field>
                               <label>Nom</label>
                               <input placeholder='Nom' />
                           </Form.Field>
                           <Form.Field>
                               <label>Prenom</label>
                               <input placeholder='Prenom' />
                           </Form.Field>
                           <Form.Field>
                               <label>Password</label>
                               <input placeholder='Mot de passe' />
                           </Form.Field>
                           <Button type='submit'>Enregistrer</Button>
                       </Form>
                   </Container>
               </div>
            </div>
        );
    }
}

