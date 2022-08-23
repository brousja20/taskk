import React from 'react'
import { useState } from 'react'
import Header from './Header'
import Blogs from './Blogs'

const App = () => {
    const [blogs, setBlogs] = useState([
        {
            id: 1,
            text: 'asd',
            day: 'mon',
            reminder: false,
        },
        {
            id: 2,
            text: 'xyz',
            day: 'tuesday',
            reminder: true,
        },
        {
            id: 3,
            text: 'jkl',
            day: 'wednesday',
            reminder: false,
        },
      ])

    // delete blog
    const deleteBlog = (id) => {
        console.log('delete', id)
    }

    return (
        <div className='
        container'>
            <Header />
            <Blogs blogs={blogs} onDelete={deleteBlog} />
        </div>
    )
}

export default App
