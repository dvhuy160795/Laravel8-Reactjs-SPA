import React from 'react'
import { BrowserRouter, Route, Switch} from 'react-router-dom'
import {Provider} from 'react-redux'
import routers from 'router'
import './App.css'
import configureStore from "reducers/store"

const {store} = configureStore()

/**
 * Init render by route
 * @returns {*}
 * @constructor
 */
function App() {
  return (
      <Provider store={store}>
          <BrowserRouter>
            <Switch>
              {routers.map((router) => {
                  return (<CustomRoute key={router.path} {...router}/>)
              })}
            </Switch>
          </BrowserRouter>
      </Provider>
  );
}

/**
 * Customize router for check auth
 * @param router
 * @returns {*}
 * @constructor
 */
function CustomRoute({...router }) {
    const Layout = router.layout
    const Component = router.component

    return (
        <Route
            path={router.path}
            exact={router.exact}
            render={(props) => (
                <Layout>
                    <Component {...props}/>
                </Layout>
            )}
        />
    );
}

export default App;
