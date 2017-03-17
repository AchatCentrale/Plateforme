import React from 'react';
import Sidebar from '../../ui/Sidebar.jsx';
import ActionBar from '../../../component/ActionBar.jsx';

import { Feed, Icon } from 'semantic-ui-react'



import { Input, Label, Menu, Loader, Segment} from 'semantic-ui-react'

import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';




export default class Actions extends React.Component {



    constructor(props) {
        super(props);

        this.state = {
            clients: [],
            clientsUser: [],

        };
    }
    componentWillMount(){

    }


    render() {

        let currentLocation = this.props;


        return(
            <div>
                <ActionBar context={this.props} />
                <div className="container-general" >
                    <div className="container-info-client">

                        <div className="container-client-action">
                            <h1>Historiques des actions</h1>
                            <Segment.Group horizontal>
                                <Segment>
                                    Terminés
                                </Segment>
                                <Segment>
                                    A faire</Segment>
                            </Segment.Group>
                            <Segment>
                                <Feed>
                                    <Feed.Event>
                                        <Feed.Label>
                                            <img src='http://react.semantic-ui.com//assets/images/avatar/small/elliot.jpg' />
                                        </Feed.Label>
                                        <Feed.Content>
                                            <Feed.Summary>
                                                <Feed.User>Jibé</Feed.User> a effectué un appel téléphonique
                                                <Feed.Date>Il y a 1 heure</Feed.Date>
                                            </Feed.Summary>
                                            <Feed.Meta>
                                                <Feed.Extra text>
                                                    Filet mignon chuck short ribs cupim prosciutto t-bone landjaeger pastrami. Doner fatback
                                                </Feed.Extra>
                                            </Feed.Meta>
                                        </Feed.Content>
                                    </Feed.Event>
                                    <Feed.Event>
                                        <Feed.Label>
                                            <img src='http://react.semantic-ui.com//assets/images/avatar/small/laura.jpg' />
                                        </Feed.Label>
                                        <Feed.Content>
                                            <Feed.Summary>
                                                <Feed.User>Morgane</Feed.User> a envoyer un email
                                                <Feed.Date>Il y a 7 heures</Feed.Date>
                                            </Feed.Summary>
                                            <Feed.Meta>
                                                <Feed.Extra text>
                                                    Swine t-bone frankfurter turkey, brisket shoulder pork. Spare ribs pork cupim ground
                                                </Feed.Extra>
                                            </Feed.Meta>
                                        </Feed.Content>
                                    </Feed.Event>

                                    <Feed.Event>
                                        <Feed.Label>
                                            <img src='http://react.semantic-ui.com//assets/images/avatar/small/elliot.jpg' />
                                        </Feed.Label>
                                        <Feed.Content>
                                            <Feed.Summary>
                                                <Feed.User>Jibé</Feed.User> a effectué une relance
                                                <Feed.Date>Il y a 18 heures</Feed.Date>
                                            </Feed.Summary>
                                            <Feed.Meta>
                                                <Feed.Extra text>
                                                    Swine t-bone frankfurter turkey, brisket shoulder pork. Spare ribs pork cupim ground
                                                </Feed.Extra>
                                            </Feed.Meta>
                                        </Feed.Content>
                                    </Feed.Event>

                                    <Feed.Event>
                                        <Feed.Label>
                                            <img src='http://react.semantic-ui.com//assets/images/avatar/small/helen.jpg' />
                                        </Feed.Label>
                                        <Feed.Content>
                                            <Feed.Summary>
                                                <Feed.User>Evelyne</Feed.User> a effectué un audit
                                                <Feed.Date>Il y a 2 jour</Feed.Date>
                                            </Feed.Summary>
                                            <Feed.Meta>
                                                <Feed.Extra text>
                                                    Swine t-bone frankfurter turkey, brisket shoulder pork. Spare ribs pork cupim ground
                                                </Feed.Extra>
                                            </Feed.Meta>
                                        </Feed.Content>
                                    </Feed.Event>


                                </Feed>
                            </Segment>
                        </div>





                    </div>
                    <div className="container-sidebar">

                        <Menu pointing vertical>
                            <Sidebar content="General" context={currentLocation} />
                            <Sidebar content="Adresse" context={currentLocation} />
                            <Sidebar content="Status" context={currentLocation} />
                            <Sidebar content="Dépenses" context={currentLocation} />
                            <Sidebar content="Actions" context={currentLocation} />
                            <Sidebar content="Hierarchie" context={currentLocation} />
                        </Menu>


                    </div>
                </div>
            </div>
        );
    }

}



