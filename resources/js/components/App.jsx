import React from 'react';
import { Route, Routes } from 'react-router-dom';  // Importation des routes de React Router
import { BrowserRouter as Router } from 'react-router-dom';
import Home from './Home';
import About from './About';
import Login from './Login';
import Nav from './Nav';
const App = () => {
    return (
        <div className='h-screen bg-white'>
            <h1 className='text-2xl'>Bienvenue sur notre application React!</h1>
            <Nav/>
           
            <Routes>
                <Route path="/" element={<Home />} />
                <Route path="/about" element={<About />} />
                <Route path="/login" element={<Login />} />
            </Routes>
            
        </div>
    );
};

export default App;