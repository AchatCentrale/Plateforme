import React from 'react';
import Sidebar from '../../ui/Sidebar.jsx';
import ActionBar from '../../../component/ActionBar.jsx';
import DepenseContainer from '../../ui/Depenses/DepenseContainer.jsx';




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




export default class Depenses extends React.Component {






    constructor(props) {
        super(props);


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


                        <DepenseContainer context={this.props} />
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



