
<span>24.12.2020</span></br>
_______________________________________________________________________</br></br>
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
?>
</br><span>18.01.2021</span></br>
_______________________________________________________________________</br></br>
<?php
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
        redirect('/login');
    }
    else {
        include ('./forms/registration.php');
    }
};
?>
<span>20.01.2021</span></br>
_______________________________________________________________________</br></br>
<?php
interface HasEngine {
    public function getEngine();
}
abstract class Auto implements HasEngine {
    public $engine;
    public $body;
    public $wheels;
    private $vinNumber = 2;
    protected $color;
    const LEFT_WHEEL = 1;
    public function engine(){
        echo('auto engine');
    }
    public function getEngine(){
        echo $this->$engine; 
    }
}

class Truck extends Auto { 
    public $loadCapacity;
    public function engine(){
        echo parent::engine()." Truck</br>";
        
    }
}

class Passenger extends Auto {
    function __construct(){
        print "create Passenger</br>";
    }
    public $type;
    public function setColor($color){
        $this->$color=$color;
            }
    public function getColor(){
        return $this->$color;
    }

}

$passenger = new Passenger;
$truck = new Truck;
$truck -> engine();
$truck -> $engine = 25;
$truck -> getEngine();
$passenger -> setColor('red');
echo Auto::LEFT_WHEEL;

function pitStop(Auto $auto){
    echo('PIT STOP </br>');
    print_r($auto);
}

pitStop($truck)
?>

