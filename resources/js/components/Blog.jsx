import { FaTimes } from 'react-icons/fa'

const Blog = ({ blog, onDelete }) => {
  return (
    <div className="blog">
      <h3>
        {blog.text} <FaTimes style={{color: 'red', cursor: 'pointer'}} onClick={() => onDelete(blog.id)} />
      </h3>
      <p>{blog.day}</p>
    </div>
  )
}

export default Blog