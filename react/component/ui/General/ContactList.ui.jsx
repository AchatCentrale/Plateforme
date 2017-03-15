import React from 'react';
import {BootstrapTable, TableHeaderColumn} from 'react-bootstrap-table';

const cellEditProp = {
    mode: 'click'
};

const data = ["<div></div>"];

export default class ContactList extends React.Component {


    constructor(props) {
        super(props);


    }


    componentWillMount() {

    }


    render() {
        console.log(this.props.clientsUser);
        return (
            <div className="container-contact-list">
                <h3>Liste des contacts</h3>
                <div className="container-table-contact">
                    <table className="table-client-user">
                        <thead className="table-client-user-header">
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Mail</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody className="table-client-user-body">
                        {
                            this.props.clientsUser.map(function (x) {
                                return (<tr>
                                        <td>{x.ccNom}</td>
                                        <td>{x.ccPrenom}</td>
                                        <td>{x.ccMail}</td>
                                        <td><i className="fa fa-envelope mail-user" aria-hidden="true"></i></td>
                                    </tr>


                                )
                            })
                        }
                        </tbody>
                    </table>
                </div>

            </div>
        );
    }


}



