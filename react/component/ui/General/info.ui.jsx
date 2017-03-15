import React from 'react';


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
                      <p>{this.props.clients.clRef}</p>
                      <p>{this.props.clients.clRaisonsoc}</p>
                      <p>{this.props.clients.clSiret}</p>
                      <p>{this.props.clients.clTel}</p>

                  </div>
              </div>
              <div className="container-info-droite">
                  <div className="col-gauche-info">
                      <p>Nombre de salariés</p>
                      <p>Statut</p>
                      <p>Responsable</p>
                  </div>
                  <div className="col-droite-info">
                      <p>500-1000</p>
                      <p
                          style={
                            (this.props.clients.clStatus === 1)
                                  ? styleStatut
                                  : styleStatutFail
                                }
                      >Actif</p>
                      <p>Morgane</p>
                  </div>
              </div>
          </div>
        );
    }


}



