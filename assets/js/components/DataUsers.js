import React, { useState, useEffect } from 'react';
import axios from 'axios';
import moment from 'moment';

export const DataUsers = () => {
    const [users, setUsers] = useState([]);
    useEffect(() => {
        axios.get(`http://localhost:8000/api/dataUsers`).then(result => {
            setUsers(result.data);
        })
    }, [])
    return (
        <div className="accordion" id="accordion_user_data">
            {users.map(user => (
                <div key={user.id} className="accordion-item">
                    <h2 className="accordion-header" id="headingOne">
                        <button className="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target={"#collapseOne" + user.id} aria-expanded="true" aria-controls="collapseOne">
                            <strong className="titleCard">IP del usuario:</strong>{user.ip_user}
                        </button>
                    </h2>
                    <div id={"collapseOne" + user.id} className="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordion_user_data">
                        <div className="accordion-body">
                            <div><strong className="titleBodyCard">Id del registro:</strong>{user.id}</div>
                            <div><strong className="titleBodyCard">Fecha de creación: </strong>{moment(user.creation_date.date).format('MM/DD/YYYY hh:mm:ss a')}</div>
                            {user.update_date != null && <div><strong className="titleBodyCard">Fecha de actualización: </strong> {moment(user.update_date.date).format('MM/DD/YYYY hh:mm:ss a')}</div>}
                            <div><strong className="titleBodyCard">Navegador del usuario:</strong>{user.user_agent}</div>
                            <div><strong className="titleBodyCard">Codigo del país:</strong>{user.country_code}</div>
                            <div><strong className="titleBodyCard">Clave del evento:</strong>{user.event_code}</div>
                        </div>
                    </div>
                </div>
            ))}
        </div>
    )
}
