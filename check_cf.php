<?php 
    require_once 'dbconfig.php';
    if (!isset($_GET["q"])) {
        echo "Non dovresti essere qui";
        exit;
    }
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $cf = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT * FROM utente
                WHERE cf = '$cf'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>