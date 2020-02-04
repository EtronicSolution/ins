<?php
include_once 'functions.php';

if (isset($_GET['v_ins_id']))
{
    $iv_ins_id = $_GET['v_ins_id'];
}
else
{
    $v_ins_id = '';
}

if ($v_ins_id != '')
{

    $sql = "select * from v_ins where v_ins_id='" . $v_ins_id . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

