import { Link } from 'react-router-dom';

export default function Nav()
{


    return (
        <nav class='w-[50%] bg-blue-500'>
            <ul class='flex flex-row items-center justify-around border bg-blue-500'>
                <li><Link to="/">Home</Link></li>
                <li><Link to="/login">Login</Link></li>
                <li><Link to="/about">About</Link></li>
            </ul>
        </nav>
    )
}