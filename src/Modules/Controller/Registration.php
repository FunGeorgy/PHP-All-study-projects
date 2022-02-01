<?php

namespace App\Modules\Controller;

use App\Modules\View\Registration as RegistrationView;
use App\DTO\User;
use App\Modules\System\Post;
use App\Database\DB;

class Registration extends BaseController
{
  private $view;

  public function __construct()
  {
    $this->view = new RegistrationView();
  }

  public function getPage()
  {
    $post = new Post();
    if($post->isFormSended()) {
      $this->fixData($post);
    } else {
      $this->view->render();
    }
  }

  private function fixData(Post $post){
    $user = new User();

    $user->setName($post-> getValue('name'));
    $user->setLogin($post-> getValue('login'));
    $user->setPassword($post-> getValue('password'));

    print_r($user);

    $db = new DB();
    $db->saveUser($user);
  }
}
