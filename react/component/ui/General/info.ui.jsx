import React from 'react';


import { Label, Icon } from 'semantic-ui-react'


export default class Info extends React.Component {


    constructor(props){
        super(props);




    }


    componentWillMount(){

    }



    render() {
        let styleStatut = {
            backgroundColor : "#60C06C",
            color: "white"
        };

        let styleStatutFail ={
            backgroundColor : "#801515",
            color: "white"
        };


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
                          <Label.Detail>{this.props.clients.clRef}</Label.Detail>
                      </Label></p>
                      <p><Label>
                          <Label.Detail>{this.props.clients.clRaisonsoc}</Label.Detail>
                      </Label></p>
                      <p> <Label>
                          <Label.Detail>{this.props.clients.clSiret}</Label.Detail>
                      </Label></p>
                      <p><Label>
                          <Label.Detail><Icon name='call' />{this.props.clients.clTel}</Label.Detail>
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
                          <Label.Detail>500-1000</Label.Detail>
                      </Label></p>
                      <p
                          style={
                            (this.props.clients.clStatus === 1)
                                  ? styleStatut
                                  : styleStatutFail
                                }
                      >Actif</p>
                      <p><Label>
                          <Label.Detail><Icon name="user circle outline"/>Morgane</Label.Detail>
                      </Label></p>
                  </div>
              </div>
          </div>
        );
    }


}



