
function activeItem( activar )
{
  //removemos la clase de todos los elementos
  $( '#home' ).removeClass( 'active' );
  $( '#nuevo_pedido' ).removeClass( 'active' );
  $( '#historico' ).removeClass( 'active' );
  $( '#notify' ).removeClass( 'active' );

  //la agregamos al elemento
  $( activar ).addClass( 'active' );
}

$(document).ready(function( )
{
  //URL del servidor
  let url = $('#url').val( );

  //Vista actual
  let actualView = '.start';

  //funciones para la navegación de la barra
  $( '#home' ).click( event =>
  {
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
        case '.avisos':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.start';
      $( actualView ).removeClass( 'd-none' );
    }

  });

  $( '#nuevo_pedido' ).click( event =>
  {
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
        case '.avisos':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.menu';
      $( actualView ).removeClass( 'd-none' );
    }

  });

  $( '#historico' ).click( event =>
  {
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
        case '.avisos':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.historial';
      $( actualView ).removeClass( 'd-none' );
    }

  });

  $( '#notify' ).click( event =>
  {
    //activamos el color
    activeItem( '#notify' );

    //cambiamos la vista
    if ( actualView != '.avisos' )
    {
      switch ( actualView )
      {
        case '.start':
          $( actualView ).addClass( 'd-none' );
          break;
        case '.menu':
          $( actualView ).addClass( 'd-none' );
          break;
        case '.historico':
          $( actualView ).addClass( 'd-none' );
          break;
      }

      actualView = '.avisos';
      $( actualView ).removeClass( 'd-none' );
    }

  });

});
