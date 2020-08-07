$(document).ready(function( )
{

  $( '#register-form' ).submit(function( event )
  {
    event.preventDefault( );

    var url = $('#url').val( );

    //Contraseñas iguales ¿?
    if ( $('#password').val( ) != $('#rPassword').val( ) )
    {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Las contraseñas no son iguales',
      });
      return;
    }

    var data =
    {
      matricula: $('#matricula').val( ),
      nombre: $('#name').val( ),
      correo: $('#email').val( ),
      carrera: $('#carrera').val( ),
      password: $('#password').val( )
    };

    //Contactamos con el servidor
    $.ajax({
      url: url + 'Auth/NewRegister',
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
