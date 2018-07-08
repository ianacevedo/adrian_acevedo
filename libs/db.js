//connect to db
const mysql = require('mysql');
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

module.export = con;