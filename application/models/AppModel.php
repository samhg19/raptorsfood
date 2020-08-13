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

  function OrderDetails( $id = null )
  {
    if( $id != null )
    {
      //buscamos la información del pedido
      $this->db->where( 'idpedido', $id );
      $pedido = $this->db->get( 'pedido' )->result( )[ 0 ];

      //agregamos los productos
      $this->db->where( 'idpedido', $id );
      $pedidoProductos = $this->db->get( 'pedido_detalles' )->result( );

      $productos = [ ];

      foreach ( $pedidoProductos as $product )
      {
        $this->db->where( 'idplatillo', $product->idplatillo );
        array_push( $productos, $this->db->get( 'platillos' )->result( )[ 0 ] );
      }

      //creamos un array para enviar toda la informacion
      $data =
      [
        'order' => $pedido,
        'orderDetails' => $pedidoProductos,
        'products' => $productos
      ];

      return $data;
    }
    return null;
  }

}
