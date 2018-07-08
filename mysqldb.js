const mysql = require('mysql');
//connect to db
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