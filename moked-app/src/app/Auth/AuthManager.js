export class AuthManager{

    constructor( network , storageManager ){
        this.network = network;
        this.storageManager = storageManager;
    }

    async authunticate( credintials ){
        try {
            let res = await this.network.post( '/sessions' , credintials );
            this.storageManager.setAuthorization(true);
            this.storageManager.setAuthorizationToken(res.token);
            return true;
        } catch (err) {
            this.storageManager.setAuthorization(false);
            return false;   
        }

    }

    check(){
        return this.storageManager.getAuthorization();
    }
} 