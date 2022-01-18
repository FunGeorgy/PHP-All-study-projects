<?php
$string = 'Hello World!???!!';
echo $string;

include('form.php');

print_r($_FILES);

if (!empty($_FILES['file'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], '/app/public/images/' . $_FILES['file']['name']);
};

$files = scandir('/app/public/images/');
foreach ($files as $name) {
    if($name === '.' || $name === '..'){
        continue;
    }

    // ?><img src ="/images/<?= $name ?>"/><?php

    // file_put_contents('app/test_file.txt', 'content');
};

// session_start();
// $_SESSION['user_name'] = 'JOHN';
// print_r($_SESSION);
// print_r($_arr);
$fileContent = file('/app/tmp/text.txt');
// print_r($fileContent);

function isLogin(){
    return false;
};

function redirect($url) {
    header ('location' .$url);
    die();
};
function isData(){
    return array_key_exists('submit', $_POST);
};

function addUser(){ 
    $user = [];
    $user['login'] = $_POST['login'];
    $user['password'] = $_POST['password'];
    $user['name'] = $_POST['name'];
    print_r($user);
    insertUser($user);
}

function insertUser(array $user){
    if(! file_exists('../users.csv')) {
        $touch("../users.csv");
    }
    $fileData = (array)file('../users.csv');
    $id = count($fileData);
    $string = implode(" ; ", [
        $id,
        $user['login'],
        $user['password'],
        $user['name'],
        
    ]) . '\n';
    file_put_contents('../users.csv', $string, FILE_APPEND);
}

if (isLogin()) {
    redirect('/');
} else {
    if(isData()){
        addUser();
        redirect('/login')
    }
    else {
        include ('./forms/registration.php');
    }
};
?>

