'use strict'

var table = null;
var url = $('#url').val( );

function getProductos( )
{
  //Aqui contactamos con el servidor
  $.ajax({
    url: url + 'menu/getProductos',
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
        text: 'No se pudo obtener los productos del sistema',
      });
    }
    else if ( response.status == 200 )
    {
      $( '#table-productos' ).html( response.data[0] );
      $( '#select-product' ).html( response.data[1] );
      setTable( );
    }
  });
}

function setTable( )
{
  if ( table != null )
    table.destroy();

  table = $( '#productosTable' ).DataTable(
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
  //mostramos los registros
  getProductos( );

  $( '.new-product' ).submit( event =>
  {
    event.preventDefault( );

    //validamos datos
    if
    (
      $( '#name' ).val( ) == '' ||
      $( '#desc' ).val( ) == '' ||
      $( '#precio' ).val( ) == ''
    )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Todos los campos son obligatorios',
      });
      return;
    }

    let data =
    {
      nombre: $( '#name' ).val( ),
      descripcion: $( '#desc' ).val( ),
      precio: $( '#precio' ).val( ),
      categoria: $( '#categoria' ).val( ),
    };

    //Enviamos al servidor
    $.ajax({
      url: url + 'menu/newProduct',
      type: 'POST',
      dataType: 'json',
      data: { data: data },
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

        getProductos( );
      }
    });

  });

  $( '.update-product' ).submit( event =>
  {
    event.preventDefault( );
    
    let data =
    {
      producto: $( '#select-product' ).val( ),
      existencia: $( '#status' ).val( ),
    };

    //Enviamos al servidor
    $.ajax({
      url: url + 'menu/updateProduct',
      type: 'POST',
      dataType: 'json',
      data: { data: data },
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

        getProductos( );
      }
    });
  });

});
