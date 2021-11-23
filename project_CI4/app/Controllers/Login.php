<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
  public function index()
  {
    $data = [];
    helper(['form']);
    if ($this->request->getMethod() == 'post') {
      // validation
      $rules = [
        'email' => 'required|min_length[6]|max_length[50]|valid_email',
        'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
      ];
      $errors = [
        'password' => [
          'validateUser' => 'Email dan Password tidak Cocok'
        ]
      ];
      if (!$this->validate($rules, $errors)) {
        $data['validation'] = $this->validator;
      } else {
        $model = new UserModel();

        $user = $model->where('email', $this->request->getVar('email'))
          ->first();

        $this->setUserSession($user);
        return redirect()->to('/home');
      }
    }
    return view('page/login', $data);
  }
  private function setUserSession($user)
  {
    $data = [
      'email' => $user['email'],
      'isLoggedIn' => true,
    ];
    session()->set($data);
    return true;
  }
  public function register()
  {
    $data = [];
    helper(['form']);
    if ($this->request->getMethod() == 'post') {
      // validation
      $rules = [
        'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[8]|max_length[255]',
        'password_confirm' => 'matches[password]',
      ];
      if (!$this->validate($rules)) {
        $data['validation'] = $this->validator;
      } else {
        $model = new UserModel();

        $newData = [
          'email' => $this->request->getVar('email'),
          'password' => $this->request->getVar('password'),
        ];
        $model->ignore(true)->insert($newData);
        $session = session();
        $session->setFlashdata('success', 'Successful Registration');
        return redirect()->to('/');
      }
    }
    return view('page/register', $data);
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/');
  }
}
