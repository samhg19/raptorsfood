
//variables globales del menú
var actualMenuView = '.menu-start';
var beforeMenuView = '.menu-start';

var url = $( '#url' ).val( );

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

//funciones externas del menu
function setCategorie( id )
{
  beforeMenuView = actualMenuView;
  actualMenuView = '.menu-items';
  $( actualMenuView ).removeClass( 'd-none' );
  $( '.menu-carrito' ).addClass( 'd-none' );
  $( '.menu-start' ).addClass( 'd-none' );

  //llamamos a la base de datos con el id de la categorias
  //esto con el fin de obtener los productos de esa categoria
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

    //cambiamos la vista
    if ( actualView != '.menu-carrito' )
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

  $( '#do-pedido' ).click(function (event)
  {
    event.preventDefault( );

    //realizamos la petición
    $.ajax({
      url: url + 'App/GenerarPedido',
      type: 'POST',
      dataType: 'json',
      data: { pedido: 1, }
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

        actualMenuView = '.menu-pedido';
        beforeMenuView = '.menu-start';

        $( actualMenuView ).removeClass( 'd-none' );
        $( '.menu-carrito' ).addClass( 'd-none' );
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
