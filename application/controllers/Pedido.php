<?php

class Pedido extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    //Carga de la base de datos
    $this->load->model('Order');
  }

  function AllPedidos( )
  {
    $html = '<table id="pedidos" class="table table-bordered display nowrap" cellspacing="0" width="100%">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Num.</th>';
    $html .= '<th>Status</th>';
    $html .= '<th>Fecha - Hora</th>';
    $html .= '<th>#</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    foreach ( $this->Order->Orders( ) as $pedido )
    {
      $html .= '<tr>';
      $html .= '<td>'. $pedido->idpedido .'</td>';
      $html .= '<td>';
      switch ( $pedido->status )
      {
        case 'pendiente':
          $html .= '<span class="badge badge-danger">Pendiente</span>';
          break;
        case 'proceso':
          $html .= '<span class="badge badge-info">Realizando</span>';
          break;
        case 'listo':
          $html .= '<span class="badge badge-dark">Hecho</span>';
          break;
        case 'recogido':
          $html .= '<span class="badge badge-success">Recogido</span>';
          break;
      }
      $html .= '</td>';
      $html .= '<td>'. $pedido->created_at .'</td>';
      $html .= '<td>';
      $html .= '<button type="button" class="btn btn-success btn-sm" onClick="setInfo( '. $pedido->idpedido .' )">';
      $html .= 'Detalles';
      $html .= '</button>';
      $html .= '</td>';
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

  function GetPedidoDetails( )
  {
    $post = $this->input->post( );

    $data = $this->Order->OrderDetails( $post[ 'idPedido' ] );

    $servidor = array(
      'status' => 200,
      'data' => $data,
    );

    echo json_encode( $servidor );
  }

  function doPedido( )
  {
    $post = $this->input->post( );

    $response = $this->Order->setDoing( $post[ 'pedido' ] );

    if ($response)
    {
      $servidor = array(
        'status' => 200,
        'msg' => 'Status actualizado',
      );

      echo json_encode( $servidor );
    }
    else
    {
      $servidor = array(
        'status' => 400,
        'msg' => 'Error al actualizar el pedido',
      );

      echo json_encode( $servidor );
    }
  }

  function pedidoHecho( )
  {
    $post = $this->input->post( );

    $response = $this->Order->setDo( $post[ 'pedido' ] );

    if ($response)
    {
      $servidor = array(
        'status' => 200,
        'msg' => 'Status actualizado',
      );

      echo json_encode( $servidor );
    }
    else
    {
      $servidor = array(
        'status' => 400,
        'msg' => 'Error al actualizar el pedido',
      );

      echo json_encode( $servidor );
    }
  }

}
