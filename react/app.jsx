import React from 'react';
import ActionBar from './component/ActionBar.jsx';
import General from './component/page/client/General.jsx'
import Depenses from './component/page/client/Depenses.jsx'
import EtatClient from './component/page/client/EtatClient.jsx'
import Adresse from './component/page/client/Adresse.jsx'
import Hierarchie from './component/page/client/Hierarchie.jsx'
import Actions from './component/page/client/Actions.jsx'
import Sidebar from './component/ui/Sidebar.jsx'
import {render} from 'react-dom';
import {
    Router,
    Route,
    IndexRoute,
    Link,
    browserHistory,
    Redirect,
    IndexRedirect
} from 'react-router';



class App extends React.Component {
    render() {

        let currentLocation = this.props;
        console.log(currentLocation);


        return (
            <div>
                <ActionBar/>

                <div className="container-content">
                    <div className="container-page" >
                        {this.props.children}
                    </div>

                    <div className="container-sidebar">
                       <Sidebar content="General" context={currentLocation} />
                       <Sidebar content="Adresse" context={currentLocation} />
                       <Sidebar content="Status" context={currentLocation} />
                       <Sidebar content="Dépenses" context={currentLocation} />
                       <Sidebar content="Actions" context={currentLocation} />
                       <Sidebar content="Hierarchie" context={currentLocation} />
                    </div>
                </div>

            </div>
        );
    }
}



render((

    <Router history={browserHistory}>
        <Route name="app" path="/client/:id" component={App}>
            <IndexRoute component={General}/>
            <Route path="General" component={General} />
            <Route path="Adresse" component={Adresse} />
            <Route path="Status" component={EtatClient} />
            <Route path="Dépenses" component={Depenses} />
            <Route path="Actions" component={Actions} />
            <Route path="Hierarchie" component={Hierarchie} />
        </Route>
    </Router>
), document.getElementById('app'));