import React from 'react';
import Avatar from 'react-avatar';
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
            <div className="container-marques" >
                <Avatar round="true" size="50" facebook-id="Jbbbbb" src="http://www.gravatar.com/avatar/a16a38cdfe8b2cbd38e8a56ab93238d3" />
                <p>Marque client</p>
            </div>
        );
    }
}

