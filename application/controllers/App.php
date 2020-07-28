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
      $head = array( 'css' => 'start', 'title' => 'Raptor\'s Food' );
      $this->load->view( 'app/common/head', $head );

      $this->load->view( 'app/common/navbar' );

      $sidebar = array( 'name' => $this->session->userdata( 'nombre' ), );
      $this->load->view( 'app/common/sidebar', $sidebar );

      //vistas que forman la app
      //inicio
      $this->load->view( 'app/sections/start' );

      //pedidos
      $this->load->view( 'app/sections/pedido' );

      //historial
      $this->load->view( 'app/sections/history' );

      //notificaciones
      $this->load->view( 'app/sections/avisos' );

      $footer = array( 'js' => 'start' );
      $this->load->view( 'app/common/footer', $footer );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

}
