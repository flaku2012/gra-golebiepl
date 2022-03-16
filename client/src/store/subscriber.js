import store from '@/store'
import axios from 'axios'

store.subscribe((mutation) => {
    switch(mutation.type){
        case 'auth/SET_TOKEN':
            if(mutation.payload){
                axios.defaults.headers.common['Authorization'] = `Bearer ${mutation.payload}`
                localStorage.setItem('token' , mutation.payload)
                window.Echo.options.auth.headers['Authorization'] = `Bearer ${mutation.payload}`
            }else{
                axios.defaults.headers.common['Authorization'] = null    
                localStorage.removeItem('token')
                window.Echo.options.auth.headers['Authorization'] = undefined
            }
            break;
        
        // work
        // case 'auth/SET_USER_WORK':
        //     if(mutation.payload){
        //         localStorage.setItem('user_end_time_of_work' , mutation.payload.end_time_of_work)
        //     }else{  
        //         localStorage.removeItem('user_end_time_of_work')
        //     }
        // break;
    }
})