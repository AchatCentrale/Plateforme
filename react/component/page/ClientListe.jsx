import React from 'react';
import { Icon, Label, Menu, Table } from 'semantic-ui-react'





export default class ClientListe extends React.Component {






    getClient() {

        let url =  "http://localhost:8000/Agence";
        $.getJSON(url, (data)=>{

            this.setState({
                clients:  data,

            });
        })
    }



    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            page: 1,
            LimitPerPage : 10

        };


    }


    componentWillMount(){
        this.getClient.call(this);

    }



    render() {

        const dataDelaTable = this.state.clients.map((client, index) =>{

            if(index <= this.state.LimitPerPage){
                return(
                    <Table.Row>
                        <Table.Cell>{ client.clRaisonsoc}</Table.Cell>
                        <Table.Cell>{ client.clMail}</Table.Cell>
                        <Table.Cell>{ client.insDate}</Table.Cell>
                    </Table.Row>)
            }

        });

        return(
            <div>
               <div className="table-client">
                   <Table id="table-client" celled selectable >
                       <Table.Header>
                           <Table.Row>
                               <Table.HeaderCell>Raison sociale</Table.HeaderCell>
                               <Table.HeaderCell>Adresse mail</Table.HeaderCell>
                               <Table.HeaderCell>Membre depuis</Table.HeaderCell>
                           </Table.Row>
                       </Table.Header>

                       <Table.Body>

                           {dataDelaTable}

                       </Table.Body>
                       <Table.Footer>
                           <Table.Row>
                               <Table.HeaderCell colSpan='3'>
                                   <Menu floated='left' pagination>
                                       <Menu.Item as='a' icon>
                                           <Icon name='left chevron' />
                                       </Menu.Item>
                                       <Menu.Item  as='a'>1</Menu.Item>
                                       <Menu.Item as='a'>2</Menu.Item>
                                       <Menu.Item as='a'>3</Menu.Item>
                                       <Menu.Item as='a'>4</Menu.Item>
                                       <Menu.Item as='a' icon>
                                           <Icon name='right chevron' />
                                       </Menu.Item>
                                   </Menu>
                               </Table.HeaderCell>
                           </Table.Row>
                       </Table.Footer>
                   </Table>
               </div>
            </div>
            );
        }
}

