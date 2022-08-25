import { FaTimes } from 'react-icons/fa'

const Blog = ({ blog, onDelete }) => {
  return (
    <div className="blog">
      <h3>
        {blog.name} <FaTimes style={{color: 'red', cursor: 'pointer'}} onClick={() => onDelete(blog.id)} />
      </h3>
      <p>{blog.author}</p>
    </div>
  )
}

export default Blog