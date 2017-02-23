import React from 'react';


export default class ContactList extends React.Component {


    constructor(){
        super()
    }


    render() {
        return(
          <div className="container-contact-list">
              <h3>Liste des contacts</h3>
              <div className="container-table-contact">
                  <table>
                      <thead>
                      <tr>
                          <th>Nom</th>
                          <th>Prénom</th>
                          <th>Téléphone</th>
                          <th>Mail</th>
                          <th>Mot de passe</th>
                          <th>Options</th>
                      </tr>
                      </thead>



                      <tbody>
                      <tr>
                          <td>Carmen</td>
                          <td>33 ans</td>
                          <td>Espagne</td>
                          <td>Espagne</td>
                          <td>Espagne</td>
                          <td>Espagne</td>
                      </tr>
                      <tr>
                          <td>Michelle</td>
                          <td>26 ans</td>
                          <td>États-Unis</td>
                          <td>États-Unis</td>
                          <td>États-Unis</td>
                          <td>États-Unis</td>
                      </tr>
                      <tr>
                          <td>François</td>
                          <td>43 ans</td>
                          <td>France</td>
                          <td>France</td>
                          <td>France</td>
                          <td>France</td>
                      </tr>
                      <tr>
                          <td>Martine</td>
                          <td>34 ans</td>
                          <td>France</td>
                          <td>France</td>
                          <td>France</td>
                          <td>France</td>
                          <td>France</td>
                      </tr>
                      <tr>
                          <td>Jonathan</td>
                          <td>13 ans</td>
                          <td>Australie</td>
                          <td>Australie</td>
                          <td>Australie</td>
                          <td>Australie</td>
                          <td>Australie</td>
                      </tr>
                      <tr>
                          <td>Xu</td>
                          <td>19 ans</td>
                          <td>Chine</td>
                          <td>Chine</td>
                          <td>Chine</td>
                          <td>Chine</td>
                          <td>Chine</td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
        );
    }


}



