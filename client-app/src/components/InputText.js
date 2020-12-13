import React, { useState } from 'react'

const Input = ({...props}) => {
    const {value, setValue} = useState(null)

    return (
        <input type="text" name={ props.name } value={ value } onChange={(el) => setValue(el.target.value) }/>
    )
}

export default Input;
