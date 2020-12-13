import {post} from "../common/api"

export const register = (data) => {
    return post('auth/register', data)
}

export const login = () => {
    return post('users/1')
}
