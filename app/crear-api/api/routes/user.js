const express = require('express');
const UserController = require("../controllers/user")
const api = express.Router();

//registrar usuario
api.post("/user", UserController.register);
api.post("/login", UserController.login);
module.exports = api;