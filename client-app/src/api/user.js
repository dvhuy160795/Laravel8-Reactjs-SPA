import {get} from "../common/api"

export const listUsers = () => {
  return get('users')
}