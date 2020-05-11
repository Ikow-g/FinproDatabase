// JSON MANIPULATION IN JS


// OBJECT TO JSON

// let siswa = {
//     nama: "Richard",
//     kelas: "XII RPL I"
// }

// console.log(JSON.stringify(siswa));

// JSON TO OBJECT

//VANILA JAVASCRIPT

//Cara pertama 

// let json = new XMLHttpRequest();
// json.onreadystatechange = function () {
//     if (json.readyState == 4 && json.status == 200) {
//         let siswa = JSON.parse(this.responseText);
//         console.log(siswa);
//     }
// }
// json.open('GET', 'coba.json', true);
// json.send();

// Cara Kedua

// fetch('coba.json')
//     .then(response => {
//         console.log(response.json())
//     });

//JQUERY

// $.getJSON('coba.json', function (data) {
//     console.log(data);
// });

