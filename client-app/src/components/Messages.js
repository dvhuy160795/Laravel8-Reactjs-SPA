import React from 'react'

const Messages = ({...prop}) => {
    return prop.messages.map((message) => <div key={message}>{message}</div>)
}

export default Messages;
