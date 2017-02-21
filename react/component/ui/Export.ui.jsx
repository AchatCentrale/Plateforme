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



export default class Export extends React.Component {
    render() {
        return(
            <div>
                <p className="export-icon" >Exporter</p>
            </div>
        );
    }
}

