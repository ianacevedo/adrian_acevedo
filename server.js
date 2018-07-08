const express = require('express');
const app = express();
const con = require('./libs/db');
//const mysql = require('mysql');
const bodyParser = require('body-parser');
//const cors = require('cors');
const orm = require('orm');
const jwt = require('jsonwebtoken');
//const db = require('db');
var bcrypt = require('bcryptjs'); 
var config = require('./config');
var pug = require('pug');
app.use(bodyParser.urlencoded({extended: true}));
app.use(bodyParser.json());
//app.use(con);
//app.use(cors);
//app.use(pug);
/*//connect to db
const con = mysql.createConnection({
	host:'localhost',
	user:'root',
	password:'',
	database:'aacevedo_db'	
});

//check connectionn
try{
con.connect(function(err) {
  //if (err) throw err;
  console.log("Connected!");
});
}catch(e){ console.log('not connected');}
*/
//API
//get all
app.get('/person', function (req, res) {
	con.query("SELECT * FROM person", function (err, result, fields) {
		if (err) throw err;
		let rest = eval(JSON.stringify(result));
		
		res.json(result);
	  });
});
//get details for person
app.get('/person/:id', function (req, res) {  
	con.query("SELECT * FROM person where id="+req.params.id, function (err, result, fields) {
		if (err) throw err;
		let rest = eval(JSON.stringify(result));
		res.json(result);
	  });
});
//post/add mew
app.post('/person', function (req, res) {
	con.query("insert into person(first_name,last_name,contact_number) values('"+ req.body.first_name+"','"+req.body.last_name+"','"+req.body.contact_number+"')", function (err, result, fields) {
		if (err) throw err;
		res.json(result)
	});	
});
//put/update
app.put('/person/:id', function (req, res) {   
	con.query("update person set first_name='"+req.body.first_name+"',last_name='"+req.body.last_name+"',contact_number='"+req.body.contact_number+"' where id="+req.params.id, function (err, result, fields) {
		if (err) throw err;
		res.json(result);
	});
	
});
//delete
app.delete('/person/:id', function (req, res) {
	con.query("delete from person where id="+req.params.id, function (err, result, fields) {
		if (err) throw err;
		res.json(result);
	});
});

//setup server
var server = app.listen(8081, function () {
   var host = server.address().address
   var port = server.address().port
   console.log("System App listening at http://%s:%s", host, port)
});

