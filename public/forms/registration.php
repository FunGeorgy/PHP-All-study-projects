<form method='post' enctype='multipart/form-data'>
    <label for='login'>Login</label>
    <input name="login" id="login" value="<?= $_POST['login'] ?>"/><br>
    <label for="password">Password</label>
    <input name="password" type="password" id="password"/><br>
    <label for="name">Name</label>
    <input name="name" type="name" id="name"/><br>
    <input type="submit" name="submit"/>
</form>