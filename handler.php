<?php

$valid = true;
$valid &= ($_SERVER['REQUEST_METHOD'] === 'POST');
$valid &= isset($_POST['phase']);

if ($valid) {
    $phase = (int) $_POST['phase'];
    // This is objectively bad practice
    file_put_contents('phase', $phase);

    $data = array();
    $data['new_phase'] = $phase;
    header('Content-Type: application/json');
    echo json_encode($data);

} else {
    header('HTTP/1.0 403 Forbidden');
}

?>
