import React from 'react'
import Header from "../auth/header";
import Footer from "../auth/footer";

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

