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

export default class Sidebar extends React.Component {
    constructor(){
        super()
    }


    render() {

        let id = this.props.context.params.id;

        console.log(this.props.context,  id);
        return(
            <div className="sidebar">
                <Link to={"/client/"+ id + "/" + this.props.content} activeClassName="current">{this.props.content}</Link>
            </div>
        );
    }


}



