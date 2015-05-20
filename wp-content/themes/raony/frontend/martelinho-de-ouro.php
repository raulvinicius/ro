<?php get_header(); ?>



	<section id="martelinho" class="page">


		<section id="apresentacao">
			<div class="container-fluid">

				<div class="row">
				<div id="bg-logo">

				</div>
				</div>

			</div>

		</section>

		<section id="beneficios">
			<div class="container-fluid">

				<div id="intro" class="row">

					<div class="col-sm-8 col-sm-offset-2">
						<h2>Restauração artesanal, lataria original.</span></h2>
					</div>

					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">
						<p>A técnica do Martelinho de Ouro permite que você mantenha a lataria original do seu carro, pois não há substituição da peça ou preenchimentos com massa, se trata basicamente de dedicação, criatividade e perfeccionismo.</p>
					</div>

				</div>

				<div id="lista" class="row">

					<h3>Porque nos escolher:</h3>

					<ul>
						<li>
							<figure>
								<img src="">
							</figure>
						</li>
					</ul>

				</div>

			</div>
		</section>

		<section id="depoimentos">
			<div class="container-fluid">

				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<h2>
							<i><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-icon-aspas.png"></i>
							Clientes felizes
						</h2>
					</div>
				</div>

				<div class="row">
					<div id="seta-left" class="col-xs-2 col-sm-offset-1 col-sm-1 col-md-offset-2 col-md-1 col-lg-offset-3 col-lg-1">
						<button><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-icon-seta-depoimentos-left.png"></button>
					</div>

					<div class="col-xs-8 col-sm-8 col-md-6 col-lg-4">
						<blockquote>
							<p>
								Do mesmo modo, a competitividade nas transaações comerciais acarreta
								um processo de reformulação e modernização dos níveis de motivação
								departamental.
							</p>

							<footer>
								Caren Campbell
								<span>Arquiteta</span>
							</footer>
						</blockquote>
					</div>
					
					<div id="seta-right" class="col-xs-2 col-sm-1 col-md-1 col-lg-1">
						<button><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-icon-seta-depoimentos-right.png"></button>
					</div>
				</div>

			</div>
		</section>

		<section id="contato" class="container-fluid">

			<div class="row">
				<div class="col-sm-offset-1 col-sm-10">
					<h2>Contato e orçamentos</h2>
				</div>
			</div>


			<div class="row">
				<form class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">

					<div class="row">
						<div id="group-nome" class="form-group col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	    					<label for="nome">Nome <span>*</span></label>
	    					<input type="text" id="nome">
		  				</div>
					</div>

					<div class="row">
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	    					<label for="assunto">Assunto <span>*</span></label>
		    				<select id="assunto">
		    					<option></option>
		    					<option>Contato</option>
		    					<option>Orçamento</option>
		    					<option>Depoimento</option>
		    				</select>
						</div>
	  				</div>

	  				<div class="row">
						<div class="form-group col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-6">
	    					<label for="email">E-mail <span>*</span></label>
	    					<input type="email" id="email">
		  				</div>

						<div class="form-group col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4">
    						<label for="telefone">Telefone</label>
    						<input type="phone" id="telefone">
		  				</div>
	  				</div>

	  				<div class="row">
	  					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	  						<div id="separador"></div>
	  					</div>
	  				</div>

	  				<div id="group-mensagem" class="row">
	  					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
  							<label for="mensagem">Mensagem <span>*</span></label>
  							<textarea id="mensagem"></textarea>
	  					</div>
	  				</div>

	  				<div class="row">
	  					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	  						<button type="submit">Enviar</button>
	  					</div>
	  				</div>

				</form>
			</div>

			<div><a id="humano" title="By Humano" href="#">By Humano</a></div>

		</section>




	</section>



<?php get_footer(); ?>
