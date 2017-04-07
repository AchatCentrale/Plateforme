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



export default class Export extends React.Component {
    render() {
        return(
            <div className='update-icon cursor' >
                Exporter <Icon  name='external share'/>
            </div>
        );
    }
}

