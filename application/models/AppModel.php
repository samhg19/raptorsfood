<?php

class AppModel extends CI_Model
{

  function Categories( )
  {
    return $this->db->get( 'categoria' )->result( );
  }

}
