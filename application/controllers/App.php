<?php

class App extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    //Carga de la base de datos
    $this->load->model('AppModel');

    //generar QR
    $this->load->library('QR');
  }

  //Acceso al sistema para alumnos
  function Index( )
  {
    //no queremos chismosos
    if ( $this->session->userdata( 'isLogin' ) )
    {
      $head = array( 'css' => 'start', 'title' => 'Raptor\'s Food' );
      $this->load->view( 'app/common/head', $head );

      $this->load->view( 'app/common/navbar' );

      $sidebar = array( 'name' => $this->session->userdata( 'nombre' ), );
      $this->load->view( 'app/common/sidebar', $sidebar );

      //vistas que forman la app
      //inicio
      $this->load->view( 'app/sections/start' );

      //pedidos
      $pedidos = array( 'categorias' => $this->AppModel->Categories( ) );

      $this->load->view( 'app/sections/pedido', $pedidos );

      //historial
      $this->load->view( 'app/sections/history' );

      $footer = array( 'js' => 'start' );
      $this->load->view( 'app/common/footer', $footer );
    }
    else
      header( 'Location: ' . base_url( '/login' ) );
  }

  function MisPedidosActuales( )
  {
    $html = '<ul class="list-group list-group-flush">';
    if ( count( $this->AppModel->MisPedidos( ) ) > 0 )
    {
      foreach ( $this->AppModel->MisPedidos( ) as $pedido )
      {
        if ( $pedido->status != 'recogido' )
        {
          $html .= '<li class="list-group-item">';
          $html .= '<div class="row">';
          $html .= '<div class="col-6">Pedido <b>#';
          $html .= $pedido->idpedido;
          $html .= '</b></div>';
          $html .= '<div class="col-3">';
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
          }
          $html .= '</div>';
          $html .= '<div class="col-2 col-md-2 col-sm-2"></div>';
          $html .= '<div class="col-1 col-md-1 col-sm-1">';
          $html .= '</div>';
          $html .= '</div>';
          $html .= '</li>';
        }
        else
        {
          $html .= '<li class="list-group-item">';
          $html .= '<div class="row">';
          $html .= '<div class="col-lg-12 col-md-12 col-sm-12">';
          $html .= '<div class="text-center">';
          $html .= '<span>Sin pedidos</span>';
          $html .= '</div>';
          $html .= '</div>';
          $html .= '</div>';
          $html .= '</li>';
        }
      }
    }
    else
    {
      $html .= '<li class="list-group-item">';
      $html .= '<div class="row">';
      $html .= '<div class="col-lg-12 col-md-12 col-sm-12">';
      $html .= '<div class="text-center">';
      $html .= '<span>Sin pedidos</span>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</li>';
    }
    $html .= '</ul>';

    $servidor = array(
      'status' => 200,
      'data' => $html,
    );

    echo json_encode( $servidor );
  }

  function MisPedidos( )
  {
    $html = '';
    if ( count( $this->AppModel->MisPedidos( ) ) > 0 )
    {
      foreach ( $this->AppModel->MisPedidos( ) as $pedido )
      {
        $html .= '<div class="card text-center">';
        $html .= '<div class="card-header bg-light">';
        $html .= '<div class="row">';
        $html .= '<div class="col-4">Pedido <b>#';
        $html .= $pedido->idpedido;
        $html .= '</b></div>';
        $html .= '<div class="col-4">';
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
            $html .= '<span class="badge badge-success">Recolectado</span>';
            break;
        }
        $html .= '</div>';
        $html .= '<div class="col-4">';
        $html .= '<button type="button" class="btn btn-success btn-block btn-sm" onClick="viewDetails( '. $pedido->idpedido .' )">';
        $html .= 'Detalles';
        $html .= '</button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
      }
    }
    else
    {
      $html .= '<div class="card text-center">';
      $html .= '<div class="card-header bg-light">';
      $html .= '<div class="row">';
      $html .= '<div class="col-lg-12 col-md-12 col-sm-12">';
      $html .= '<div class="text-center">';
      $html .= '<span>Sin pedidos</span>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
    }

    $servidor = array(
      'status' => 200,
      'data' => $html,
    );

    echo json_encode( $servidor );
  }

  function DetallesPedido( )
  {
    $post = $this->input->post();

    $data = $this->AppModel->OrderDetails( $post[ 'idPedido' ] );

    $servidor = array(
      'status' => 200,
      'data' => $data,
    );

    echo json_encode( $servidor );
  }

  function ProductsPerCategory( )
  {
    $post = $this->input->post();

    //enviamos los datos al modelo, para que haga el registro en la bd
    $productos = $this->AppModel->ProductsPerCategory( $post[ 'categoria' ] );

    $html = '<ul class="list-group list-group-flush">';
    if ( count( $productos ) > 0 )
    {
      foreach ( $productos as $producto )
      {
        $html .= '<li class="list-group-item">';
        $html .= '<div class="row">';
        $html .= '<div class="col-6">';
        $html .= '<span>' . $producto->nombre . '</span>';
        $html .= '</div>';
        $html .= '<div class="col-2">';
        $html .= '$' .$producto->precio . ' c/u';
        $html .= '</div>';
        $html .= '<div class="col-1"></div>';
        $html .= '<div class="col-2">';
        $html .= '<button type="button" onclick="saveid( '.$producto->idplatillo.', '. $producto->precio .' )" class="btn btn-success btn-sm">';
        $html .= 'Comprar';
        $html .= '</button>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</li>';
      }
    }
    else
    {
      $html .= '<li class="list-group-item">';
      $html .= '<div class="row">';
      $html .= '<div class="col-lg-12 col-md-12 col-sm-12">';
      $html .= '<div class="text-center">';
      $html .= '<span>Sin productos</span>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</div>';
      $html .= '</li>';
    }
    $html .= '</ul>';


    $servidor =
    [
      'status' => 200,
      'data' => $html,
    ];

    echo json_encode( $servidor );
  }

  function GetAllCarrito( )
  {
    $post = $this->input->post();

    $products = $this->AppModel->GetCarrito( $post[ 'data' ] );

    $servidor =
    [
      'status' => 200,
      'data' => $products,
    ];

    echo json_encode( $servidor );

  }

  function GenerarPedido( )
  {
    $post = $this->input->post();

    $pedido = $this->AppModel->NewPedido( $post[ 'data' ], $post[ 'total' ] );

    if ( $pedido != null )
    {
      //logica para generar QR
      //ubicacion - local
      $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'] . '/raptorsfood/resources/images/pedidos/';
      //ubicacion -servidor
      //$SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'] . '/resources/images/pedidos/';

      $qr_name = 'qrPedido_' . $pedido . '.png';
      $place = $SERVERFILEPATH . $qr_name;

      QRcode::png( 'Prueba', $place );

      $servidor =
      [
        'status' => 200,
        'qr' => base_url( ) .'resources/images/pedidos/' . $qr_name,
        'id' => $pedido,
      ];

      echo json_encode( $servidor );
    }
    else
    {
      $servidor =
      [
        'status' => 400,
        'msg' => 'Error al generar el pedido',
      ];

      echo json_encode( $servidor );
    }

  }

}
