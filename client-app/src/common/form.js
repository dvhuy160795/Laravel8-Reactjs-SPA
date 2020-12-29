
/**
 * Make payload with data
 * @param data
 * @returns {FormData}
 */
export const makeFromData = (data) => {
    const formData = new FormData()

    for (const field in data) {
        formData.append(field, data[field])
    }
    return formData
}

export default {makeFromData}
