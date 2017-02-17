var fs = require('fs')
var firebase = require('firebase')

var FBconfig = {
    apiKey: "AIzaSyCHINhK-Q0M5FIALMGszJCZ-RDv-ptOAXE",
    authDomain: "epix-88a72.firebaseapp.com",
    databaseURL: "https://epix-88a72.firebaseio.com",
    storageBucket: "epix-88a72.appspot.com",
    messagingSenderId: "925958180304"
};
firebase.initializeApp(FBconfig);

var ref = firebase.database().ref('new').set('try')
            .then(function() { console.log("it worked"); })
            .catch(function(error) { console.log("it broke"); });