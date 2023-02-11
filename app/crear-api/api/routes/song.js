const express = require('express');
const SongController = require("../controllers/song")
const api = express.Router();
const md_auth = require("../middleware/autenticated")
//Endpoints

//crea la cancion 
api.post("/song", [md_auth.ensureAuth], SongController.createSong);
//lista todas las canciones
api.get("/song", [md_auth.ensureAuth], SongController.getSongs);

//muestra una cancion
api.get("/song/:id", [md_auth.ensureAuth], SongController.getSong);

//elimina una cancion
api.delete("/song/:id", [md_auth.ensureAuth], SongController.deleteSong);

//upgradea la valoracion de una cancion
api.put("/song/:id", [md_auth.ensureAuth], SongController.updateValoracion);

//muestra las canciones de un genero
api.get("/song/otro/:genero", [md_auth.ensureAuth], SongController.getSongsGenre);

//muestra las canciones 10 top
api.get("/song/top/tops", [md_auth.ensureAuth], SongController.getSongsTop);
/*
*/
module.exports = api;
