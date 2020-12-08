import React from 'react'

import ListUser from "pages/users/ListUser";
import CurrentUser from "pages/users/CurrentUser";
import FormUser from "pages/users/FormUser";

const Users = () => {
    return (
        <>
            <FormUser/>
            <ListUser/>
            <CurrentUser/>
        </>
    )
}

export default Users
