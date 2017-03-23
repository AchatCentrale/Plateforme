import React from 'react';
import {Image, Statistic, Divider} from 'semantic-ui-react'


export default class Dashboard extends React.Component {


    getTheCount() {
        let url = 'http://localhost:8000/Agence/count';
        $.getJSON(url, (data) => {

            this.setState({
                count: data
            });
        })

    }


    constructor(props) {
        super(props);

        this.state = {
            count: ''
        };
    }

    componentWillMount() {
        this.getTheCount.call(this);
    }


    render() {


        return (
            <div className="container-dashboard">
                <Image className="avatar-dashboard"
                       src='http://react.semantic-ui.com/assets/images/wireframe/square-image.png' avatar/>
                <span>Jibé</span>

                <Divider />

                <div className="dashboard-content">
                    <div className="dashboard-stat">

                        <Statistic value={this.state.count} label='Agences Roc-Eclerc'/>
                    </div>
                </div>
            </div>
        )
    }
}


