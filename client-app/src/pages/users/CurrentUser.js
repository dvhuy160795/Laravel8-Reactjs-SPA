import React, {useEffect} from 'react'
import {useDispatch, useSelector} from "react-redux";
import {getDetailUser} from "reducers/userReducers";

const CurrentUser = () => {
    const dispatch = useDispatch()
    const user = useSelector(store => store.users.detailUser)

    useEffect(() => {
        dispatch(getDetailUser())
    },[])

    if (!user) {
        return (<h1>Loading....</h1>)
    }
    return (
        <>
            <h1>Current User</h1>
            <h3>{ user.name }</h3>
        </>
    )
}

export default CurrentUser
