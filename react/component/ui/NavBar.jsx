import React from 'react';

import { Link } from 'react-router'



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


                    <div className="menu">
                        <div className="menu-home hover">
                            <Link to="/" activeClassName="active">Home</Link>
                        </div>
                        <div className="menu-client hover">
                            <Link to="/client" activeClassName="active">Clients</Link>
                        </div>
                        <div className="menu-supplier hover">
                            <Link to="/fournisseur" activeClassName="active">Fournisseur</Link>
                        </div>

                        <div className="menu-calendrier hover">
                            <a href=""><p>TODO</p></a>
                        </div>
                    </div>


                    <div className="menu-bottom">
                        <div className="menu-logout hover">
                            <a href="/logout"><p>Déconnexion</p></a>
                        </div>

                    </div>



                </div>

            </div>
        );
    }
}

