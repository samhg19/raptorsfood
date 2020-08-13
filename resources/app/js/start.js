
//variables globales del menú
var actualMenuView = '.menu-start';
var beforeMenuView = '.menu-start';

var url = $( '#url' ).val( );

var contadorCarrito = 0;
var productosCarrito = [ ];
var productosCarritoCosto = [ ];
var totalCarrito = 0;

function activeItem( activar )
{
  //removemos la clase de todos los elementos
  $( '#home' ).removeClass( 'active' );
  $( '#nuevo_pedido' ).removeClass( 'active' );
  $( '#historico' ).removeClass( 'active' );

  //la agregamos al elemento
  $( activar ).addClass( 'active' );
}

//funciones externas del inicio
function currentPedidos( )
{
  $.ajax({
    url: url + 'app/start/pedidos',
    type: 'GET',
    dataType: 'json',
  })
  .done( response =>
  {
    $( '#start-current-pedidos' ).html( response.data );
  });
}

function historial( )
{
  $.ajax({
    url: url + 'app/historial',
    type: 'GET',
    dataType: 'json',
  })
  .done( response =>
  {
    $( '#history-pedidos' ).html( response.data );
  });
}

//funciones externas del menu
function setCategory( id )
{
  beforeMenuView = actualMenuView;
  actualMenuView = '.menu-items';

  switch ( id )
  {
    case 1:
      $( '#pedido-categoria' ).html( 'Bebidas' );
      break;
    case 2:
      $( '#pedido-categoria' ).html( 'Comida' );
      break;
    case 3:
      $( '#pedido-categoria' ).html( 'Dulces' );
      break;
    case 4:
      $( '#pedido-categoria' ).html( 'Frituas' );
      break;
  }

  $.ajax({
    url: url + 'app/productos',
    type: 'POST',
    dataType: 'json',
    data: { categoria: id },
  })
  .done( response =>
  {
    $( '#pedido-productos' ).html( response.data );

    $( actualMenuView ).removeClass( 'd-none' );
    $( '.menu-carrito' ).addClass( 'd-none' );
    $( '.menu-start' ).addClass( 'd-none' );
  });

}

function saveid( id, precio )
{
  localStorage.setItem( 'id', id );
  localStorage.setItem( 'precio', precio );

  $('#pedidoModal' ).modal( 'show' );

}

function carrito( )
{
  let ids = [ ];

  $( '#carrito-products-body' ).html( '' );
  totalCarrito = 0;

  productosCarrito.forEach( ( element , i ) =>
  {
    ids.push( element.id );
  });

  $.ajax({
    url: url + 'app/carrito',
    type: 'POST',
    dataType: 'json',
    data: { data: ids, }
  })
  .done( response =>
  {
    if ( response.status == 200 )
    {
      let array = response.data;

      array.forEach( ( item, i ) =>
      {
        let cantidad = productosCarrito[ i ].cantidad;
        let totalProducto = parseInt( item.precio ) * cantidad;
        let plantilla =
        `
          <tr id="table-product-${ item.idplatillo }">
            <td>${ item.nombre }</td>
            <td class="text-center">${ cantidad }</td>
            <td>$${ new Intl.NumberFormat( ).format( totalProducto, { minimumFractionDigits: 2 } ) }</td>
            <td>
              <a href="#" class="text-danger" onClick="deleteFromCarrito( ${ item.idplatillo } )">
                <i class="fas fa-times"></i>
              </a>
            </td>
          </tr>
        `;

        $( '#carrito-products-body' ).append( plantilla );
        totalCarrito += totalProducto;
        productosCarritoCosto.push ( totalProducto );
      });

      $( '#carrito-products-total' ).html( `$${ new Intl.NumberFormat( ).format( totalCarrito, { minimumFractionDigits: 2 } ) }` );
    }
    else
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No se pudo acceder al carrito, intente más tarde',
      });
  });

}

