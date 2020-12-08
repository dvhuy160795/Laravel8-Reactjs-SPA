import {listUsers, getUser} from "api/user";

export const GET_LIST_USERS = 'user/GET_USERS'
export const GET_DETAIL_USERS = 'user/GET_USER'
const initialState = {
    listUsers: null,
    detailUser: null,
};

export const getListUsers = () => {
    return (dispatch, getState) => {
        listUsers().then((response) => dispatch(
            {
                type: GET_LIST_USERS,
                payload: {
                    listUsers: response
                }
            }
        ));
    }
}

export const getDetailUser = () => {
    return (dispatch, getState) => {
        getUser().then((response) => dispatch(
            {
                type: GET_DETAIL_USERS,
                payload: {
                    detailUser: response
                }
            }
        ));
    }
}

const userReducers = (state = initialState, action) => {
    const {type, payload} = action;
    switch (type) {
        case GET_LIST_USERS :
        case GET_DETAIL_USERS :
            return {...state, ...payload};
        default:
            return {...state}
    }
};

export default userReducers;
