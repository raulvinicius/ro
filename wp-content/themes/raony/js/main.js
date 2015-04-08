$(document).ready(function() {


	$( window ).scroll(function() 
	{
		setTimeout(showInAnimation,400);
	});
	showInAnimation();

	$( 'body' ).on( 'click', 'button.dead', function(){ return false; } );
	
	if( $( '#map-canvas' ).length > 0 )
	{
		initializeMap();
	}


	$('.segredo').remove();
		

	urlToOpenForm();

	$('.navbar a.contato').bind( 'click', function(e){
		getBeforeForm();
		e.preventDefault;
		$('#contato').show();
		$('body').css('overflow', 'hidden');
		return false;
	} );

	$('.navbar a.reservas').bind( 'click', function(e){
		getBeforeForm();
		e.preventDefault;
		$('#reservas').show();
		$('body').css('overflow', 'hidden');
		return false;
	} );

	$('.fechar-modal-form').bind( 'click', function(e){
		$(this).closest('form').find('alert').hide();
		$(this).closest('section').hide();
		$('body').css('overflow', 'auto');
		// $(this).closest('form')[0].reset();
		var curUrl = window.location.href.slice(0, window.location.href.slice(0, -1).lastIndexOf('/'));
		history.pushState({}, '', curUrl + '/' + beforeForm + '/');
		return false;
	} );

	// $('.aton-form').bind( 'click', function(e){
	// 	return false;
	// } );


	$( '#telefone-reserva, #telefone-contato' ).mask('(00) 0000 0000', {placeholder: "(__) ____ ____"});
	$( '#entrada-reserva, #home.chamada #entrada-reserva' ).mask('00/00/0000', {placeholder: "__/__/____"});
	$( '#saida-reserva, #home.chamada #saida-reserva' ).mask('00/00/0000', {placeholder: "__/__/____"});




	//LINKS COM MODAL

	$( '#navbar .nav .reservas, #navbar .nav .contato' ).bind('click', function(){
		history.pushState({}, '', $(this).attr("href") + '/');
		return false;
	})

	$(window).on("popstate", function(e) {
		urlToOpenForm();
	});


	/////////////////





	//VERIFICAR TARIVAS

	$('.quartos-tarifas .wrap-verificar .verificar').bind('click', function()
	{
		var mTop = '-' + $( '.quartos-tarifas .wrap-verificar' ).height();
		$( this ).css('margin-top', mTop + 'px');
		mTop = undefined;

	})

	$('.quartos-tarifas .wrap-verificar .quartos-quantidade .seta-up').bind('click', function()
	{
		var qtdMaxQuartos = parseInt( $( this ).closest( '.quartos-disponiveis' ).find( 'p strong').text() );
		var qtdQuartos = parseInt( $( this ).closest( '.quartos-quantidade' ).find( 'span').text() );

		qtdQuartos = Math.min(qtdQuartos+1, qtdMaxQuartos);
		$( this ).closest( '.quartos-quantidade' ).find( 'span').text( '0' + qtdQuartos );

		qtdQuartos = undefined;
	})

	$('.quartos-tarifas .wrap-verificar .quartos-quantidade .seta-down').bind('click', function()
	{
		var qtdQuartos = parseInt( $( this ).closest( '.quartos-quantidade' ).find( 'span').text() );

		qtdQuartos = Math.max(qtdQuartos-1, 1);
		$( this ).closest( '.quartos-quantidade' ).find( 'span').text( '0' + qtdQuartos );

		qtdQuartos = undefined;
	})

	///////////////////




	// deixa o bg do título do mesmo tamanho que as vantagens
	hotelSobreTituloSameHeight();
	$( window ).resize(function(e) 
	{
		hotelSobreTituloSameHeight();
	});


	$('.aton-form').submit(function(){return false}); 
	$('section#contato form input[type="submit"]').bind('click', 
		function()
		{
			$(this).closest('form').validate({
				submitHandler: function(form)
				{

					$(form).find('#success').hide();
					$(form).find('#error').hide();
					$(form).find('.form-text').hide();
					$(form).find('fieldset').hide();
					$(form).find('.form-text').hide();
					$(form).find('input[type=submit]').hide();

					$(form).find('#process').show();

					$(form).ajaxSubmit({
						type: 'post',
						success: contatoOk
					});

				}, 
				rules: {
					nm: {
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
						required: 'Campo obrigatório'
					},
					ml: {
						email: 'E-mail inválido',
						required: 'Campo obrigatório'
					},
					msgm: {
						required: 'Deixe sua mensagem'
					}
				}
			});
		}
	)

	$('section#reservas form input[type="submit"]').bind('click', 
		function()
		{
			//parte feita com aspas duplas pra encaixar melhor no script PHP

			//var tst = "<table width='100%' style='margin: 10px 0; color: #333'> <tr> <td style='background: #ccc; width: 100%; height: 50px; font-size: 18px; text-transform: uppercase; padding: 5px;'> <p> <b>";
			var tst = '';

			$( this ).closest( 'form' ).find( '#quartos .quarto:not(".template"):not("disabled")' ).each( function()
			{
				tst += '<b>01 Apartamento ' + $( this ).find( 'select' ).val() + '</b> ';

				//tst += "</b><br> <span style='font-size: 12px; font-style: italic; text-transform: none;'>";

				lCama = $( this ).find( 'input[type=checkbox]:checked' ).length > 0;
				lCrianca = false;
				$( this ).find( '.hospede.crianca:not(".template") input').each( function()
				{
					if( $( this ).val() != "" )
					{
						lCrianca = true;
					}
				});

				if( lCama && !lCrianca )
				{
					tst += "(com Cama Extra) ";
				}
				else if( !lCama && lCrianca )
				{
					tst += "(com Criança menor de 07 anos)";
				}
				else if( lCama && lCrianca )
				{
					tst += "(com Cama Extra e Criança menor de 07 anos)";
				}


				//tst += "</span> </p> </td> </tr> <tr> <td style='background: #e7e7e7; width: 100%; height: 50px; padding: 10px 5px 20px;'> <p style='line-height: 26px;'>";
				tst += '<br><br>';

				$( this ).find( '#hospedes .hospede:not(".template")' ).each( function()
				{
					if( $( this ).find( 'input' ).val() != '')
					{

						if( $( this ).hasClass( 'crianca' ) && $( this ).find( 'input' ).val() != '')
						{
							tst += "<b>Criança:</b> ";
						}
						
						if( $( this ).hasClass( 'extra' ) )
						{
							tst += "<b>Cama Extra:</b> ";
						}
						
						if( $( this ).not('.crianca').not('.extra').length > 0 )
						{
							tst += "<b>Hóspede:</b> ";
						}

						tst += $( this ).find( 'input' ).val() + '<br>';

					}
				})

				//tst += '</p> </td> </tr> </table>';
				tst += "<br><br><br>";
			})

			$( '#reservas form #quartos-extenso-reserva' ).val( tst );

			tst = undefined;

			$(this).closest('form').validate({
				submitHandler: function(form)
				{
					$(form).find('#success').hide();
					$(form).find('#error').hide();
					$(form).find('fieldset').hide();
					$(form).find('.form-text').hide();
					$(form).find('input[type=submit]').hide();

					$(form).find('#process').show();

					$(form).find( '#hospedes .hospede input' ).each( function()
					{
						console.log($(this));
					});

					$(form).ajaxSubmit({
						type: 'post',
						success: reservaOk
					});
				}, 
				rules: {
					'nm-reserva': {
						required: true
					},
					'ml-reserva': {
						email: true,
						required: true
					},
					'tlfn-reserva': {
						required: true
					},
					'cdd-reserva': {
						required: true
					},
					'ntrd-reserva': {
						required: true
					},
					'sd-reserva': {
						required: true
					},
					'pgmnt-reserva': {
						required: true
					}
				},
				messages: {
					'nm-reserva': {
						required: 'Campo obrigatório'
					},
					'ml-reserva': {
						email: 'E-mail inválido',
						required: 'Campo obrigatório'
					},
					'tlfn-reserva': {
						required: 'Campo obrigatório'
					},
					'cdd-reserva': {
						required: 'Campos obrigatórios'
					},
					'ntrd-reserva': {
						required: 'Campo obrigatório'
					},
					'sd-reserva': {
						required: 'Campo obrigatório'
					},
					'pgmnt-reserva': {
						required: 'Campo obrigatório'
					}
				}
			});
		}
	)

	$('#home.chamada form input[type="submit"]').bind('click', 
		function()
		{
			$( '#reservas form #nome-reserva' ).val( $( this ).closest( 'form' ).find( '#nome-reserva' ).val() )
			$( '#reservas form #telefone-reserva' ).val( $( this ).closest( 'form' ).find( '#telefone-reserva' ).val() )
			$( '#reservas form #email-reserva' ).val( $( this ).closest( 'form' ).find( '#email-reserva' ).val() )
			$( '#reservas form #saida-reserva' ).val( $( this ).closest( 'form' ).find( '#saida-reserva' ).val() )
			$( '#reservas form #entrada-reserva' ).val( $( this ).closest( 'form' ).find( '#entrada-reserva' ).val() )
			$( this ).closest( 'form' )[0].reset();
			
			$('.navbar a.reservas').click();
		}
	);

	$('.alert button').bind('click', function()
	{
		$(this).closest('.alert').hide();
	})

	$( '#novidades #bg-novidade.rodape input[type="checkbox"]' ).bind( 'click', function()
	{
		$(this).closest('label').find('span').attr('checked', this.checked);
	});

	$('body').on('click', '#reservas form #quartos li input[type=checkbox]', function(){
		$(this).closest('label').find('span').attr('checked', this.checked);

		if( this.checked )
		{
			var nQuarto = $( this ).closest('.quarto').find('#id-quarto').val();
			var eQuarto = $( this ).closest( '.quarto' );

			eQuarto.find( '.hospede.extra.template' ).clone().insertBefore( eQuarto.find( '#hospedes #cf-hospede') );
			eQuarto.find( '.hospede.extra.template' ).last().removeClass('template').addClass( 'hospede-extra-quarto-' + nQuarto);

			eQuarto.find( '.hospede-extra-quarto-' + nQuarto + ' #extra-quarto').attr({
				'name': 'hospede-extra-quarto-' + nQuarto,
				'id': 'hospede-extra-quarto-' + nQuarto
			});

			eQuarto.find( '#hospede-extra-quarto-' + nQuarto ).closest( 'label' ).attr({
				'for': 'hospede-extra-quarto-' + nQuarto
			});

		}
		else
		{
			$( this ).closest( '.quarto' ).find( '#hospedes .hospede.extra' ).last().remove();			
		}

		contabilizaQuartos();
	})

	$('body').on('click', '#reservas form #quartos li #num .seta-up', function()
	{
		var qtd = parseInt( $( this ).closest( '#num' ).find( 'span' ).text() );
		qtd = Math.min( qtd + 1, 4 );

		$( this ).closest( '#num' ).find( 'span' ).text( '0' + qtd );
		$( this ).closest( '#num' ).find( 'input' ).val( qtd );

		contabilizaQuartos();
	})

	$('body').on('click', '#reservas form #quartos li #num .seta-down', function()
	{
		var qtd = parseInt( $( this ).closest( '#num' ).find( 'span' ).text() );
		qtd = Math.max( qtd - 1, 1 );

		$( this ).closest( '#num' ).find( 'span' ).text( '0' + qtd );
		$( this ).closest( '#num' ).find( 'input' ).val( qtd );

		contabilizaQuartos();
	})

	$('body').on( 'change', '#reservas form #quartos li select', function() {
		if( $( this ).val() != "" )
		{
			$( this ).closest( 'li' ).find( 'figure' ).css( 'background', 'none' );
			$( this ).closest( 'li' ).find( 'figure img' ).show();
			$( this ).closest( 'li' ).find( 'figure img' ).attr( 'src', templateUrl + '/img/aton-tb-quarto-' + URLize( $(this).val() ) + '-reservas.jpg' );
		}
		else
		{
			$( this ).closest( 'li' ).find( 'figure' ).css( 'background', '#ddd' );
			$( this ).closest( 'li' ).find( 'figure img' ).hide();
		}


		var apSelected = $(this).find('option:selected').attr('value');


		var eQuarto = $( this ).closest( '.quarto' );
		eQuarto.find( 'input[type="checkbox"]' ).prop( 'checked', false );
		eQuarto.find( 'input[type="checkbox"]' ).closest( 'label' ).find( 'span' ).removeAttr( 'checked' );

		if( apSelected != '' )
		{
			eQuarto.find( '.opcao-2' ).show();
			eQuarto.find( '#hospedes .hospede' ).not('.template').remove();

			var apt = apartamentos[apSelected];
			eQuarto.find( '.opcao-3' ).show();

			var nQuarto = $( this ).closest('.quarto').find('#id-quarto').val();

			for (var i = 0; i < apt.qtdAdultos; i++)
			{
				$( '#hospedes .hospede.template:not(".crianca"):not(".extra")').clone()
					.insertBefore( eQuarto.find( '#hospedes #cf-hospede' ) );

				var n = eQuarto.find( '#hospedes .hospede' ).not('.template').length + 1;

				eQuarto.find( '#hospedes .hospede' ).last()
					.removeClass('template')
					.addClass('hospede-' + n + '-quarto-' + nQuarto)
					.show();

				$( this ).closest( '#quartos' ).find( '.hospede-' + n + '-quarto-' + nQuarto + ' #hospede-quarto' ).attr({
					'name': 'nome-hospede-' + n + '-quarto-' + nQuarto,
					'id': 'nome-hospede-' + n + '-quarto-' + nQuarto
				});

				$( this ).closest( '#quartos' ).find( '.hospede-' + n + '-quarto-' + nQuarto + ' label' ).attr({
					'for': 'nome-hospede-' + n + '-quarto-' + nQuarto
				});

			}

			eQuarto.find( '.hospede.crianca.template' ).clone()
				.insertBefore( eQuarto.find( '#hospedes #cf-hospede') );

			eQuarto.find( '.hospede.crianca.template' ).last()
				.removeClass('template')
				.addClass( 'hospede-crianca-quarto-' + nQuarto);

			eQuarto.find( '.hospede-crianca-quarto-' + nQuarto + ' #crianca-quarto').attr({
				'name': 'hospede-crianca-quarto-' + nQuarto,
				'id': 'hospede-crianca-quarto-' + nQuarto
			});

			eQuarto.find( '#hospede-crianca-quarto-' + nQuarto ).closest( 'label' ).attr({
				'for': 'hospede-crianca-quarto-' + nQuarto
			});

/*
			eQuarto.find( '#nome-hospede-' + n + '-quarto-' + nQuarto).rules('add', 
			{
	           required: true,
	           messages: {
	               required:"Por favor, informe os nomes dos hospedes"
	           }
			})
*/
		}
		else
		{
			eQuarto.find( '#hospedes .hospede.crianca' ).last().remove();			
			eQuarto.find( '.opcao-2, .opcao-3' ).hide();

			eQuarto.find( '#hospedes .hospede' ).not('template').remove();

		}

		contabilizaQuartos();
	});

	$('body').on( 'click', '#reservas form #quartos li #exclui-quarto', function() {
		$( this ).closest( 'li' ).hide().addClass('disabled').find( 'input, select' ).attr('disabled', true);

		contabilizaQuartos();
	});

	$( '#reservas form #btn-add-quarto' ).bind('click', function(){

		setTimeout( function() {
			$( '#reservas form #quartos .quarto' ).last().find( 'select' ).focus();
		}, 200);
		/*
		*/

		$( 'li.quarto.template' ).clone().insertBefore( $( '#reservas form #quartos #cf-quartos' ) );
		var n = $( '#reservas form #quartos .quarto' ).length - 1;
		$( '#reservas form #total-quartos-reserva' ).val( n );
		$( '#reservas form #quartos .quarto ' ).last().find('#id-quarto').val( n );

		$( '#reservas form #quartos .quarto' ).last().removeClass('template').addClass('quarto-' + n).show();
		$( '#reservas form #quartos .quarto-' + n + ' #quantidade-quarto-reserva' ).attr({
			'name': 'quantidade-quarto-reserva-' + n,
			'id': 'quantidade-quarto-reserva-' + n
		});

		$( '#reservas form #quartos .quarto-' + n + ' #tipo-quarto-reserva' ).attr({
			'id': 'tipo-quarto-reserva-' + n,
			'name': 'tipo-quarto-reserva-' + n
		});

		$( '#reservas form #quartos .quarto-' + n + ' .opcao-2 label' ).attr({
			'for': 'cama-extra-reserva-' + n
		});

		$( '#reservas form #quartos .quarto-' + n + ' .opcao-2 label input' ).attr({
			'id': 'cama-extra-reserva-' + n,
			'name': 'cama-extra-reserva-' + n
		});

		return false;	
	})



	//--------------------------NOVIDADES------------------

	var dataNovidade = $( '#novidades input[type="hidden"]' ).val();
	dataNovidade = dataNovidade.replace(/\-/g, '/');
	var dataCook = $.cookie( 'novaton' );

	if( dataCook != undefined )
	{
		dataCook = dataCook.replace(/\-/g, '/');
		if( dataCook < dataNovidade )
		{
			$( '#novidades' ).show();
			$( 'body' ).css( 'overflow', 'hidden' );
		}
		else
		{
			$( '#novidades' ).remove();
		}
	}
	else
	{
		$( '#novidades' ).show();
		$( 'body' ).css( 'overflow', 'hidden' );
	}

	$( '#novidades #fechar, #novidades #conferir' ).bind( 'click', function()
	{
		if ( $( this ).closest( 'section' ).find( 'input[type="checkbox"]:checked' ).length > 0 )
		{
			$.cookie( 'novaton', $( this ).closest( 'section' ).find( 'input[type="hidden"]' ).val() );
			console.log($.cookie('novaton'))
		}
	} );

	$( '#novidades #fechar' ).bind( 'click', function()
	{
		$( this ).closest( 'section' ).remove();
		$( 'body' ).css( 'overflow', 'auto' );
	} );

	//-----------------------------------------------------



});

