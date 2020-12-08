import {getToken, removeToken} from './token'

export const baseURL = 'https://jsonplaceholder.typicode.com/'
export const headers = {
  'Content-type': 'application/json; charset=UTF-8',
  'Authorization': `Bearer ${getToken()}`
}

export const get = (resource) => {
  return fetch(baseURL + resource)
      .then((response) => response.json())
      .catch(handleError)
}

/**
 * Call api with method POST
 * @param resource
 * @param data
 * @returns {*}
 */
export const post = (resource, data) => {
  return fetch(baseURL + resource, {
    method: 'POST',
    body: JSON.stringify(data),
    headers: headers,
  })
      .then((response) => response.json())
      .catch(handleError)
}

/**
 * Call api with method PUT
 * @param resource
 * @param data
 * @returns {*}
 */
export const put = (resource, data) => {
  return fetch(baseURL + resource, {
    method: 'PUT',
    body: JSON.stringify(data),
    headers: headers,
  })
      .then((response) => response.json())
      .catch(handleError)
}

/**
 * Call api with method PATCH
 * @param resource
 * @param data
 * @returns {*}
 */
export const patch = (resource, data) => {
  return fetch(baseURL + resource, {
    method: 'PATCH',
    body: JSON.stringify(data),
    headers: headers,
  })
      .then((response) => response.json())
      .catch(handleError)
}

/**
 * Call api with method DELETE
 * @param resource
 * @param data
 * @returns {*}
 */
export const deleted = (resource) => {
  return fetch(baseURL + resource, {
    method: 'DELETE',
  })
}

/**
 * Perform a custom Axios request.
 *
 * data is an object containing the following properties:
 *  - method
 *  - url
 *  - data ... request payload
 *  - auth (optional)
 *    - username
 *    - password
 **/
export const customRequest = (method, resource, data) => {
  return fetch(baseURL + resource, {
    method: method,
    body: JSON.stringify(data),
    headers: headers,
  })
      .then((response) => response.json())
      .then((json) => console.log(json))
      .catch(handleError)
}

/**
 * Handle error from API
 * @param error
 */
export const handleError = error => {
    if (!error.response) {
        console.log(error)
        return
    }
    const status = error.response.status;

    if (status === 401) {
        removeToken()
        alert('Permission denied!')
    }

    if (status === 403) {
        alert('Permission denied!')
    }
}

export default {
  baseURL, headers, get, post, put, patch, deleted, customRequest, handleError
}
