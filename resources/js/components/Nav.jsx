import { Link } from 'react-router-dom';
import { BrowserRouter as Router,useLocation } from 'react-router-dom';
export default function Nav()
{
    const location = useLocation();

    const listClass='hover:text-white transition-all px-5'
    const activeListClass='text-white hover:text-white transition-all px-5'
    return (
        <nav className='min-h-[5%] bg-blue-500 flex flex-row items-center justify-between px-5'>
            <h1 className='text-3xl text-white'>LARAPOSTS</h1>
            <ul className='flex flex-row items-center justify-center  bg-blue-500 p-2 w-1/2'>
    
                <li className={location.pathname == '/'? activeListClass : listClass}><Link to="/">Home</Link></li>
                <li className={location.pathname == '/login'? activeListClass : listClass}><Link to="/login">Login</Link></li>
                <li className={location.pathname == '/about'? activeListClass : listClass}><Link to="/about">About</Link></li>
            </ul>
        </nav>
    )
}