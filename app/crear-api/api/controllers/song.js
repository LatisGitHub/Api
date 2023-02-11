const {
    restart
} = require("nodemon");
const Song = require("../models/song");

async function createSong(req, res) {
    const song = new Song();
    const params = req.body;


    song.titulo = params.titulo;
    song.grupo = params.grupo;
    song.duracion = params.duracion;
    song.anio = params.anio;
    song.genero = params.genero;
    song.puntuacion = params.puntuacion;


    song.description = params.description;

    try {
        //insertar en mogodb
        const songStore = await song.save();

        if (!songStore) {
            restart.status(400).send({
                msg: "cancion no guardada"
            })
        } else {
            res.status(200).send({
                cancion: songStore
            });
        }
    } catch (error) {
        res.status(500).send(error);

    }
}
async function getSongs(req, res) {
    try {
        const songs = await Song.find();
        if (!songs) {
            res.status(400).send("error al obtener las canciones.");
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        restart.status(500).send(error);
    }
}



async function deleteSong(req, res) {
    const idSong = req.params.id;
    try {
        const song = await Song.deleteOne({_id: idSong});
        //const task = await Task.findByIdAndDelete(idTask);
        if (!song) {
            res.status(400).send("error al borrar la cancion.");
        } else {
            res.status(200).send("cancion borrada");
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

//le suma a la canción del id una nueva valoración que vaya en formato JSON en el body de la request.
async function updateValoracion(req, res) {
    const idSong = req.params.id;
    const cuerpo = req.body;
    cuerpo.puntuacion;
    try {
        const songs = await Song.findByIdAndUpdate(idSong, { $inc: { puntuacion: cuerpo.puntuacion } });
        if (!songs) {
            res.status(400).send({ "msg": "error al actualizar la cancion" })
        } else {
            res.status(200).send({ msg: "cancion actualizada" })
        }
    } catch (error) {
        res.status(500).send(error);
    }
   
}

async function getSong(req, res) {
    const idSong = req.params.id;
    try {
        const song = await Song.findById(idSong);
        if (!song) {
            res.status(400).send("error al obtener la cancion.");
        } else {
            res.status(200).send(song);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function getSongs(req, res) {
    try {
        const songs = await Song.find();
        if (!songs) {
            res.status(400).send("error al obtener las canciones.");
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        restart.status(500).send(error);
    }
}

async function getSongsGenre(req, res) {
    const genre = req.params.genero;
    try {
        const songs = await Song.find({ genero: genre});
        if (!songs) {
            res.status(400).send("error al obtener la cancion.");
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        res.status(500).send(error);
    }
}

async function getSongsTop(req, res) {
    try {
        const songs = await Song.find().sort({ puntuacion: -1 }).limit(10); 
        if (!songs) {
            res.status(400).send("error al obtener las canciones top.");
        } else {
            res.status(200).send(songs);
        }
    } catch (error) {
        restart.status(500).send(error);
    }
}
module.exports = {
    createSong,
    getSongs,
    deleteSong, 
    updateValoracion,
    getSong,
    getSongsGenre,
    getSongsTop
}