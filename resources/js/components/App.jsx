import React from 'react'
import ReactDOM from 'react-dom'

function App() {
    return (
        <div className="App">
            <h1>hello from react</h1>
        </div>
    )
}

export default App

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'))
}
