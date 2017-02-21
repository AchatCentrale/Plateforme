import React from 'react';
import Add from './ui/Add.ui.jsx';
import Export from './ui/Export.ui.jsx';
import Update from './ui/Update.ui.jsx';
import Logo from './ui/Logo.jsx';
import Delete from './ui/Delete.jsx';
import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';



export default class ActionBar extends React.Component {
    render() {
        return(
        <div className="container-actionBar-top" >
            <div className="container-actionBar">
                <Add />
                <Export />
                <Update />
            </div>
            <div className="container-groupe">
                <Logo/>
            </div>
            <div className="container-delete">
                <Delete />
            </div>
        </div>
        );
    }
}

