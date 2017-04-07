import React from 'react';
import {Icon, Label,Grid , Menu, Table, Input,Button, Dimmer, Loader, Image, Segment} from 'semantic-ui-react'

import {browserHistory} from 'react-router'


export default class ClientListe extends React.Component {


    getClient() {

        let url = "http://localhost:8000/Agence";
        $.getJSON(url, (data) => {

            this.setState({
                clients: data,
                loading: false

            });

        })
    }


    handleClickGoto(e, index) {


        let path = `/client/${e}`;

        browserHistory.push(path)

    }

    handleLimitRow(e) {

    }


    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            page: 1,
            LimitPerPage: 10,
            DebutPagination: 0,
            loading: true


        };


    }


    componentDidMount() {
        this.getClient.call(this);


    }


    render() {


        const dataDelaTable = this.state.clients.map((client, index) => {

            let datetime = client.insDate;
            let datetime_format = moment(datetime).fromNow();

            return (
                <Table.Row data-index={client.clId} className="cursor"
                           onClick={this.handleClickGoto.bind(this, client.clId)}>
                    <Table.Cell>{ client.clId}</Table.Cell>
                    <Table.Cell>{ client.clRaisonsoc}</Table.Cell>
                    <Table.Cell>{ client.clMail}</Table.Cell>
                    <Table.Cell>{ datetime_format }</Table.Cell>
                </Table.Row>)


        });

        const loading = () => {

            if (this.state.loading) {
                return <Loader active size='large'>Loading</Loader>
            }
            else {

                return <Loader size='large'>Loading</Loader>
            }
        };


        return (

            <div>

                <div className="action-client-liste">

                    <Button.Group labeled>
                        <Button icon='add square' content='Ajoute un nouveau client' />
                        <Button icon='file excel outline' content='Exporter en .csv' />
                        <Button icon='print' content='imprimer' />
                    </Button.Group>

                </div>



                <div className="table-client">


                    {loading()}


                    <Table id="table-client" selectable>

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

