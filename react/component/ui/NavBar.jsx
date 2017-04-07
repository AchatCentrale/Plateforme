import React from 'react';

import { Link } from 'react-router'

import {Icon, Grid} from 'semantic-ui-react'




export default class NavBar extends React.Component {



    render() {



        return (

            <div>


                <div className="nav-bar">



                    <div className="presentation">
                        <div className="block-logo">
                            <img src="/images/logo-achatcentrale.png" alt="logo_crm"  />
                                <p>CRM v1.0</p>
                        </div>
                    </div>


                    <div className="menu-nav">


                        <div className="menu-home hover">
                            <Icon size="large" color="teal" className="icon-menu" name="home" />
                            <Link to="/" activeClassName="active">Home</Link>
                        </div>
                        <div className="menu-client hover">
                            <Icon size="large" color="teal" className="icon-menu" name="group" />
                            <Link to="/client" activeClassName="active">Clients</Link>
                        </div>
                        <div className="menu-supplier hover">
                            <Icon size="large" color="teal" className="icon-menu" name="suitcase"  />

                            <Link to="/fournisseur" activeClassName="active">Fournisseur</Link>
                        </div>


                    </div>


                    <div className="menu-bottom">
                        <Icon size="large" color="teal" className="icon-menu" name="log out"  />
                        <a href="/logout"> Déconnection</a>

                    </div>



                </div>

            </div>
        );
    }
}

