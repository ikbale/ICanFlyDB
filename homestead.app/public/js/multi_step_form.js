// Function that executes on click of first next button.
function next_step1() {
document.getElementById("first").style.display = "none";
document.getElementById("second").style.display = "block";
document.getElementById("active2").style.color = "red";
}
// Function that executes on click of first previous button.
function prev_step1() {
document.getElementById("first").style.display = "block";
document.getElementById("second").style.display = "none";
document.getElementById("active1").style.color = "red";
document.getElementById("active2").style.color = "gray";
}
// Function that executes on click of second next button.
function next_step2() {
document.getElementById("second").style.display = "none";
document.getElementById("third").style.display = "block";
document.getElementById("active3").style.color = "red";
}
// Function that executes on click of second previous button.
function prev_step2() {
document.getElementById("third").style.display = "none";
document.getElementById("second").style.display = "block";
document.getElementById("active2").style.color = "red";
document.getElementById("active3").style.color = "gray";
}

// Function that executes on click of third next button.

function next_step3() {
document.getElementById("third").style.display = "none";
document.getElementById("fourth").style.display = "block";
document.getElementById("active4").style.color = "red";
}
// Function that executes on click of third previous button.
function prev_step3() {
document.getElementById("fourth").style.display = "block";
document.getElementById("third").style.display = "none";
document.getElementById("active3").style.color = "red";
document.getElementById("active4").style.color = "gray";
}

// Function that executes on click of fourth next button.
function next_step4() {
document.getElementById("fourth").style.display = "none";
document.getElementById("fifth").style.display = "block";
document.getElementById("active5").style.color = "red";
}
// Function that executes on click of fourth previous button.
function prev_step4() {
document.getElementById("fifth").style.display = "none";
document.getElementById("fourth").style.display = "block";
document.getElementById("active4").style.color = "red";
document.getElementById("active5").style.color = "gray";
}