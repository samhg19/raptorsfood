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
      $assets = array( 'css' => 'start', 'js' => 'start' );

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $this->load->view( 'admin/common/scanQR' );

      $sidebar =
      [
        'name' => $this->session->userdata( 'nombre' ),
        'dashboard' => true,
        'menu' => false,
        'pedidos' => false,
        'mensajes' => false,
        'usuarios' => false,
      ];
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/start' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

  function Menu( )
  {
    //no queremos chismosos ni alumnos chismosos
    if ( $this->session->userdata( 'isLogin' ) && $this->session->userdata( 'isAdmin' ) == 1 )
    {
      $assets = array( 'css' => 'pedidos', 'js' => 'pedidos' );

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $sidebar =
      [
        'name' => $this->session->userdata( 'nombre' ),
        'dashboard' => false,
        'menu' => true,
        'pedidos' => false,
        'mensajes' => false,
        'usuarios' => false,
      ];
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/menu' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

  function Pedidos( )
  {
    //no queremos chismosos ni alumnos chismosos
    if ( $this->session->userdata( 'isLogin' ) && $this->session->userdata( 'isAdmin' ) == 1 )
    {
      $assets = array( 'css' => 'pedidos', 'js' => 'pedidos' );

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $sidebar =
      [
        'name' => $this->session->userdata( 'nombre' ),
        'dashboard' => false,
        'menu' => false,
        'pedidos' => true,
        'mensajes' => false,
        'usuarios' => false,
      ];
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/pedidos' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

  function Mensajes($value='')
  {
    //no queremos chismosos ni alumnos chismosos
    if ( $this->session->userdata( 'isLogin' ) && $this->session->userdata( 'isAdmin' ) == 1 )
    {
      $assets = array( 'css' => 'pedidos', 'js' => 'pedidos' );

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $sidebar =
      [
        'name' => $this->session->userdata( 'nombre' ),
        'dashboard' => false,
        'menu' => false,
        'pedidos' => false,
        'mensajes' => true,
        'usuarios' => false,
      ];
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/mensajes' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

  function Usuarios( )
  {
    //no queremos chismosos ni alumnos chismosos
    if ( $this->session->userdata( 'isLogin' ) && $this->session->userdata( 'isAdmin' ) == 1 )
    {
      $assets = array( 'css' => 'usuario', 'js' => 'usuario' );

      $this->load->view( 'admin/common/head', $assets );

      $this->load->view( 'admin/common/navbar' );

      $sidebar =
      [
        'name' => $this->session->userdata( 'nombre' ),
        'dashboard' => false,
        'menu' => false,
        'pedidos' => false,
        'mensajes' => false,
        'usuarios' => true,
      ];
      $this->load->view( 'admin/common/sidebar', $sidebar );

      //contenido de la vista
      $this->load->view( 'admin/sections/usuarios' );

      $this->load->view( 'admin/common/footer', $assets );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }
}
