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


export default class Update extends React.Component {
    render() {
        return (
            <div className='update-icon cursor' >
                Modifier <Icon  name='edit'/>
            </div>
        );
    }
}

