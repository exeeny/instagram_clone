import './bootstrap';
import axios from 'axios';

import Alpine from 'alpinejs';

window.Alpine = Alpine;


Alpine.data('fetchData', (userId, follows) => ({
    follows: follows,
    userId: userId,

    async followUser() {

        try {
            const result = await axios.post(`/follow/${userId}`);
            console.log(result.data);
            this.follows = !this.follows
        } catch (error) {
            if(error.response.status === 401){
                window.location.href = '/login';
            }
            
        }
        
    }
}) )

Alpine.data('searchComponent', () => ({
    query: '', 
    results: [],

    async search(){
        try {
            const result = await axios.get(`/search?query=${this.query}`)
            this.results = result.data;
            
            
        } catch (error) {
            console.log(error)
        }
    }

    
}) )



Alpine.start();
console.log('app.js loaded');

