import React from "react";
import Sidebar from "../../ui/Sidebar.jsx";
import ActionBar from "../../../component/ActionBar.jsx";
import DepenseContainer from "../../ui/Depenses/DepenseContainer.jsx";


import {Grid, Input, Label, Loader, Menu} from "semantic-ui-react";




export default class Historique extends React.Component {




        render() {

            let currentLocation = this.props;


            return (
                <div>
                    <ActionBar context={this.props}/>
                    <div className="container-general">


                        <Grid columns='equal'>
                            <Grid.Column width={12}>


                                <div className="container-info-client">
                                    <DepenseContainer context={this.props}/>
                                </div>


                            </Grid.Column>
                            <Grid.Column>


                                <div className="container-sidebar">
                                    <Menu pointing vertical>
                                        <Sidebar content="General" context={currentLocation}/>
                                        <Sidebar content="Adresse" context={currentLocation}/>
                                        <Sidebar content="Status" context={currentLocation}/>
                                        <Sidebar content="Dépenses" context={currentLocation}/>
                                        <Sidebar content="Actions" context={currentLocation}/>
                                        <Sidebar content="Historique" context={currentLocation}/>
                                    </Menu>
                                </div>


                            </Grid.Column>
                        </Grid>


                    </div>
                </div>
            );
        }
}