function hotelSobreTituloSameHeight ()
{
	if ($("body").innerWidth() > 767)
	{
		$('#hotel #titulo').height( $('#hotel .wrap-vantagens').height() );
	}
	else
	{
		$('#hotel #titulo').removeAttr('style');
	}
}

function urlToOpenForm ()
{
	if( window.location.pathname.indexOf('reservas') >= 0 )
	{
		$( '#contato' ).hide();
		$( '#reservas' ).show();
		$( '#body' ).css('overflow', 'hidden' );
	}
	else if( window.location.pathname.indexOf('contato') >= 0 )
	{
		$( '#reservas' ).hide();
		$( '#contato' ).show();
		$( '#body' ).css('overflow', 'hidden' );
	}
	else
	{
		$('section#reservas, section#contato').hide();
		$('body').css('overflow', 'auto');
	}
}

var beforeForm = '';

function getBeforeForm ()
{
	beforeForm = window.location.pathname.split('/');
	beforeForm = beforeForm[ beforeForm.length - 2 ];
}

function contatoOk (data)
{
	console.log($(this));
	console.log(data);

	$('#contato #process').hide();
	$('#contato form fieldset').show();
	$('#contato form .form-text').show();
	$('#contato form input[type=submit]').show();


	if( data == 'sucesso')
	{
		$('#contato form #success').show();
		$('#contato form')[0].reset();
	}
	else
	{
		$('#contato form #error').show();
	}

}

