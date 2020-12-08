import {listUsers} from "api/user";

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

const userReducers = (state = initialState, action) => {
    const {type, payload} = action;
    switch (type) {
        case GET_LIST_USERS :
            return {...state, ...payload};
        default:
            return {...state}
    }
};

export default userReducers;
