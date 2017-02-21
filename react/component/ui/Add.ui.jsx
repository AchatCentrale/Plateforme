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



export default class Add extends React.Component {
    render() {
        return(
            <div>
                <p className="add-icon" >Nouveau</p>
            </div>
        );
    }
}

