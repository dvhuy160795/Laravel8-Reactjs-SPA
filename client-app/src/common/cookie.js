import {getDayAfter} from './date'

/**
 * Get cookie by key
 * @param key
 * @returns {string}
 */
export const getCookie = (key) => {
  const name = key + '='
  const decodedCookie = decodeURIComponent(document.cookie)
  const cookieArray = decodedCookie.split(';')

  for (let i = 0; i < cookieArray.length; i++) {
    let cookie = cookieArray[i]
    while (cookie.charAt(0) === ' ') {
      cookie = cookie.substring(1)
    }
    if (cookie.indexOf(name) === 0) {
      return cookie.substring(name.length, cookie.length)
    }
  }
  return ''
}

/**
 * Set data cookie
 * @param key
 * @param value
 * @param expriedDays
 */
export const setCookie = (key, value, expriedDays) => {
  document.cookie = key + '=' + value + '; expires=' + getDayAfter(expriedDays) + '; path=/'
}

/**
 * Remove cookie by key
 * @param key
 */
export const removeCookie = (key) => {
  document.cookie = key + '=; expires=Thu, 18 Dec 2013 12:00:00 UTC; path=/'
}

const Cookie = {
  getCookie, setCookie, removeCookie
}

export default Cookie
