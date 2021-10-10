// input JS
window.onload = function () {
    let focusInput = document.getElementById("nameInpute").focus();
}

// color name JS 
let i = 0;

function ChangeColorName() {
    let docColor = document.getElementById("colorSpanName");
    let tableColor = ["grey", "orange", "#00c3ff"];

    docColor.style.color = tableColor[i];
    i = (i + 1) % tableColor.length;
}
setInterval(ChangeColorName, 1000);