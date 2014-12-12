$(document).ready(function() {
    setInterval(function(){blink()}, 0);
    function blink() {
        $("table tr").find("td.target").css('background-color', '#f8cc6a').fadeTo(500, 0.4).fadeTo(1400, 1.0);
    }
 });

$(document).ready(function() {
    setInterval(function(){blink()}, 0);
    function blink() {
        $("table tr").find("td.target1").css('background-color', '#99CC99').fadeTo(500, 0.6).fadeTo(1800, 1.0);
    }
 });

$(document).ready(function() {
    setInterval(function(){blink()}, 0);
    function blink() {
        $("table tr").find("td.target2").css('background-color', '#CD5C5C').fadeTo(500, 0.6).fadeTo(1300, 1.0);
    }
 });

$(document).ready(function() {
    setInterval(function(){blink()}, 0);
    function blink() {
        $("table tr").find("td.target3").css('background-color', '#7caedf').fadeTo(700, 0.6).fadeTo(1400, 1.0);
    }
 });