function reservaOk (data)
{
	console.log($(this));
	console.log(data);

	$('#reservas #process').hide();
	$('#reservas form fieldset').show();
	$('#reservas form .form-text').show();
	$('#reservas form input[type=submit]').show();


	if( data == 'sucesso')
	{
		$('#reservas form #success').show();
		$('#reservas form')[0].reset();
		resetQuartosReserva();
	}
	else
	{
		$('#reservas form #error').show();
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

function contabilizaQuartos () 
{
/*
	var p = parseFloat('0');
	$( '#reservas form #quartos li' ).each( function()
	{
		if( !$( this ).hasClass('template') && !$( this ).hasClass('disabled')  )
		{
			p = p + ( parseFloat( vQ[$( this ).find( 'select' ).val() ] ) * parseInt( $( this ).find( '#num input' ).val() ) );

			if( $( this ).find( 'input[type=checkbox]:checked' ).length > 0 )
			{
				p = p + parseFloat( vQ[$( this ).find( 'input[type=checkbox]:checked' ).val()] ) * parseInt( $( this ).find( '#num input' ).val() );
			}

		}
	})

	$( '#reservas form .preco-quartos p' ).html( 'Total: R$ <span>' + p.toFixed(2) + '</span>' );
	$( '#reservas form .preco-quartos p span' ).mask('000.000.000.000.000,00', {reverse: true});

	p = undefined;
*/
}

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
		if( $( window ).scrollTop() + ( $( window ).height() * 0.8 ) > $(this).offset().top - 300 )
		{
			$(this).addClass('appeared').removeClass('hided');
		}
	})
}

function resetQuartosReserva () 
{
	$( '#reservas #quartos .quarto:not(".template")' ).remove();
}
