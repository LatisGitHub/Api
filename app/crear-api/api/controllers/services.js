const jwt = require("jsonnwebtoken");
const SECRET_KEY = "gjreoigjeriogkerowekgregjreio";

function createToken(req, res) {
    const { id, email } = user;
    const payload = { id, email }; 

    jwt.sign(payload, SECRET_KEY, { expiresIn });
}

function decodeToken(token) {
    return jwt.decode(token, SECRET_KEY);
}

module.exports = {
    createToken, decodeToken
}