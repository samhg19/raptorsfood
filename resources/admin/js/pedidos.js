'use strict'

var table = null;
var url = $('#url').val( );

function getPedidos( )
{

  //Aqui contactamos con el servidor
  $.ajax({
    url: url + 'pedidos/getPedidos',
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

function setInfo( id )
{

  $.ajax({
    url: url + 'pedidos/getPedidoDetails',
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
      $( '#buttons-pedido' ).html( '' );
      let informacion = response.data;
      let status;
      let button;
      let setButton = false;

      switch ( informacion.order.status )
      {
        case 'pendiente':
          status = '<span class="badge badge-danger">Pendiente</span>';
          button =
          `
            <button type="button" class="btn btn-success" onClick="doPedido( ${ informacion.order.idpedido } )">
              Realizar
            </button>
          `;
          setButton = true;
          break;
        case 'proceso':
          status = '<span class="badge badge-info">Realizando</span>';
          button =
          `
            <button type="button" class="btn btn-dark" onClick="ready( ${ informacion.order.idpedido } )">
              Hecho
            </button>
          `;
          setButton = true;
          break;
        case 'listo':
          status = '<span class="badge badge-dark">Hecho</span>';
          break;
        case 'recogido':
          status = '<span class="badge badge-success">Recogido</span>';
          break;
      }

      $( '#modal-codigo-pedido' ).html( informacion.order.idpedido );
      $( '#modal-nombre-usuario' ).html( informacion.user.nombre );
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

      //agregamos los botones
      if ( setButton )
      {
        $( '#buttons-pedido' ).append( button );
      }

      $( '#pedido-details' ).modal( 'show' );
    }
  });
}

function doPedido ( id )
{
  $.ajax({
    url: url + 'pedidos/setDoing',
    type: 'POST',
    dataType: 'json',
    data: { pedido: id }
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
      Swal.fire({
        icon: 'success',
        title: '¡Hecho!',
        text: response.msg,
      });

      getPedidos( );
      $( '#pedido-details' ).modal( 'hide' );
    }
  });
}

function ready( id )
{
  $.ajax({
    url: url + 'pedidos/setDo',
    type: 'POST',
    dataType: 'json',
    data: { pedido: id }
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
      Swal.fire({
        icon: 'success',
        title: '¡Hecho!',
        text: response.msg,
      });

      getPedidos( );
      $( '#pedido-details' ).modal( 'hide' );
    }
  });
}

$(document).ready( ( ) =>
{

  //obtenemos los pedidos
  getPedidos( );

});
