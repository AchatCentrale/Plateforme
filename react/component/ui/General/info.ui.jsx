import React from 'react';


export default class Info extends React.Component {


    constructor(){
        super()
    }


    render() {
        let styleStatut = {
            backgroundColor : "#60C06C",
            color: "white"
        };


        return(
          <div className="container-info">
              <div className="container-info-gauche">
                  <div className="col-gauche-info">
                      <p>Réference</p>
                      <p>Raison social</p>
                      <p>Siret</p>
                      <p>Secteur</p>
                      <p>Téléphone</p>
                      <p>Catégorie</p>
                  </div>
                  <div className="col-droite-info">
                      <p>FUN_FRA051_0002</p>
                      <p>OrviF</p>
                      <p>184681484848615</p>
                      <p>Assurance</p>
                      <p>06658953</p>
                      <p>∂</p>
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
                      <p style={ styleStatut }>Actif</p>
                      <p>Morgane</p>

                  </div>
              </div>
          </div>
        );
    }


}



