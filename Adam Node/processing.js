var ExifImage = require('exif').ExifImage;

console.log("hello")

var dataArray = []
var fileNames = []

// try {
//     new ExifImage({ image : 'Photos/IMG_0091.JPG' }, function (error, exifData) {
//         if (error)
//             console.log('Error: '+error.message);
//         else
//             console.log(exifData); // Do something with your data!
//     });
// } catch (error) {
//     console.log('Error: ' + error.message);
// }


var fs = require( 'fs' );
var path = require( 'path' );
var process = require( "process" );

//currentDirectory = "C:/Users/liqui/Desktop/AutoSlideshow-master/AutoSlideshow-master/Photos"
currentDirectory = "C:/Users/anthonybonitatibus/Documents/AutoSlideshow/Adam Node/Photos"

var numberOfPhotos = []
var counter = 0

fs.readdir(currentDirectory, function(err, files) {
    console.log("number of files = ", files.length)
    files.forEach(function(file, index) {
        // get number of photos in the folder
        // console.log(numberOfPhotos.push(index))
        // print out all the names of the files
        // console.log(file)
        // have to go to where the photos are.
        file2 = "Photos/" + file
        try {
            new ExifImage({ image : file2 }, function (error, exifData) {
                if (error) {
                    console.log('Error: '+error.message);
                }
                else {
                    // console.log(exifData); // Do something with your data!
                    // console.log((exifData))
                    counter++
                    dataArray.push(exifData)
                    // console.log(counter)

                    if (files.length == counter) {
                        makeCSV()
                        console.log("make CSV file")
                    }
                }
            });
        } catch (error) {
            console.log('Error: ' + error.message);
        }
    })
})

var json2csv = require('json2csv');


// console.log(dataArray)

function makeCSV() {
    // console.log("write to csv")
    var fields = ['FNumber', 'ISO', 'DateTimeOriginal', 'ExifImageWidth', 'ExifImageHeight'];
    try {

        for(i = 0; i < counter; i++) {
            // console.log("exif data for the first one", dataArray)
            var result = json2csv({ data: dataArray[i].exif, fields: fields });
            // console.log(result);
            result += ","
            fs.appendFile('data.csv', result, function(err) {
                if (err) {
                    throw err;
                } else {
                    console.log('file saved');
                } 
                });
        }
        
    } catch (err) {
    // Errors are thrown for bad options, or if the data is empty and no fields are provided. 
    // Be sure to provide fields if it is possible that your data array will be empty. 
    console.error(err);
    }
}

function sendToDB() {
    var mysql = require("mysql");
    var con = mysql.createConnection()
}




// var fields = ['field1', 'field2', 'field3'];
// var fields = ['field1', 'field2'];

// var myData = [{
//     "field1": 1,
//     "field2": 2,
//     "field3": 3
// }];

// try {
//   var result = json2csv({ data: myData, fields: fields });
//   console.log(result);
//   fs.writeFile('file.csv', result, function(err) {
//     if (err) {
//         throw err;
//     } else {
//         console.log('file saved');
//     } 
//     });
// } catch (err) {
//   // Errors are thrown for bad options, or if the data is empty and no fields are provided. 
//   // Be sure to provide fields if it is possible that your data array will be empty. 
//   console.error(err);
// }
