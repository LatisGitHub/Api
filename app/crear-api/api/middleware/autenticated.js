const moment = require("moment");
const jwt = require("../services/jwt");

const SECRET_KEY = "esruhia3jsdfhkldjhq474754waeoñdipawei234or";


function ensureAuth(req, res, next){

    //obtener cabecera peticion
    if(!req.headers.authorization){
        return res.status(403).send({msg: "token no enviado"});
    }


    const token = req.headers.authorization.replace(/['"]+/g, "");
    const payload = jwt.decodeToken(token,SECRET_KEY);

    try{

        //comprobar la caducidad del token
        if(payload.exp <= moment().unix()){

            return res.status(400).send({msg: "token expirado"});

        }



    }catch(error){
        return res.status(400).send({msg: "token invalido"});
    }

    req.user = payload;
        next();

}


module.exports = {
    ensureAuth
}