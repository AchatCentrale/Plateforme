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
    }

    handleItemClick(){

        let id = this.props.context.params.id;
        if(this.props.content === 'General'){
            browserHistory.push("/client/"+ id );
        }else{
            let path = "/client/"+ id + "/" + this.props.content;
            browserHistory.push(path);
        }




    }


    componentWillMount(){
    }


    render() {



        return(
            <div>
                <Menu.Item name={this.props.content} onClick={this.handleItemClick.bind(this)} />

            </div>
        );
    }


}



