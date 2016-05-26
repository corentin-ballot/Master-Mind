$(function() { 
    $("#0").change(function(data) {
        var elem = document.getElementById("0");
        elem.setAttribute("class", "form-control " + elem.options[elem.selectedIndex].className);
    });
    $("#1").change(function(data) {
        var elem = document.getElementById("1");
        elem.setAttribute("class", "form-control " + elem.options[elem.selectedIndex].className);
    });
    $("#2").change(function(data) {
        var elem = document.getElementById("2");
        elem.setAttribute("class", "form-control " + elem.options[elem.selectedIndex].className);
    });
    $("#3").change(function(data) {
        var elem = document.getElementById("3");
        elem.setAttribute("class", "form-control " + elem.options[elem.selectedIndex].className);
    });
});