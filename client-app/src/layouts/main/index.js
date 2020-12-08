import React from 'react'
import Header from "layouts/main/header";
import Footer from "layouts/main/footer";

const MainLayout = ({children}) => {
    return (
        <>
            <Header/>
            <div id="main-content">
                { children }
            </div>
            <Footer/>
        </>
    )
}

export default MainLayout;