function deleteFromCarrito( id )
{

  let total;

  for ( let i = 0; i < productosCarrito.length; i++ )
  {
    if ( productosCarrito[i].id == id )
    {
      total = productosCarritoCosto[ i ];
      productosCarritoCosto.splice( i, 1 );
      productosCarrito.splice( i, 1 );
    }
  }

  $( `#table-product-${ id }` ).html( '' );

  contadorCarrito--;
  $( '#carrito-count' ).html( contadorCarrito );

  totalCarrito = totalCarrito - total;
  $( '#carrito-products-total' ).html( `$${ new Intl.NumberFormat( ).format( totalCarrito, { minimumFractionDigits: 2 } ) }` );
}

//funciones externas del historico
function viewDetails( id )
{
  $.ajax({
    url: url + 'app/detallesPedido',
    type: 'POST',
    dataType: 'json',
    data: { idPedido: id, }
  })
  .done( response =>
  {
    if ( response.status != 200 )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No se pudo obtener la informacion del pedido',
      });
    }
    else if ( response.status == 200 )
    {
      $( '#modal-productos-pedido' ).html( '' );
      let informacion = response.data;
      let status;

      switch ( informacion.order.status )
      {
        case 'pendiente':
          status = '<span class="badge badge-danger">Pendiente</span>';
          break;
        case 'proceso':
          status = '<span class="badge badge-info">Realizando</span>';
          break;
        case 'listo':
          status = '<span class="badge badge-dark">Hecho</span>';
          break;
        case 'recogido':
          status = '<span class="badge badge-success">Recogido</span>';
          break;
      }

      $( '#modal-codigo-pedido' ).html( informacion.order.idpedido );
      $( '#modal-status-pedido' ).html( status );
      $( '#modal-total-pedido' ).html( informacion.order.total );

      informacion.products.forEach( ( item, i ) =>
      {
        let fila =
        `
          <tr>
            <td>${ item.nombre }</td>
            <td>${ informacion.orderDetails[ i ].cantidad }</td>
          </tr>
        `;

        $( '#modal-productos-pedido' ).append( fila );
      });

      if ( informacion.order.status != 'recogido' )
      {
        $( '#qr-image' ).attr( 'src', url + `resources/images/pedidos/qrPedido_${ informacion.order.idpedido }.png` );

        $( '#qr-image-modal' ).removeClass( 'd-none' );
      }
      else
      {
        $( '#qr-image-modal' ).addClass( 'd-none' );
      }

      $( '#pedidoDetails' ).modal( 'show' );
    }
  });

}

