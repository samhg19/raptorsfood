'use strict'

var table = null;
var url = $('#url').val( );

function getPedidosCurrent( )
{
  //Aqui contactamos con el servidor
  $.ajax({
    url: url + 'pedidos/getCurrent',
    type: 'GET',
    dataType: 'json',
  })
  .done( response =>
  {
    if ( response.status != 200 )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No se pudo obtener los pedidos del sistema',
      });
    }
    else if ( response.status == 200 )
    {
      $( '#table-pedidos' ).html( response.data );
      setTable( );
    }
  });
}

function getPedidosAll( )
{
  //Aqui contactamos con el servidor
  $.ajax({
    url: url + 'pedidos/getAll',
    type: 'GET',
    dataType: 'json',
  })
  .done( response =>
  {
    if ( response.status != 200 )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No se pudo obtener los pedidos del sistema',
      });
    }
    else if ( response.status == 200 )
    {
      $( '#table-pedidos' ).html( response.data );
      setTable( );
    }
  });
}

function setTable( )
{
  if ( table != null )
    table.destroy();

  table = $( '#pedidos' ).DataTable(
  {
    responsive: true,
    language:
    {
        url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
    },
    info: false,
    ordering: true,
  });
}

$(document).ready(() =>
{

  setTable( );

});
