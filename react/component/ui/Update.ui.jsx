import React from 'react';

import {Icon, Input, Label} from 'semantic-ui-react'

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


    constructor(props){
        super(props);

        this.state = {
            isEditing: false,
        };


    }



    handleUpdateClick (e) {







        if(this.state.isEditing === false)
        {

            let el_for_update = $.find('.edit-client-element');

            console.log("je modifie")

            this.setState({
                isEditing: true
            });



            let tpl = ( args ) => { return (`<Input focus className="edit-client-element" value='${args}' />`)};

            el_for_update.map(function(i) {
                $(".col-gauche-info p").css("padding", "13px 1px 1px 1px");
                $( i ).html(tpl(i.innerText));

            });



        }else{

            console.log("j'enregistre")

            let el_for_save = $.find('.edit-client-element');

            console.log(el_for_save);

            let tpl = ( args ) => { return (`<Label className="edit-client-element">${args}</Label>`)};


            el_for_save.map(function(i) {
                $(".col-gauche-info p").css("padding", "5px 1px 1px 1px");
                $( i ).html(tpl(i.firstChild.value));

            });


            this.setState({
                isEditing: false
            });
        }
    }


    componentWillMount() {

    }



    render() {



        return (
            <div onClick={this.handleUpdateClick.bind(this)} className='update-icon cursor' >
                {this.state.isEditing ? 'Enregistrer' : "Modifier"} <Icon  name='edit'/>
            </div>
        );
    }
}

