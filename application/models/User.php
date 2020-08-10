<?php

class User extends CI_Model
{

  function Login( $data = null )
  {
    if ( $data != null )
    {
      $this->db->where( 'matricula', $data[ 'matricula' ] );
      $busqueda = $this->db->get( 'usuario' );

      if ( $busqueda->num_rows() > 0 )
      {

        $fila = $busqueda->result()[0];

        if ( password_verify( $data[ 'password' ], $fila->password ) )
        {
          $reponse = array
          (
            'status' => 200,
            'matricula' => $fila->matricula,
            'nombre' => $fila->nombre,
            'isAdmin' => $fila->isAdmin,
          );

          return $reponse;
        }
        else
        {
          $reponse = array( 'status' => 402,
                            'msg' => 'La contraseña no coincide' );
          return $reponse;
        }
      }
      else
      {
        $reponse = array( 'status' => 402, 'msg' => 'matricula no existe' );
        return $reponse;
      }
    }
    return null;
  }

  function Register( $data = null )
  {
    if ( $data != null )
    {

      //construimos el SQL
      $sql = array(
        'matricula' => $data[ 'matricula' ],
        'nombre' => $data[ 'nombre' ],
        'email' => $data[ 'email' ],
        'password' => password_hash( $data['password'], PASSWORD_DEFAULT ),
        'carrera' => $data[ 'carrera' ]
      );

      //si se hizo el insert
      if ( $this->db->insert( 'usuario', $sql ) )
        return true;

    }
    return false;
  }

  function GetAdmins( )
  {
    $this->db->where( 'isAdmin', 1 );
    $this->db->select( 'nombre, matricula' );
    $usuarios = $this->db->get( 'usuario' );

    return $usuarios->result( );
  }

  function RegisterAdmin( $data = null )
  {
    if ( $data != null )
    {

      //construimos el SQL
      $sql = array(
        'matricula' => $data[ 'matricula' ],
        'nombre' => $data[ 'nombre' ],
        'email' => $data[ 'email' ],
        'password' => password_hash( $data['password'], PASSWORD_DEFAULT ),
        'carrera' => 'N/A',
        'isAdmin' => 1
      );

      //si se hizo el insert
      if ( $this->db->insert( 'usuario', $sql ) )
        return true;

    }
    return false;
  }

}
