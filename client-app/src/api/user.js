import {get} from "../common/api"

export const listUsers = () => {
    return get('users')
}

export const getUser = () => {
    return get('users/1')
}
