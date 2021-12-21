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

    file_put_contents('app/test_file.txt', 'content');
};
?>

