import React from 'react';
import { Icon, Label, Menu, Table, Input } from 'semantic-ui-react'





export default class ClientListe extends React.Component {


    getClient() {

        let url =  "http://localhost:8000/Agence";
        $.getJSON(url, (data)=>{

            this.setState({
                clients:  data,

            });
        })
    }


    handleClickGoto(e){
        e.persist();
        console.log(e.target)
    }

    handleLimitRow(e) {
        console.log(e.target)
    }


    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            page: 1,
            LimitPerPage : 10,
            DebutPagination : 0,


        };


    }


    componentDidMount(){
        this.getClient.call(this);

    }


    render() {






        const dataDelaTable = this.state.clients.map((client, index) =>{


                return(
                    <Table.Row data-tag={index} className="cursor" onClick={this.handleClickGoto} >
                        <Table.Cell>{ client.clId}</Table.Cell>
                        <Table.Cell>{ client.clRaisonsoc}</Table.Cell>
                        <Table.Cell>{ client.clMail}</Table.Cell>
                        <Table.Cell>{ client.insDate}</Table.Cell>
                    </Table.Row>)


        });


        return(
            <div>
                <div className="table-client">
                    <Table id="table-client"  selectable >
                        <Table.Header>
                            <Table.Row >
                                <Table.HeaderCell>ID</Table.HeaderCell>
                                <Table.HeaderCell>Raison sociale</Table.HeaderCell>
                                <Table.HeaderCell>Adresse mail</Table.HeaderCell>
                                <Table.HeaderCell>Membre depuis</Table.HeaderCell>
                            </Table.Row>
                        </Table.Header>

                        <Table.Body>

                            {dataDelaTable}

                        </Table.Body>
                    </Table>
                </div>
            </div>
        );

        }
}

