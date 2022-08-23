import Blog from "./Blog"

const Blogs = ({ blogs, onDelete }) => {
  return (
    <>
        {blogs.map((blog) => (
            <Blog key={blog.id} blog={blog} onDelete={onDelete} />
        ))}
    </>
  )
}

export default Blogs