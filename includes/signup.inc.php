<?php
if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInput($name, $email,$uid,$pwd,$pwdRepeat) !==false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($uid) !==false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !==false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($pwd,$pwdRepeat) !==false){
        header("location: ../signup.php?error=passwordmismatch");
        exit();
    }
    if (uidExists($conn,$uid,$email) !==false){
        header("location: ../signup.php?error=uidtaken");
        exit();
    }
        createUser($conn,$name, $email,$uid,$pwd);
}
else{
    header("location: ../signup.php");
    exit();

}