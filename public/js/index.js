$(window).ready(function () {
   var intev = setInterval(function () {
        var date = new Date();
        document.getElementById("oClock").innerHTML = date.toLocaleTimeString();
   }, 1000);
});
