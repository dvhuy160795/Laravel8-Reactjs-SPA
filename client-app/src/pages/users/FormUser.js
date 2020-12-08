import React, {useState, useEffect, useRef} from 'react'

const FormUser = () => {
    const [email, setEmail] = useState('')
    const [name, setName] = useState('')
    const [phone, setPhone] = useState('')
    const [username, setUsername] = useState('')
    const [website, setWebsite] = useState('')
    const [file, setFile] = useState(null)
    const fileUpload = useRef(null)
    return (
        <>
            <form>
                <input type="text" name="email" value={email} onChange={(el) => setEmail(el.target.value) }/>
                <input type="text" name="name" value={name} onChange={(el) => setName(el.target.value)}/>
                <input type="text" name="phone" value={phone} onChange={(el) => setPhone(el.target.value)}/>
                <input type="text" name="username" value={username} onChange={(el) => setUsername(el.target.value)}/>
                <input type="text" name="website" value={website} onChange={(el) => setWebsite(el.target.value)}/>
                <input type="file" name="file" ref={fileUpload} value={file} onChange={(el) => {
                    console.log(el.target.files)
                }}/>
                <button type="button" onClick={() => console.log(file)}>Submit</button>
            </form>
        </>
    )
}

export default FormUser
