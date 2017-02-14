//function connect() {
    var mysql = require( 'mysql' );
    var con = mysql.createConnection({
        host        : 'tutorial-db-instance.czfcbjitgaux.us-east-2.rds.amazonaws.com',
        port        : '3306',
        user        : 'tutorial_user',
        password    : 'ghost2501',
        database    : 'sample' 
    });

    con.connect(function(err){
        if(err){
            console.log(err);
            console.log('Error connecting to DB');
            return;
        }
        console.log('Connection successful');
    });

    // con.query('SELECT * FROM Photos', function(err, rows){
    //     if(err) throw err;

    //     console.log('Data received from DB');
    //     console.log(rows);
    // });

    con.end(function(err){

    });
//}