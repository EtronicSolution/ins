<?php

include_once 'functions.php';

if (isset($_GET['type'])) {
	$m_type = $_GET['type'];
} else {
	$m_type = '';
}

if (isset($_GET['p_id'])) {
	$p_id = $_GET['p_id'];
} else {
	$p_id = '';
}

if ($p_id != '') {
	$sql = "select * from policy where p_id='" .$p_id . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
}

