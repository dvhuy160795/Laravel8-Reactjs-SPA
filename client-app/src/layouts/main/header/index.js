import React from 'react'
import styled from 'styled-components';

const Wrapper = styled.div`
    color: red;
    .logo {
      color: blue;
    }
    display: flex;
`


const WrapperMenu = styled.div`
   display: ${p => p.isMenuInline ? 'flex' : 'block'};
   align-items: center;
   padding: 0 15px;
   justify-content: space-between;
   max-width: 400px;
   .menu-item {
    padding: 0 15px;
   }
`


const Menu = () => {
    return <WrapperMenu isMenuInline={false}>
        {['menu1', 'menu2'].map(item =>
            <div className="menu-item" key={item}>
                {item}
            </div>
        )}
    </WrapperMenu>
}


const WrapperMenuHeader = styled(Menu)`
  color: green !important;
`

const Header = () => {
    return <Wrapper>
        <div className="logo">Logo</div>
        <WrapperMenuHeader/>
    </Wrapper>
}

export default Header;
