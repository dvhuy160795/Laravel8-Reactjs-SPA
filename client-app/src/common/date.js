/**
 * Get date after days
 * @param days
 * @returns {Date}
 */
export const getDayAfter = (days) => {
  return new Date(Date.now() + days * 24 * 60 * 60 * 1000)
}

/**
 * @returns {Date}
 */
export const getInstance = () => {
  return new Date()
}

const DateTime = {
  getDayAfter, getInstance
}

export default DateTime
