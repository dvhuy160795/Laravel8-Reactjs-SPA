import {getToken, removeToken} from './token'
import {makeFromData} from "common/form";

export const baseURL = 'http://e_stragegic.local/api/'
export const headers = {
    // 'Content-type': 'application/json; charset=UTF-8',
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
    body: makeFromData(data),
    headers: headers,
  })
      .then(handleResponse)
      // .then((response) => response.json())
      // .then(handleResponse)
      // .catch(handleError)
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
    body: JSON.stringify(makeFromData(data)),
    headers: headers,
  })
      .catch(handleError)
      .then(handleResponse)
      .then((response) => response.json())

      .then((json) => console.log(json))

}

/**
 * Handle error from API
 * @param error
 */
const handleError = error => {
    console.log(error);
    if (!error.response) {
        console.log(error)
    } else {
    }
    console.log(error.response)
    return false
}

/**
 * Handle response from API
 * @param response
 */
const handleResponse = response => {
    const status = response.status;
    console.log(response)
    if (status === 200) {
        return response.data
    }

    if (status === 400) {
        alert('Permission denied!')
    }

    if (status === 401) {
        alert('Permission denied!')
    }

    if (status === 403) {
        alert('Permission denied!')
    }

    if (status === 302) {
        alert('invalid')
    }
}

export default {
  baseURL, headers, get, post, put, patch, deleted, customRequest, handleError
}
