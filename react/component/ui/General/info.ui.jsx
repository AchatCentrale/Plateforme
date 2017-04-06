import React from 'react';


import {Label, Icon} from 'semantic-ui-react'


export default class




Info extends React.Component {


    constructor(props) {
        super(props);


    }


    componentWillMount() {

    }


    render() {


        const siret = (siret) => {


            console.log(siret);
            let result = [];
            for (let i = 0; i <= siret.length; i++) {

                if (i === 3) {
                    result.push(siret.substring(0, 3), " ")

                } else if (i === 6) {
                    result.push(siret.substring(3, 6), " ")

                } else if (i === 9) {
                    result.push(siret.substring(6, 9), " ")

                } else if (i > 9 && i < 14) {
                    result.push(siret.substring(9), " ")
                    console.log(result)
                    return result

                }
            }


        };


        const tel = (tel) => {

            let result = [];
            let len = tel.length;


            for (let i = 10; i > 0; i -= 2) {
                result.push(tel.substring(i - 2, i));

            }

            result.reverse();
            tel = result.join(' ');

            return tel

        };


        const status = (status) => {

            if (status === 1) {
                return (<p><Label color='green'>
                    actif
                </Label></p>)
            } else {
                return (<p><Label color='red'>
                    Inactif
                </Label></p>)

            }

        };


        return (
            <div className="container-info">
                <div className="container-info-gauche">
                    <div className="col-gauche-info">
                        <p>Référence</p>
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
                        <p><Label>
                            {siret(this.props.clients.clSiret)}
                        </Label></p>
                        <p>
                            <Label>
                                <Icon name='call'/>{tel(this.props.clients.clTel)}
                            </Label>
                        </p>

                    </div>
                </div>
                <div className="container-info-droite">
                    <div className="col-gauche-info">
                        <p>Nombre de salariés</p>
                        <p>Statut</p>
                        <p>Responsable</p>
                        <p>Groupe</p>
                    </div>
                    <div className="col-droite-info">
                        <p><Label>
                            {this.props.clients.clEffectif}
                        </Label></p>
                        {status(this.props.clients.clStatus)}
                        <p>
                            <Label>
                                <Icon name="user"/>Morgane
                            </Label>
                        </p>
                        <p>
                            <Label color='blue'>
                               V.IP
                            </Label>
                        </p>
                    </div>
                </div>
            </div>
        );
    }


}



