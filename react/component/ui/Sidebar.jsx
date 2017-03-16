import React from 'react';
import { Input, Label, Menu } from 'semantic-ui-react'


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






    constructor(props){
        super(props);
        console.log(this);
    }

    handleItemClick(){
        let id = this.props.context.params.id;

        let path = "/client/"+ id + "/" + this.props.content;

    }


    componentWillMount(){
        this.handleItemClick.call(this);
    }


    render() {



        return(
            <div className="">
                <Menu.Item name={this.props.content} onClick={this.handleItemClick} />

            </div>
        );
    }


}



