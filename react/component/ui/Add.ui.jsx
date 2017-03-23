import React from 'react';


import {Icon} from 'semantic-ui-react'

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
            <div className='update-icon cursor' >
                Ajouter <Icon  name='add'/>
            </div>
        );
    }
}

