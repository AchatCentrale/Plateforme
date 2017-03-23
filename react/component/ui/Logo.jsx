import React from 'react';
import { Image } from 'semantic-ui-react'
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
                <Image src={'http://www.centrale-roc-eclerc.fr//UploadFichiers/Uploads/CLIENT_' +  this.props.client.clId  +'/' + this.props.client.clLogo } avatar />
                <span>{this.props.client.clRaisonsoc}</span>

            </div>
        );
    }
}

