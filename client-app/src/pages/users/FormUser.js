import React, {useState, useEffect, useRef} from 'react'

import Attachment from "components/Attachment";
import {baseURL, handleError, headers} from "common/api";

const FormUser = () => {
    const [email, setEmail] = useState('')
    const [name, setName] = useState('')
    const [phone, setPhone] = useState('')
    const [username, setUsername] = useState('')
    const [website, setWebsite] = useState('')
    const [file, setFile] = useState(null)
    const submitForm = () => {
        let formData = new FormData();
        formData.append("name", name);
        formData.append("file", file);
        console.log(formData.get('file'))
        const request = fetch('http://e_stragegic.local/api/attachments', {
            method: 'POST',
            body: JSON.stringify(formData),
            headers: headers,
        })
            .then((response) => response.json())
            .catch(handleError)
        console.log(request)
    }
    console.log(file)
    return (
        <>
            <form>
                <input type="text" name="email" value={email} onChange={(el) => setEmail(el.target.value) }/>
                <input type="text" name="name" value={name} onChange={(el) => setName(el.target.value)}/>
                <input type="text" name="phone" value={phone} onChange={(el) => setPhone(el.target.value)}/>
                <input type="text" name="username" value={username} onChange={(el) => setUsername(el.target.value)}/>
                <input type="text" name="website" value={website} onChange={(el) => setWebsite(el.target.value)}/>
                <Attachment
                    onFileSelectSuccess={(file) => setFile(file)}
                    onFileSelectError={({ error }) => alert(error)}
                />
                <button type="button" onClick={submitForm}>Submit</button>
            </form>
        </>
    )
}

export default FormUser
