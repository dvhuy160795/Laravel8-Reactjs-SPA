import React from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getListUsers} from "reducers/userReducers";

const Home = () => {
    const dispatch = useDispatch()
    const [page, setPage] = React.useState(1)
    const listUsers = useSelector(store => store.users.listUsers)

    React.useEffect(() => {
        dispatch(getListUsers())
    }, [page])

    if (!listUsers) {
        return (<h1>Loading....</h1>)
    }
    return (<><ul>
        { listUsers.map(user => <li key={user.id}>
            { user.name }
        </li>)}
    </ul>
    <div onClick={() => setPage(page => ++page)} style={{width: 300}}>{page}</div>
    </>)
}

export default Home
