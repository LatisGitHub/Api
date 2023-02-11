const jwt = require("jsonwebtoken");

const SECRET_KEY ="yhadb87g8AOIhj78gklAljuyglFLKJbolnf087q43ty01b";

function createToken(user, expiresIn){
    const {id, email} = user;
    const payload = {id, email};

    return jwt.sign(payload, SECRET_KEY, {expiresIn});
}


function decodeToken(token){
    return jwt.decode(token, SECRET_KEY);
}

module.exports = ({
    createToken,
    decodeToken,
});