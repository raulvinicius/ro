$(document).ready(function() {


	$( window ).scroll(function() 
	{
		setTimeout(showInAnimation,400);

		posicionaMenu()
	});

	$( window ).scroll();

	showInAnimation();

	$( 'body' ).on( 'click', 'button.dead', function(){ return false; } );
	
	if( $( '#map-canvas' ).length > 0 )
	{
		initializeMap();
	}


	$('.segredo').remove();
		


	$( '#telefone' ).mask('00 0000 0000', {placeholder: "__ ____ ____"});




	$('#contato form').submit(function(){return false}); 
	$('section#contato form input[type="submit"]').bind('click', 
		function()
		{
			$(this).closest('form').validate({
				submitHandler: function(form)
				{

					$(form).find('#success').addClass( 'hidden' );
					$(form).find('#error').addClass( 'hidden' );
					$(form).find('input[type=submit]')
						.attr( 'value', 'Enviando...' )
						.attr( 'disabled', 'disabled' );

					$(form).ajaxSubmit({
						type: 'post',
						success: contatoOk
					});

				}, 
				rules: {
					nm: {
						required: true
					},
					ssnt: {
						required: true
					},
					ml: {
						email: true,
						required: true
					},
					msgm: {
						required: true
					}
				},
				messages: {
					nm: {
						required: 'Informe seu nome'
					},
					ssnt: {
						required: 'Diga-nos o que deseja'
					},
					ml: {
						email: 'E-mail inválido',
						required: 'Qual é o seu e-mail'
					},
					msgm: {
						required: 'Deixe sua mensagem'
					}
				}
			});
		}
	)


	$('.alert button').bind('click', function()
	{
		$(this).closest('.alert').addClass( 'hidden' );
	})


	urlToFunction();
});


function posicionaMenu()
{
	if( $( window ).scrollTop() + 96 > $( window ).height() || $( '#home' ).length == 0 )
	{
		$( 'nav.navbar' ).removeClass('menu-bottom').addClass('menu-top');
		$( 'nav.navbar.menu-top').find('.col-md-8')
			.removeClass('col-md-8')
			.addClass('col-md-9');

		$( 'nav.navbar.menu-top').find('.col-md-2')
			.removeClass('col-md-2')
			.addClass('col-md-3');
	}
	else
	{
		$( 'nav.navbar' ).addClass('menu-bottom').removeClass('menu-top');
		$( 'nav.navbar.menu-bottom').find('.col-md-9')
			.removeClass('col-md-9')
			.addClass('col-md-8');

		$( 'nav.navbar.menu-bottom').find('.col-md-3')
			.removeClass('col-md-3')
			.addClass('col-md-2');
	}


}

function urlToFunction ()
{
	if( window.location.pathname.indexOf('martelinho-de-ouro') >= 0 )
	{

		$( 'body' ).removeClass('verde')
			.removeClass('azul')
			.removeClass('vermelho')
			.addClass('amarelo');

	}
	else if( window.location.pathname.indexOf('polimento') >= 0 )
	{

		$( 'body' ).removeClass('verde')
			.removeClass('amarelo')
			.removeClass('vermelho')
			.addClass('azul');
			
	}
	else if( window.location.pathname.indexOf('estetica-automotiva') >= 0 )
	{

		$( 'body' ).removeClass('verde')
			.removeClass('amarelo')
			.removeClass('azul')
			.addClass('vermelho');
			
	}

}

var beforeForm = '';
	
function contatoOk (data)
{
	console.log(data);

	$( '#contato form input[type=submit]')
		.attr( 'value', 'Enviar' )
		.removeAttr( 'disabled' );


	if( data == 'sucesso')
	{
		console.log('foi um sucesso!')
		$('#contato form #form-notes #success').removeClass( 'hidden' );
		$('#contato form')[0].reset();
	}
	else
	{
		console.log('deu merda!')
		$('#contato form #form-notes #error').removeClass( 'hidden' );
	}

}

function URLize (s) 
{
    var r=s.toLowerCase();
    r = r.replace(new RegExp(/\s/g),"");
    r = r.replace(new RegExp(/[àáâãäå]/g),"a");
    r = r.replace(new RegExp(/æ/g),"ae");
    r = r.replace(new RegExp(/ç/g),"c");
    r = r.replace(new RegExp(/[èéêë]/g),"e");
    r = r.replace(new RegExp(/[ìíîï]/g),"i");
    r = r.replace(new RegExp(/ñ/g),"n");                
    r = r.replace(new RegExp(/[òóôõö]/g),"o");
    r = r.replace(new RegExp(/œ/g),"oe");
    r = r.replace(new RegExp(/[ùúûü]/g),"u");
    r = r.replace(new RegExp(/[ýÿ]/g),"y");
    r = r.replace(new RegExp(/\W/g),"");
    return r;
};

function pluralize (s, p, n)
{
	if( n != 1)
	{
		return p;
	}
	else
	{
		return s;
	}
}

function initializeMap()
{

	var myLatLgn = new google.maps.LatLng( -16.675207,-49.260501 );

	var mapCanvas = document.getElementById( 'map-canvas' );
	var mapOptions = {
		center: myLatLgn,
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		backgroundColor: '7030a0',
		scrollwheel: false
	}
	var map = new google.maps.Map( mapCanvas, mapOptions );

	var marker = new google.maps.Marker({
	    position: myLatLgn,
	    map: map,
	    title:"Hello World!"
	});

}

function showInAnimation () 
{

	$('.hided').each(function()
	{
		if( $( window ).scrollTop() + ( $( window ).height() * 0.5 ) > $(this).offset().top - 300 )
		{
			$(this).addClass('appeared').removeClass('hided');
		}
	})
}
