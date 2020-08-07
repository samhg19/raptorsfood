$(document).ready(function( )
{

  $( '#login-form' ).submit(function( event )
  {
    event.preventDefault( );

    var url = $('#url').val( );

    //Esto es un JSON
    var data =
    {
      matricula: $('#matricula').val( ),
      password: $('#password').val( )
    };

    //Aqui contactamos con el servidor
    $.ajax({
      url: url + 'Auth/Access',
      type: 'POST',
      dataType: 'json',
      data: { data: data, }
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
        window.location.href = response.url;
    });


  });

});
