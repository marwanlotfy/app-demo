// this file is meant to bootstrap all application dependcies 
const Users = require('./Repositories/userRepository').Users;
const AuthManager = require('./Auth/AuthManager').AuthManager;
const Network = require('./Network/Network').Network;
const config = require('./config').config;
const StorageManager = require('./StorageManager').StorageManager;

const appStorageManager = new StorageManager();

const networkAgent = new Network(config , appStorageManager );
const authManager = new AuthManager(networkAgent , appStorageManager );
const users = new Users(networkAgent);


module.exports = {
    users,
    authManager
};