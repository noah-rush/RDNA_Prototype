const express = require('express');
const router = express.Router();
const rateLimit = require('express-rate-limit'); // Limits allowed calls for x amount of ms
const slowDown = require('express-slow-down'); // Slows each following request if spammed
const axios = require('axios'); // Use axios to make http requests
// const example = require('./example.js'); ==> load specifc api file
var mongoose = require("mongoose");


var db = require(".././models");
const uri =  process.env.MONGODB_URI;
// const uri = 'mongodb://localhost/noahjrush'
mongoose.connect(uri);



const limiter = rateLimit({
    windowMs: 30 * 1000,
    max: 10,
});

const speedLimiter = slowDown({
    windowMs: 30 * 1000,
    delayAfter: 1,
    delayMs: 500
});

router.get('/', limiter, speedLimiter, (req, res) => {
    res.json({
        message: 'API - 👋🌎🌍🌏'
    });
});

router.get('/projects/:category', limiter, speedLimiter, (req, res) => {
	var cat = req.params.category
    db.Projects.find({category:cat}).then(data => {
    	console.log(data)
        res.json({
            message: data
        });
    })

});

// router.use('/example-path', example); ==> to be routed to: api/chosen_path for example

module.exports = router;