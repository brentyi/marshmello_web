<?php
// file_put_contents("./marshmellow", "hellooo");
?>
<!doctype html>
<html>

<head>

<title>Marshmallow Feeder</title>

<style>
* {
    margin: 0;
    padding: 0;
    font-weight: 400;
}
body {
    background-color: #fff;
    font-family: sans-serif;
}
main {
    width: 50em;
    margin: 2em auto;
    text-align: center;
}
em {
    color: #444;
}
button, input[type="submit"], input[type="button"] {
    text-transform: lowercase;
    font-size: 1.5em;
    margin: 0.2em;
    background-color: #000;
    color: #fff;
    border: 1px solid #000;
    line-height: 2em;
    padding: 0 0.75em;
    width: 20.4em;
    border-radius: 0.5em;
}
.half {
    width: 10em;
}

button:focus {
    background-color: #fff;
    color: #000;
    outline: 0;
}

#visual {
    margin: 4em 0 3em 0;
    background-color: #fff;
    background-size: contain;
    background-image: url(assets/marshmallow_grip_alt.jpg);
    background-position: bottom center;
    background-repeat: no-repeat;
    width: 100%;
    height: 30em;
}
#visual[data-phase="0"] {
    background-image: url(assets/marshmallow_calib.jpg);
}
#visual[data-phase="1"] {
    background-image: url(assets/marshmallow_move.jpg);
}
#visual[data-phase="2"] {
    background-image: url(assets/marshmallow_grip.jpg);
}
#visual[data-phase="3"] {
    background-image: url(assets/marshmallow_mouth.jpg);
}
#visual[data-phase="4"] {
    background-image: url(assets/marshmallow_release.jpg);
}
#visual[data-phase="5"] {
    background-image: url(assets/marshmallow.gif);
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
        // $("#visual").data("phase", phase);
        $("#visual").attr("data-phase", phase);
        updatePhase(phase);
    });

    $("#reset").click(() => {

    });
});
</script>

<body>

<main>
    <div id="visual"></div>
    <button data-phase="5">Full Sequence</button>
    <button data-phase="0">Reset</button>
    <br />
    <br />
    <button class="half" data-phase="1">Marshmallow</button>
    <button class="half" data-phase="2">Grip</button>
    <br />
    <button class="half" data-phase="3">Mouth</button>
    <button class="half" data-phase="4">Release</button>
    <!-- <button data-phase="6">Reset Phase</button> -->
    <br />
    <br />
    <br />
    <em>ee106a final project -- nandita, william, brent, and josh</em>
</main>

</body>
</html>
