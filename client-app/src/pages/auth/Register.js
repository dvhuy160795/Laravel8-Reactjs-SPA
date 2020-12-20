import React, {useState, useEffect, useRef} from 'react'
import { useTranslation } from 'react-i18next';

import Attachment from "components/Attachment";
import {register} from "api/auth";
import Messages from "components/Messages";

const FormUser = () => {
    const [email, setEmail] = useState('')
    const [name, setName] = useState('')
    const [password, setPassword] = useState('')
    const [file, setFile] = useState(null)
    const [loading, setLoading] = useState(false)
    const [messages, setMessages] = useState([])

    const { t, i18n } = useTranslation();

    useEffect(() => {
        i18n.changeLanguage('vi');
    }, [loading])

    const submitForm = () => {
        setLoading(true);

        const formData = new FormData()
        formData.append("email", email)
        formData.append("name", name)
        formData.append("password", password)
        formData.append("photo", file)
        return register({
            "email" : email,
            "name" : name,
            "password" : password,
            "photo" : file,
        }).then((response) => {
            setLoading(false)
            const status = response.statusCode;
            if (status === 200) {
                window.location.href = '/';
                return response.data
            }

            setMessages(response.messages);
            setTimeout(() => {
                setMessages([])
            }, 3000);
        })

    }

    const button = (loading) ? "Sending..." : <button type="button" onClick={submitForm}>Submit</button>

    return (
        <>
            <form>
                <h1>{ t('Register form')}</h1>
                <div>
                    <label> Name
                        <input type="text" name="name" value={name} onChange={(el) => setName(el.target.value)}/>
                    </label>
                </div>
                <div>
                    <label> Email
                        <input type="text" name="email" value={email} onChange={(el) => setEmail(el.target.value) }/>
                    </label>
                </div>
                <div>
                    <label> Password
                        <input type="text" name="password" value={password} onChange={(el) => setPassword(el.target.value)}/>
                    </label>
                </div>
                <Messages messages={messages}></Messages>
                <Attachment
                    onFileSelectSuccess={(file) => setFile(file)}
                    onFileSelectError={({ error }) => alert(error)}
                />
                {button}
            </form>
        </>
    )
}

export default FormUser
