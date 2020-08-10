'use strict'

var table = null;
var url = $('#url').val( );

function getAdmins( )
{
  //Aqui contactamos con el servidor
  $.ajax({
    url: url + 'usuarios/getAdmins',
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
        text: 'No se pudo obtener a los usuarios del sistema',
      });
    }
    else if ( response.status == 200 )
    {
      $( '#table-users' ).html( response.data );
      setTable( );
    }
  });
}

function setTable( )
{
  if ( table != null )
    table.destroy();

  table = $( '#users' ).DataTable(
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
  getAdmins( );

  $( '.new-user' ).submit( event =>
  {

    event.preventDefault( );

    //validamos datos
    if
    (
      $( '#email' ).val( ) == '' ||
      $( '#access' ).val( ) == '' ||
      $( '#name' ).val( ) == '' ||
      $( '#password' ).val( ) == '' ||
      $( '#rPassword' ).val( ) == ''
    )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Todos los campos son obligatorios',
      });
      return;
    }

    if ( $( '#password' ).val( ) != $( '#rPassword' ).val( ) )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Las contraseñas no coinciden',
      });
      return;
    }

    let data =
    {
      matricula: $( '#access' ).val( ),
      nombre: $( '#name' ).val( ),
      email: $( '#email' ).val( ),
      password: $( '#password' ).val( )
    };

    //Enviamos al servidor
    $.ajax({
      url: url + 'usuarios/newAdmin',
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

        getAdmins( );
      }
    });

  });

});
