import React, {useState, useEffect} from 'react';
import axios from 'axios';

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
                        <button className="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target={"#collapseOne"+ user.id} aria-expanded="true" aria-controls="collapseOne">
                            <strong className="titleCard">IP del usuario:</strong>{user.ip_user}
            </button>
                    </h2>
                    <div id={"collapseOne" + user.id} className="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion_user_data">
                        <div className="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
                    </div>
                </div>
            ))}

        </div>
    )
}
