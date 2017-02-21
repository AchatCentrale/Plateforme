import React from 'react';
import ActionBar from './component/ActionBar.jsx';
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
        return (
            <div>
                <ActionBar/>
                <h1>coucou</h1>
                {this.props.children}
            </div>
        );
    }
}



render((
    <Router history={browserHistory}>
        <Route exact path="/client/:id" component={App}>
        </Route>
    </Router>
), document.getElementById('app'));