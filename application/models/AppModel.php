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

  function GetCarrito( $data = null )
  {
    if ( $data != null )
    {
      $productos = [ ];

      foreach ( $data as $producto )
      {
        $this->db->where( 'idplatillo', $producto );
        $product = $this->db->get( 'platillos' )->result( )[ 0 ];

        array_push( $productos, $product );
      }

      return $productos;
    }
    return null;
  }

  function NewPedido( $data = null, $total = null )
  {
    if ( $data != null || $total != null  )
    {
      //creamos el pedido
      try
      {
        $pedido =
        [
          'matricula_usuario' => $this->session->userdata( 'matricula' ),
          'total' => $total,
          'status' => 'pendiente',
        ];

        $idPedido = $this->db->insert( 'pedido', $pedido );

        //guardamos los productos del pedido
        foreach ( $data as $producto )
        {
          $pedidoDetail =
          [
            'idpedido' => $idPedido,
            'idplatillo' => $producto[ 'id' ],
            'cantidad' => $producto[ 'cantidad' ],
          ];

          $this->db->insert( 'pedido_detalles', $pedidoDetail );
        }

        return $idPedido;
      }
      catch (\Exception $e)
      {
        return null;
      }
    }
    return null;
  }

}
