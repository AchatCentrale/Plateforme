import React from 'react';


import { Label, Icon } from 'semantic-ui-react'


export default class Info extends React.Component {


    constructor(props){
        super(props);




    }


    componentWillMount(){

    }



    render() {



        return(
          <div className="container-info">
              <div className="container-info-gauche">
                  <div className="col-gauche-info">
                      <p>Réference</p>
                      <p>Raison social</p>
                      <p>Siret</p>
                      <p>Téléphone</p>
                  </div>
                  <div className="col-droite-info">
                      <p><Label>
                          {this.props.clients.clRef}
                      </Label></p>
                      <p><Label>
                          {this.props.clients.clRaisonsoc}
                      </Label></p>
                      <p> <Label>
                          {this.props.clients.clSiret}
                      </Label></p>
                      <p><Label>
                          <Icon name='call' />{this.props.clients.clTel}
                      </Label></p>

                  </div>
              </div>
              <div className="container-info-droite">
                  <div className="col-gauche-info">
                      <p>Nombre de salariés</p>
                      <p>Statut</p>
                      <p>Responsable</p>
                  </div>
                  <div className="col-droite-info">
                      <p><Label>
                          500-1000
                      </Label></p>
                      <p><Label color='green' >
                          actif
                      </Label></p>
                      <p><Label>
                          <Icon name="user"/>Morgane
                      </Label></p>
                  </div>
              </div>
          </div>
        );
    }


}



