<?php

class Usuario extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    //Carga de la base de datos
    $this->load->model('User');
  }

  function NewAdmin( )
  {
    $post = $this->input->post()[ 'data' ];

    $usuario =
    [
      'matricula' => $post[ 'matricula' ],
      'nombre' => $post[ 'nombre' ],
      'email' => $post[ 'email' ],
      'password' => $post[ 'password' ],
    ];

    //enviamos los datos al modelo, para que haga el registro en la bd
    $registro = $this->User->RegisterAdmin( $usuario );

    //si el registro es exitoso
    if ( $registro )
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 200,
        'msg' => '¡Usuario creado con exito!'
      );
    }
    else
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 400,
        'msg' => 'No se pudo crear al usuario, intente más tarde'
      );
    }

    echo json_encode( $servidor );
  }

  function GetAdmins( )
  {
    $html = '<table id="users" class="table table-bordered display nowrap" cellspacing="0" width="100%">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Acceso</th>';
    $html .= '<th>Nombre</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    foreach ( $this->User->GetAdmins( ) as $user )
    {
      $html .= '<tr>';
      $html .= '<td>'. $user->matricula .'</td>';
      $html .= '<td>'. $user->nombre .'</td>';
      $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '</table>';

    $servidor = array(
      'status' => 200,
      'data' => $html,
    );

    echo json_encode( $servidor );
  }


}
