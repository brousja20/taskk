import './bootstrap'

import React from 'react'
import ReactDOM from 'react-dom'

import App from './components/App'
// import Header from './components/Header'

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'))
}
