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
                <Avatar round="true" size="50" facebook-id="Jbbbbb" src="http://www.achatcentrale.fr/UploadFichiers/Uploads/CLIENT_51/oderis.png" />
                <p>Marque client</p>
            </div>
        );
    }
}

