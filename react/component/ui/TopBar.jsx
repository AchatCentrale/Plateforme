import React from 'react';




export default class TopBar extends React.Component {



    render() {
        return (

            <div>
                <div className="recherche">

                    <div className="ajout">
                        <div className="boule-verte"></div>
                        <input type="text" placeholder="Recherche" />
                    </div>

                    <div className="ajout">
                        <div className="loupe">
                            🔍
                        </div>
                        <input type="text" placeholder="Recherche" />
                    </div>

                    <div className="notification">

                    </div>



                </div>




            </div>
        );
    }
}

