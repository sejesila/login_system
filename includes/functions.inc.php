<?php

use JetBrains\PhpStorm\NoReturn;

function emptyInput($name,$email,$uid,$pwd,$pwdRepeat){

    $result;
    if (empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidUid($uid)
{
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$uid)){
    $result = true;
} else{
    $result = false;
}
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function passwordMatch($pwd, $pwdRepeat)
{
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $uid, $email)
{

    $sql = "SELECT  * FROM users  WHERE uid=? OR email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

#[NoReturn] function createUser($conn,$name, $email,$uid,$pwd)
{

    $sql = "INSERT into users (name,email,uid,pwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPassword = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name, $email,$uid,$hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=noerror");
    exit();
}
//login functions

function emptyLogin($uid,$pwd){
    $result;
    if (empty($uid) ||empty($pwd)){
        $result = true;
    }else {
        $result =false;
    }
    return $result;

}
function loginUser($conn,$uid,$pwd){
    $uidExists = uidExists($conn, $uid, $uid);
    if ($uidExists === false){
        header("location: ../login.php?error=loginerror");
        exit();
    }
    $passwordHashed = $uidExists['pwd'];
    $verifyPassword = password_verify($pwd,$passwordHashed);
    if ($verifyPassword ===false){
        header("location: ../login.php?error=incorrectpassword");
        exit();
    }
    elseif ($verifyPassword === true){
        session_start();
        $_SESSION['userid']  = $uidExists['id'];
        $_SESSION['useruid']  = $uidExists['uid'];


        header('location: ../index.php');
        exit();
    }
}
