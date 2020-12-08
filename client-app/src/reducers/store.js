import reducer from './index';
import { applyMiddleware, compose, createStore } from 'redux';
import {persistStore } from 'redux-persist';
import reduxThunk from 'redux-thunk';

const isProduction = process.env.NODE_ENV === 'production'
const middlewares = [ reduxThunk ];
let enhancer = null
if (isProduction) {
    enhancer =  compose(applyMiddleware(...middlewares))
} else {
    const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;
    enhancer =  composeEnhancers(applyMiddleware(...middlewares))
}

export default function configureStore() {
    const store = createStore(
        reducer,
        enhancer
    );
    const persistor = persistStore(store);
    return { persistor, store };
}
