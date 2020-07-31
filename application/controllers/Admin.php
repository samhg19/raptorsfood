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

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $sidebar = array( 'name' => $this->session->userdata( 'nombre' ), );
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/start' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

  //Acceso al sistema para gente de la cafeteria
  function Pedidos( )
  {
    //no queremos chismosos ni alumnos chismosos
    if ( $this->session->userdata( 'isLogin' ) && $this->session->userdata( 'isAdmin' ) == 1 )
    {
      $assets = array( 'css' => 'login', 'js' => 'login' );

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $sidebar = array( 'name' => $this->session->userdata( 'nombre' ), );
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/pedidos' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }
}
