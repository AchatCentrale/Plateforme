import React from 'react';




export default class Loader extends React.Component {
    render() {
        return(
            <div>
                <div className="container-loader">
                    <p>Chargement..</p>
                    <div className="loader"></div>
                </div>
            </div>
        );
    }
}

