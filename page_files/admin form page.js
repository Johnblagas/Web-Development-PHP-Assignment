'use strict';

let createDBButton = document.getElementById("createDBButton");
let printInfoButton = document.getElementById("printInfoButton");
let searchButton = document.getElementById("searchButton");
let submitButton = document.getElementById("submitButton");
let logoutButton = document.getElementById("logoutButton");

logoutButton.addEventListener('click', function(){
    window.location = "logout.php";
});

createDBButton.addEventListener('click', function(){
    window.location = "createDB.php";
});

printInfoButton.addEventListener('click', function(){
    window.location = "showDB.php";
});

searchButton.addEventListener('click', function(){

    if(document.getElementById("searchbar").style.visibility == ""){
        document.getElementById("searchbar").style.visibility = "visible";
    }
    else{
        document.getElementById("searchbar").style.visibility = "";
    }
});

submitButton.addEventListener('click', function(){
    window.location = "searchDB.php";
});