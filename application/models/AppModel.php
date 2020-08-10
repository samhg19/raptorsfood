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

}
