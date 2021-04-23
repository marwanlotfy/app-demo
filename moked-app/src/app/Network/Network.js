import axios from "axios";

export class Network{
    
    constructor( config , storageManager){
        this.config = config;
        this.storageManager = storageManager;
    }

    async authrizedGet(api , data = null ){
        let res = await axios.get(`${this.config.apiUrl}${api}`,{
            headers:{
                'Accept':'application/json',
                'Authorization' :`Bearer ${this.storageManager.getAuthorizationToken()}`
            }
        });

        return res.data;
    }

    async post( api , postData ){
       let res = await axios.post(`${this.config.apiUrl}${api}`,postData);
       return res.data;
    }

}