<?php

namespace App\Modules\View;

class Registration
{
  public function render()
  {

    echo '
<h1>registrate</h1>

<form method="post">

<label>login</label><input type="text" name="login"/><br>
<label>password</label><input type="password" name="password"/><br>
<label>name</label><input type="text" name="name"/><br>
<input type="submit" name="submit">
</form>
';

  }
}
