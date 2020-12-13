import React, { Suspense } from 'react';
import { useTranslation } from 'react-i18next';
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
function App({t}) {
  return (
      <Provider store={store}>
          <BrowserRouter>
            <Switch>
                <Suspense fallback="loading">
                    {routers.map((router) => {
                        return (<CustomRoute key={router.path} {...router}/>)
                    })}
                </Suspense>
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
