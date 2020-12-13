import React from 'react'
import styled from 'styled-components';

import ListUser from "pages/users/ListUser";
import CurrentUser from "pages/users/CurrentUser";
import Register from "pages/auth/Register";

const UsersWrapper = styled.div`
  color: #1c4b30;
  button {
    color: red;
  }
`
const Users = () => {
    return (
        <UsersWrapper>
            <Register/>
            {/*<ListUser/>*/}
            {/*<CurrentUser/>*/}
        </UsersWrapper>
    )
}

export default Users
