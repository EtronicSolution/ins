<?php

include_once '../session.php';

    $sql = "select * from currency ORDER BY cu_id DESC";

$result = mysqli_query($conn, $sql);

