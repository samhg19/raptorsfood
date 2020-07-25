<?php

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  //Acceso al sistema para gente de la cafeteria
  function Index( )
  {
    //no queremos chismosos ni alumnos chismosos
    if ( $this->session->userdata( 'isLogin' ) && $this->session->userdata( 'isAdmin' ) == 1 )
    {
      $assets = array( 'css' => 'login', 'js' => 'login' );

      $this->load->view( 'common/head', $assets );

      $this->load->view( 'back/start' );

      $this->load->view( 'common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }
}
