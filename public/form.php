<?php
?>
<form method='post' enctype='multipart/form-data'>
    <label for='file'>File</label>
    <input name="file" id="file" type='file'/><br>
    <label for='login'>Login</label>
    <input name="login" id="login" value="<?= $_POST['login'] ?>"/><br>
    <label for="password">Password</label>
    <input name="password" type="password" id="password"/><br>
    <input type="submit"/>
</form>
<?php