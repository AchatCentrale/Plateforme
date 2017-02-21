import React from 'react';
import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';



export default class Logo extends React.Component {
    render() {
        return(
            <div>
                <p className="delete-icon" >Supprimer</p>
            </div>
        );
    }
}

