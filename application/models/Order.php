<?php

class Order extends CI_Model
{

  function Orders( )
  {
    return $this->db->get( 'pedido' )->result( );
  }

  function OrderById( $id = null )
  {
    if ($id != null)
    {
      $this->db->where( 'idpedido', $id );
      $pedido = $this->db->get( 'pedido' )->result( )[ 0 ];

      //actualizamos el pedido
      $this->db->where( 'idpedido', $id );
      $this->db->set( 'status', 'recogido' );
      $this->db->update( 'pedido' );

      //buscamos al ususario
      $this->db->where( 'matricula', $pedido->matricula_usuario );
      return $this->db->get( 'usuario' )->result( )[ 0 ];
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

      //ubicamos al usuario que realizó el pedido
      $this->db->where( 'matricula', $pedido->matricula_usuario );
      $usuario = $this->db->get( 'usuario' )->result( )[ 0 ];

      //creamos un array para enviar toda la informacion
      $data =
      [
        'order' => $pedido,
        'orderDetails' => $pedidoProductos,
        'products' => $productos,
        'user' => $usuario
      ];

      return $data;
    }
    return null;
  }

  function setDoing( $id = null )
  {
    if( $id != null )
    {
      $this->db->where( 'idpedido', $id );
      $this->db->set( 'status', 'proceso' );

      if ( $this->db->update( 'pedido' ) )
      {
        return true;
      }
    }
    return false;
  }

  function setDo( $id = null )
  {
    if( $id != null )
    {
      $this->db->where( 'idpedido', $id );
      $this->db->set( 'status', 'listo' );

      if ( $this->db->update( 'pedido' ) )
      {
        return true;
      }
    }
    return false;
  }

}
