import React from 'react'
import { useState, useEffect } from 'react'
import Header from './Header'
import Blogs from './Blogs'

const App = () => {
    const [blogs, setBlogs] = useState([])

    useEffect(() => {
        const getBlogs = async () => {
            const blogsFromServer = await fetchBlogs()
            setBlogs(blogsFromServer)
        }

        getBlogs()
    }, [])

    // fetch blogs
    const fetchBlogs = async () => {
        const res = await fetch('http://127.0.0.1:8000/blogs/managejson')
        const data = await res.json()

        return data
    }

    // delete blog
    const deleteBlog = (id) => {
        setBlogs(blogs.filter((blog) => blog.id !== id))
    }

    return (
        <div className='
        container'>
            <Header />
            {blogs.length > 0 ? <Blogs blogs={blogs} onDelete={deleteBlog} /> : 'No blogs found.'}
        </div>
    )
}

export default App
