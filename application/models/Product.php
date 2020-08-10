<?php

class Product extends CI_Model
{

  function GetProductos( )
  {
    $this->db->select( 'idplatillo, nombre, precio, idCategoria, existencia' );
    $usuarios = $this->db->get( 'platillos' );

    return $usuarios->result( );
  }

  function NewProduct( $data = null )
  {
    if ( $data != null )
    {

      //construimos el SQL
      $sql = array(
        'nombre' => $data[ 'nombre' ],
        'descripcion' => $data[ 'descripcion' ],
        'precio' => $data[ 'precio' ],
        'idCategoria' => $data[ 'idCategoria' ],
        'existencia' => 1
      );

      //si se hizo el insert
      if ( $this->db->insert( 'platillos', $sql ) )
        return true;

    }
    return false;
  }

  function UpdateExistencia( $data = null )
  {
    if ( $data != null )
    {

      //construimos el SQL
      $this->db->set( 'existencia', $data[ 'existencia' ] );
      $this->db->where( 'idplatillo', $data[ 'producto' ] );

      //si se hizo el insert
      if ( $this->db->update( 'platillos') )
        return true;

    }
    return false;
  }

}
