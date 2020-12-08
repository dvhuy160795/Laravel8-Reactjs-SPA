import React, {useEffect} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getListUsers} from "reducers/userReducers";

const ListUser = () => {
    const dispatch = useDispatch()
    const [page, setPage] = React.useState(1)
    const listUsers = useSelector(store => store.users.listUsers)

    useEffect(() => {
        dispatch(getListUsers())
    }, [page])

    if (!listUsers) {
        return (<h1>Loading....</h1>)
    }
    console.log(listUsers)
    return (
        <>
            <h1>List Users</h1>
            <ul>
                { listUsers.map(user => <li key={user.id}>
                    { user.name }
                </li>)}
            </ul>
            <div onClick={() => setPage(page => ++page)} style={{width: 300}}>{page}</div>
        </>
    )
}

export default ListUser
