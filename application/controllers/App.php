<?php

class App extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  //Acceso al sistema para alumnos
  function Index( )
  {
    //no queremos chismosos
    if ( $this->session->userdata( 'isLogin' ) )
    {
      $assets = array( 'css' => 'login', 'js' => 'login' );

      $this->load->view( 'app/common/head', $assets );

      $this->load->view( 'app/sections/start' );

      $this->load->view( 'app/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

}
