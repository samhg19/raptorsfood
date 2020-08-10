<?php

class Producto extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model( 'Product' );
  }

  function GetProductos( )
  {
    $option = '';

    $html = '<table id="productosTable" class="table table-bordered display nowrap" cellspacing="0" width="100%">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Nombre</th>';
    $html .= '<th>Precio</th>';
    $html .= '<th>Categoria</th>';
    $html .= '<th>Existencia</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    foreach ( $this->Product->GetProductos( ) as $product )
    {
      $html .= '<tr>';
      $html .= '<td>'. $product->nombre .'</td>';
      $html .= '<td>'. $product->precio .'</td>';
      switch ( $product->idCategoria )
      {
        case 1:
          $html .= '<td>Bebidas</td>';
          break;
        case 2:
          $html .= '<td>Comida</td>';
          break;
        case 3:
          $html .= '<td>Dulces</td>';
          break;
        case 4:
          $html .= '<td>Frituras</td>';
          break;
      }
      if ( $product->existencia == 1 )
        $html .= '<td><span class="badge badge-success">Si</span></td>';
      else
        $html .= '<td><span class="badge badge-danger">No</span></td>';
      $html .= '</tr>';

      $option .= '<option value="'. $product->idplatillo .'">';
      $option .= $product->nombre;
      $option .= '</option>';
    }
    $html .= '</tbody>';
    $html .= '</table>';

    $servidor = array(
      'status' => 200,
      'data' => [ $html, $option ],
    );

    echo json_encode( $servidor );
  }

  function NewProducto( )
  {
    $post = $this->input->post()[ 'data' ];

    $producto =
    [
      'nombre' => $post[ 'nombre' ],
      'descripcion' => $post[ 'descripcion' ],
      'precio' => $post[ 'precio' ],
      'idCategoria' => $post[ 'categoria' ],
    ];

    //enviamos los datos al modelo, para que haga el registro en la bd
    $registro = $this->Product->NewProduct( $producto );

    //si el registro es exitoso
    if ( $registro )
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 200,
        'msg' => 'Producto creado con exito!'
      );
    }
    else
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 400,
        'msg' => 'No se pudo crear el producto, intente más tarde'
      );
    }

    echo json_encode( $servidor );
  }

  function ChangeStatus( )
  {
    $post = $this->input->post()[ 'data' ];

    $producto =
    [
      'producto' => $post[ 'producto' ],
      'existencia' => $post[ 'existencia' ],
    ];

    //enviamos los datos al modelo, para que haga el registro en la bd
    $registro = $this->Product->UpdateExistencia( $producto );

    //si el registro es exitoso
    if ( $registro )
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 200,
        'msg' => '¡Prodcuto actualizado con exito!'
      );
    }
    else
    {
      //respuesta a la vista
      $servidor = array(
        'status' => 400,
        'msg' => 'No se pudo actualizar el producto, intente más tarde'
      );
    }

    echo json_encode( $servidor );
  }

}
