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
    text-align: center;
}
button, input[type="submit"], input[type="button"] {
    font-size: 1.5em;
    margin: 0.2em;
    border: 1px solid black;
    background-color: #fff;
    line-height: 2em;
    padding: 0 0.75em;
}

button:hover {
    opacity: 0.8;
}

button:focus {
    background-color: #000;
    color: #fff;
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
function updatePhase(phase) {
    $.ajax({
        method: "POST",
        url: "./handler.php",
        data: { "phase": phase }
    }).done((msg) => {
        console.log( "New phase: " + msg['new_phase'] );
    });
}
updatePhase(0);

$(() => {
    $("button").click((event) => {
        var phase = parseInt($(event.target).data("phase"));
        updatePhase(phase);
    });

    $("#reset").click(() => {

    });
});
</script>

<body>

<main>
    <h1>Marshmallow Feeder</h1>
    <div id="visual">
    </div>
    <button data-phase="0">Move to Start State</button>
    <button data-phase="1">Move to Marshmallow</button>
    <button data-phase="2">Grip Marshmallow</button>
    <button data-phase="3">Move to Mouth</button>
    <button data-phase="4">Release Marshmallow</button>
    <button data-phase="5">Start Autonomous</button>
    <button data-phase="6">Reset Phase</button>
    <br />
</main>

</body>
</html>
