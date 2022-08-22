// import PropTypes from 'prop-types'

const Header = ({ title }) => {
    return (
        <header className='header'>
            <h1>{title}</h1>   
            <button className='btn'>Add</button>
        </header>
    )
}

Header.defaultProps = {
    title: 'Manage blogs',
}

// Header.propTypes = {
//     title: PropTypes.string.isRequired,
// }

export default Header
