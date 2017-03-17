import React from 'react';
import Sidebar from '../../ui/Sidebar.jsx';
import ActionBar from '../../../component/ActionBar.jsx';




import { Input, Label, Menu, Loader} from 'semantic-ui-react'

import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';




export default class Hierarchie extends React.Component {



    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            clientsUser: [],

        };
    }
    componentWillMount(){

    }


    render() {

        let currentLocation = this.props;


        return(
            <div>
                <ActionBar context={this.props} />
                <div className="container-general" >
                    <div className="container-info-client">
                        <h1>Hierarchie</h1>
                    </div>
                    <div className="container-sidebar">

                        <Menu pointing vertical>
                            <Sidebar content="General" context={currentLocation} />
                            <Sidebar content="Adresse" context={currentLocation} />
                            <Sidebar content="Status" context={currentLocation} />
                            <Sidebar content="Dépenses" context={currentLocation} />
                            <Sidebar content="Actions" context={currentLocation} />
                            <Sidebar content="Hierarchie" context={currentLocation} />
                        </Menu>


                    </div>
                </div>
            </div>
        );
    }

}



