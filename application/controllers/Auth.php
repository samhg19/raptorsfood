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
    $assets = array( 'css' => 'login', 'js' => 'login' );

    $this->load->view( 'common/head', $assets );

    $this->load->view( 'auth/login' );

    $this->load->view( 'common/footer', $assets );
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
        $url = base_url( 'Inicio' );
      else
        $url = base_url( 'App' );

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
    $usuario = array( 'matricula' => 'A0353', 'nombre' => 'Samantha Hernández', 'email' => 'samantha@gmail.com',
                      'password' => '12345678', 'carrera' => 'TIC\'s' );

    //enviamos los datos al modelo, para que haga el registro en la bd
    $registro = $this->User->Register( $usuario );

    //si el registro es exitoso
    if ( $registro )
    {
      echo "Registro exitoso";
    }
    else
    {
      echo "Error";
    }
  }

}
