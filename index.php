<?php
// file_put_contents("./marshmellow", "hellooo");
?>
<!doctype html>
<html>

<head>

<title>Marshmallow</title>

<style>
* {
    margin: 0;
    padding: 0;
    font-weight: 400;
}
body {
    background-color: #eee;
    font-family: sans-serif;
}
main {
    width: 50em;
    margin: 5em auto;
}
button, input[type="submit"], input[type="button"] {
    border: 1px solid black;
    background-color: #fff;
    line-height: 2em;
    padding: 0 0.75em;
}

#visual {
    margin: 1.5em 0;
    background-color: #aaa;
    width: 100%;
    height: 30em;
}
</style>

</head>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script>
var phase = 0;

function updatePhase() {
    phase++;

    if (phase > 3) {
        $('#next').hide();
    }

    $.ajax({
        method: "POST",
        url: "./handler.php",
        data: { "phase": phase }
    }).done((msg) => {
        console.log( "New phase: " + msg['new_phase'] );
    });
}
updatePhase();

$(() => {
    $("#next").click(() => {
        updatePhase();
    });
});
</script>

<body>

<main>
    <h1>Marshmallow Feeder</h1>
    <div id="visual">
    </div>
    <button id="next">Next</button>
    <br />
</main>

</body>
</html>
