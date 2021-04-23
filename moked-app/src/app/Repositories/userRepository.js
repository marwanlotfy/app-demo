export class Users {
    constructor(network){
        this.network = network;
    }

    async getAll(){
        try {
            const response = await this.network.authrizedGet('/users');
            return response.users;
        } catch (err) {
            return [];
        }
    }
};