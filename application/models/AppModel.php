<?php

class AppModel extends CI_Model
{

  function Categories( )
  {
    return $this->db->get( 'categoria' )->result( );
  }

  function MisPedidos( )
  {
    $this->db->where( 'matricula_usuario', $this->session->userdata( 'matricula' ) );
    return $this->db->get( 'pedido' )->result( );
  }

  function ProductsPerCategory( $data = null )
  {
    if ( $data != null )
    {
      $this->db->where( 'existencia', 1 );
      $this->db->where( 'idCategoria', $data );
      return $this->db->get( 'platillos' )->result( );
    }
    return null;
  }

}
