<?php
header('Content-Type: application/json');

if (isset($_GET['uid'])) {
    $uid = $_GET['uid'];
    $url = "https://mohamedbougrina.free.nf/index.php?uid=" . urlencode($uid);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "FreeFire-Client/1.0");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $response = curl_exec($ch);

    if(curl_errno($ch)) {
        echo json_encode(["error" => curl_error($ch)]);
    } else {
        echo $response;
    }

    curl_close($ch);
} else {
    echo json_encode(["error" => "No UID provided"]);
}
?>
