
// Get the elements by their ID
var useropen_up = document.getElementById("useropen_up");
var useropen_in = document.getElementById("useropen_in");
var useropen_pr = document.getElementById("useropen_pr");

var userwindow_up = document.getElementById("userwindow_up");
var userwindow_in = document.getElementById("userwindow_in");
var userwindow_pr = document.getElementById("userwindow_pr");

var userclose_up = document.getElementById("userclose_up");
var userclose_in = document.getElementById("userclose_in");
var userclose_pr = document.getElementById("userclose_pr");


// Show the pop-up window when the link is clicked
try {
    useropen_up.addEventListener("click", function (event) {
        event.preventDefault();
        userwindow_close();
        userwindow_up.style.visibility = "visible";
    });
} catch (e) {
}

try {
    useropen_in.addEventListener("click", function (event) {
        event.preventDefault();
        userwindow_close();
        userwindow_in.style.visibility = "visible";
    });
} catch (e) {
}

try {
    useropen_pr.addEventListener("click", function (event) {
        event.preventDefault();
        userwindow_close();
        userwindow_pr.style.visibility = "visible";
    });
} catch (e) {
}


try {
    userclose_up.addEventListener("click", function () {
        userwindow_close();
    });
} catch (e) {
}

try {
    userclose_in.addEventListener("click", function () {
        userwindow_close();
    });
} catch (e) {
}

try {
    userclose_pr.addEventListener("click", function () {
        userwindow_close();
    });
} catch (e) {
}


function userwindow_close() {
    userwindow_up.style.visibility = "hidden";
    userwindow_in.style.visibility = "hidden";
    userwindow_pr.style.visibility = "hidden";
};

