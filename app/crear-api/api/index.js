const mongoose = require('mongoose');
const app = require('./app');
const port = 3000
const urlMongo = "mongodb+srv://latimongodb:passwordmongodb@cluster0.tobmmc3.mongodb.net/songs";

mongoose.set('strictQuery',false);

mongoose.connect(urlMongo, {
  useNewUrlParser: true, 
  useUnifiedTopology: true
}, (err, res) => {
  try {
    if (err) {
      throw err;
    } else {
      console.log("la conexion a la bbdd es correcta")


      app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
      })
    }
  } catch (err) {
    console.error(err);

  }
});



/*
app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})*/