
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
// console.log(JSON.stringify(formData));
    return formData
}

export default {makeFromData}
