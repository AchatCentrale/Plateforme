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

export default class EtatClient extends React.Component {

    constructor(){
        super()
    }


    render() {

        return(
           <div>
               <h1>Etat du client</h1>
           </div>
        );
    }


}



