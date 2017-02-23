import React from 'react';
import Info from '../../ui/General/info.ui.jsx'
import ContactList from '../../ui/General/ContactList.ui.jsx'





export default class General extends React.Component {
    render() {
        return(
            <div className="container-general" >
                <Info />
                <ContactList />
            </div>
        );
    }
}

