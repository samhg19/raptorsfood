<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    //Carga de la base de datos
    $this->load->model('User');
  }

  function Login( )
  {
    //verificamos que exista una sesion
    if ( $this->session->userdata( 'isLogin' ) )
    {
      switch ( $this->session->userdata( 'isAdmin' ) )
      {
        case 0:
          //es un vat@ cualquiera
          header( 'Location: ' . base_url( '/app' ) );
          break;
        case 1:
          //es de la cafeteria
          header( 'Location: ' . base_url( '/inicio' ) );
          break;
      }
    }
    else
    {
      //no existe nada
      $assets = array( 'css' => 'login', 'js' => 'login' );

      $this->load->view( 'common/head', $assets );

      $this->load->view( 'auth/login' );

      $this->load->view( 'common/footer', $assets );
    }

  }

  function Access( )
  {
    $post = $this->input->post();

    $response = $this->User->Login( $post['data'] );
    $servidor = null;

    if($response[ 'status' ] == 200)
    {
      //crearemos una session con los datos
      $cookies = array
      (
        'isLogin' => true,
        'matricula' => $response[ 'matricula' ],
        'nombre' => $response[ 'nombre' ],
        'isAdmin' => $response[ 'isAdmin' ],
      );

      //damos de alta las cookies
      $this->session->set_userdata($cookies);

      $url = null;

      //redireccionamos al Dashboard correspondiente
      if ( $response[ 'isAdmin' ] == 0 )
        $url = base_url( 'app' );
      else
        $url = base_url( 'inicio' );

      //respuesta a la vista
      $servidor = array(
        'status' => 200,
        'url' => $url
      );

    }
    else
    {
      $servidor = array(
        'status' => 401,
        'msg' => $response[ 'msg' ],
      );
    }

    echo json_encode( $servidor );
  }

  function Register()
  {
  	$assets = array('css' => 'register', 'js' => 'register');

    $this->load->view( 'common/head', $assets );

    $this->load->view( 'auth/register' );

    $this->load->view( 'common/footer', $assets );
  }

  function NewRegister( )
  {
    $post = $this->input->post()[ 'data' ];

    $usuario =
    [
      'matricula' => $post[ 'matricula' ],
      'nombre' => $post[ 'nombre' ],
      'email' => $post[ 'correo' ],
      'password' => $post[ 'password' ],
      'carrera' => $post[ 'carrera' ]
    ];

    //enviamos los datos al modelo, para que haga el registro en la bd
    $registro = $this->User->Register( $usuario );

    //si el registro es exitoso
    if ( $registro )
    {

      //crearemos una session con los datos
      $cookies = array
      (
        'isLogin' => true,
        'matricula' => $post[ 'matricula' ],
        'nombre' => $post[ 'nombre' ],
        'isAdmin' => 0,
      );

      //damos de alta las cookies
      $this->session->set_userdata($cookies);

      $url = base_url( 'app' );

      //respuesta a la vista
      $servidor = array(
        'status' => 200,
        'url' => $url
      );
    }
    else
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 400,
        'msg' => 'No se pudo registrar en el sistema, intente de nuevo más tarde'
      );
    }

    echo json_encode( $servidor );
  }

  function Logout( )
  {
    //borramos todo
    $this->session->sess_destroy();

    //redireccionamos al login
    header( 'Location: ' . base_url( '/login' ) );
  }

}
