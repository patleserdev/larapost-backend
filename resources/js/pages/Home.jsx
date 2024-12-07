import React, { useEffect } from 'react';
import PageTitle from '../components/PageTitle.jsx';
export default function Home()
{

    useEffect(()=>{

        (async()=>{
            const response=await fetch('http://localhost:8000/api/users/2',
                 
              {  
                method: 'GET',
                headers: {
                    "Accept": "application/json",
                  }
                }
            )
            const result = await response.json()

            if (result)
            {
                console.log(result)
            }

        })()

    })


    return (
        <div>
<PageTitle>Home</PageTitle>
        </div>
        
       
    )
}