$(document).ready(function( )
{
  //Vista actual
  let actualView = '.start';

  //funciones para la navegación de la barra
  $( '#home' ).click( event =>
  {
    event.preventDefault( );

    //activamos el color
    activeItem( '#home' );

    //cambiamos la vista
    if ( actualView != '.start' )
    {
      switch ( actualView )
      {
        case '.menu':
          $( actualView ).addClass( 'd-none' );
          break;
        case '.historial':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.start';
      $( actualView ).removeClass( 'd-none' );
    }

  });

  $( '#nuevo_pedido' ).click( event =>
  {
    event.preventDefault( );

    //activamos el color
    activeItem( '#nuevo_pedido' );

    //cambiamos la vista
    if ( actualView != '.menu' )
    {
      switch ( actualView )
      {
        case '.start':
          $( actualView ).addClass( 'd-none' );
          break;
        case '.historial':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.menu';
      $( actualView ).removeClass( 'd-none' );
    }

  });

  $( '#historico' ).click( event =>
  {
    event.preventDefault( );

    //activamos el color
    activeItem( '#historico' );

    historial( );

    //cambiamos la vista
    if ( actualView != '.historial' )
    {
      switch ( actualView )
      {
        case '.start':
          $( actualView ).addClass( 'd-none' );
          break;
        case '.menu':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.historial';
      $( actualView ).removeClass( 'd-none' );
    }

  });

  //funciones del inicio
  currentPedidos( );

  //funciones del menú
  $( '#carrito' ).click(function (event)
  {
    event.preventDefault( );

    carrito( );

    //cambiamos la vista
    if ( actualMenuView != '.menu-carrito' )
    {
      beforeMenuView = actualMenuView;
      actualMenuView = '.menu-carrito';
      $( actualMenuView ).removeClass( 'd-none' );
      $( '.menu-items' ).addClass( 'd-none' );
      $( '.menu-start' ).addClass( 'd-none' );
    }
  });

  $( '.menu-back' ).click(function (event)
  {
    event.preventDefault( );

    $( actualMenuView ).addClass( 'd-none' );
    $( beforeMenuView ).removeClass( 'd-none' );

    actualMenuView = beforeMenuView;
    beforeMenuView = '.menu-start';

  });

  $( '#make-Pedido' ).click( event =>
  {
    event.preventDefault( );

    let preview = false;

    let producto = localStorage.getItem( 'id' );
    let precio = localStorage.getItem( 'precio' );
    let cantidad = $( '#countPedido' ).val( );

    //validamos que el producto sea nuevo,
    //en caso contrario lo anexamos a la cuenta anterior
    productosCarrito.forEach( ( item, i ) =>
    {
      if ( item.id == producto )
      {
        preview = true;
        let newCantidad = parseInt( item.cantidad ) + parseInt( cantidad );
        item.cantidad = newCantidad;
      }
    });

    if ( !preview )
    {
      let item =
      {
        id: producto,
        cantidad: cantidad,
      };

      productosCarrito.push( item );

      contadorCarrito++;
      $( '#carrito-count' ).html( contadorCarrito );
    }

    $('#pedidoModal' ).modal( 'hide' );

    Swal.fire(
    {
      icon: 'success',
      text: '¡Producto agregado a tu cesta!',
      customClass:
      {
        confirmButton: 'btn btn-success btn-sm',
        cancelButton: 'btn btn-secondary btn-sm'
      },
      buttonsStyling: false,
      showCancelButton: true,
      cancelButtonText: 'Seguir comprando',
      confirmButtonText: 'Ir al carrito',
      reverseButtons: true,
    }).then((result) =>
    {
      if (result.value)
      {
        carrito( );

        //cambiamos la vista
        if ( actualMenuView != '.menu-carrito' )
        {
          beforeMenuView = actualMenuView;
          actualMenuView = '.menu-carrito';
          $( actualMenuView ).removeClass( 'd-none' );
          $( '.menu-items' ).addClass( 'd-none' );
          $( '.menu-start' ).addClass( 'd-none' );
        }
      }
    });

    $( '#countPedido' ).val( '1' );

  });

  $( '#do-pedido' ).click( event =>
  {
    event.preventDefault( );

    //realizamos la petición
    $.ajax({
      url: url + 'app/newPedido',
      type: 'POST',
      dataType: 'json',
      data: { data: productosCarrito, total: totalCarrito, }
    })
    .done( response =>
    {
      if ( response.status != 200 )
      {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: response.msg,
        });
      }
      else if ( response.status == 200 )
      {

        $( '#qr-pedido-image' ).attr( 'src', response.qr);
        $( '#id-pedido' ).html( response.id );

        actualMenuView = '.menu-pedido';
        beforeMenuView = '.menu-start';

        $( actualMenuView ).removeClass( 'd-none' );
        $( '.menu-carrito' ).addClass( 'd-none' );

        contadorCarrito = 0;
        productosCarrito = [ ];
        productosCarritoCosto = [ ];
        totalCarrito = 0;
      }
    });

  });

  $( '#cerrar-compra' ).click(function (event)
  {
    event.preventDefault( );

    $( actualMenuView ).addClass( 'd-none' );
    $( '.menu-start' ).removeClass( 'd-none' );

    actualMenuView = '.menu-start';
    beforeMenuView = '.menu-start';


  });

});
