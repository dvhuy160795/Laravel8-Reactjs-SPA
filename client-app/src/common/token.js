import Cookie from './cookie'

const TOKEN_KEY = 'access_token'
const REFRESH_TOKEN_KEY = 'refresh_token'

export const getToken = () => {
  return Cookie.getCookie(TOKEN_KEY)
}

/**
 * @param accessToken
 * @param expriedDays
 */
export const saveToken = (accessToken, expriedDays) => {
  Cookie.setCookie(TOKEN_KEY, accessToken, expriedDays)
}

/**
 * Remove token
 */
export const removeToken = () => {
  Cookie.removeCookie(TOKEN_KEY)
}

/**
 * @returns {string}
 */
export const getRefreshToken = () => {
  return Cookie.getCookie(REFRESH_TOKEN_KEY)
}

/**
 * @param refreshToken
 * @param expriedDays
 */
export const saveRefreshToken = (refreshToken, expriedDays) => {
  Cookie.setCookie(REFRESH_TOKEN_KEY, refreshToken, expriedDays)
}

export const removeRefreshToken = () => {
  Cookie.removeCookie(REFRESH_TOKEN_KEY)
}

/**
 * Manage the how Access Tokens are being stored and retreived from storage.
 *
 * Current implementation stores to localStorage. Local Storage should always be
 * accessed through this instace.
 **/
const Token = {getToken, saveToken, removeToken, getRefreshToken, saveRefreshToken, removeRefreshToken}

export default Token
