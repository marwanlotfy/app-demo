export class StorageManager{

    setAuthorizationToken(token){
        sessionStorage.setItem('auth_token',token);
    }

    getAuthorizationToken(){
        return sessionStorage.getItem('auth_token');
    }

    setAuthorization( status ){
        if ( status == true ) {
            sessionStorage.setItem('authorized',true);
        }else{
            sessionStorage.removeItem('authorized');
        }
    }

    getAuthorization(){
        return !!sessionStorage.getItem('authorized');
    }

    
}