import React from 'react'
import Header from "../auth/header";
import Footer from "../auth/header";

const AuthLayout = ({children}) => {
    return <>
            <Header/>
                <div id="auth-content">
                    { children }
                </div>
            <Footer/>
        </>
}

export default AuthLayout;

