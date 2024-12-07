import React from 'react';
import { Route, Routes } from 'react-router-dom';  // Importation des routes de React Router
import { BrowserRouter as Router } from 'react-router-dom';
import Home from '../Home';
import About from '../About';
import Login from '../Login';

import Nav from '../../components/Nav';
const App = () => {
    return (
        <div className='h-screen bg-slate-100'>
            
            <Nav/>
           
           <main className='min-h-[90%] border-2 p-2'>

           
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/about" element={<About />} />
                <Route path="/login" element={<Login />} />
            </Routes>
            </main>
        </div>
    );
};

export default App;