<?php

class Auth extends CI_Controller
{

  function Login()
  {
  	$assets = array('css' => 'login', 'js' => 'login');

    $this->load->view( 'common/head', $assets );

    $this->load->view( 'auth/login' );

    $this->load->view( 'common/footer', $assets );
  }

}