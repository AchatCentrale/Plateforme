import React from "react";

import Add from "./ui/Add.ui.jsx";
import Export from "./ui/Export.ui.jsx";
import Update from "./ui/Update.ui.jsx";
import Logo from "./ui/Logo.jsx";


import {browserHistory, IndexRedirect, IndexRoute, Link, Redirect, Route, Router} from "react-router";


export default class ActionBar extends React.Component {

    constructor(props) {
        super(props);




    }





    render() {
        return (
            <div className="container-actionBar-top">
                <div className="container-actionBar">
                    <Add />
                    <Export />
                    <Update className="cursor"  />
                </div>
                <div className="container-groupe">
                    { /*<Logo client={this.state.clients}/>*/}
                </div>

            </div>
        );
    }
}

