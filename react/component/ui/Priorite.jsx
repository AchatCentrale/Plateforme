import React from "react";
import {Dropdown, Label} from "semantic-ui-react";

const options = [
    {
        key: 1,
        text: 'Basse',
        value: 1,
        content:
            <Label color='blue'>
                !
                 <Label.Detail>Basse</Label.Detail>
            </Label>,
    },
    {
        key: 2,
        text: 'Moyenne',
        value: 2,
        content: <Label color='green'>
            !!
            <Label.Detail>Moyenne</Label.Detail>
        </Label>,
    },
    {
        key: 3,
        text: 'Haute',
        value: 3,
        content: <Label color='orange'>
            !!!
            <Label.Detail>Haute</Label.Detail>
        </Label>,
    },
    {
        key: 4,
        text: 'Urgente',
        value: 3,
        content: <Label color='red'>
            !!!!
            <Label.Detail>Urgente</Label.Detail>
        </Label> ,
    },
]

const Priorite = () => (
    <Dropdown
        selection
        fluid
        options={options}
        placeholder='Priorité'
    />
)

export default Priorite