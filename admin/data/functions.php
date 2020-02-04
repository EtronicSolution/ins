<?php
include_once '../../conn.php';

function getUserDetails($username, $conn)
{

    $sql = "SELECT * FROM members where m_id='" . $username . "'";

    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);
    return $res;

}

function getUserDetailsbySession($username, $conn)
{
    $sql = "SELECT a.a_name, t.at_name, DATE_FORMAT(a.a_register_date, '%M %Y') as register_date FROM administrators a, admin_types t WHERE a.a_type = t.at_id AND a.a_username='" . $username . "'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);

    return $res;
}

function getOrderDetails($user_id, $conn)
{
    $sql = "SELECT * FROM orders WHERE user_id='" . $user_id . "'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);

    return $res;
}

function getUseridbyUsername($username, $conn)
{

    $sql = "SELECT user_id FROM user WHERE user_name='" . $username . "'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);

    return $res['user_id'];
}


function getUsernamebyUserid($userid, $conn)
{

    $sql = "SELECT a_username FROM administrators WHERE a_id='" . $userid . "'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($result);

    return $res['a_username'];
}

function getMemberUsernamebyUserid($userid, $conn)
{

    if ($userid > 0)
    {
        $sql = "SELECT m_username FROM members WHERE m_id='" . $userid . "'";
        $result = mysqli_query($conn, $sql);
        $res = mysqli_fetch_assoc($result);

        return $res['m_username'];
    }
    else
    {
        return "noresult";
    }
}




function getmemberbyAgent($conn, $m_id)
{

    $sqlmaster = "SELECT m_reseller_by FROM members WHERE m_id = '" . $m_id . "'";
    $resultmaster = mysqli_query($conn, $sqlmaster);
    $rowmaster = mysqli_fetch_assoc($resultmaster);

    return $rowmaster['m_reseller_by'];
}

