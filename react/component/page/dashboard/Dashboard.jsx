import React from 'react';
import { Image, Statistic, Divider } from 'semantic-ui-react'




export default class Dashboard extends React.Component {



    render() {


        return(
            <div className="container-dashboard"  >
                <Image className="avatar-dashboard" src='http://react.semantic-ui.com/assets/images/wireframe/square-image.png' avatar />
                <span>Jibé</span>

                <Divider />

                <div className="dashboard-content">
                    <div className="dashboard-stat">

                        <Statistic value='137' label='Agences' />
                    </div>
                </div>
            </div>
        )
    }
}


