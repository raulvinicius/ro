<?php get_header(); ?>



	<section id="galeria">


		<section id="apresentacao">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
						<p>Dê uma olhada em alguns trabalhos concluídos e entenda melhor como nosso trabalho artesanal faz toda a diferença.</p>
					</div>
				</div>

			</div>
		</section>

		<article id="galeria-martelinho" class="galeria-left">
			<div class="container-fluid">

				<div class="row">
					<div id="title" class="col-sm-3">
						<h2>Martelinho de Ouro</h2>
						<div class="separador-title"></div>
						<h3>Jetta Tsi</h3>
					</div>

					<figure class="col-sm-9">
						<div class="row">
							<div class="col-sm-6 img-antes">
								<img src="<?php bloginfo("template_url") ?>/img/raonyoliveira-galeria-antes.jpg">
							</div>
							<div class="col-sm-6 img-depois">
								<img src="<?php bloginfo("template_url") ?>/img/raonyoliveira-galeria-depois.jpg">
							</div>
						</div>
					</figure>
				</div>

			</div>
		</article>

		<article id="galeria-polimento" class="">
			<div class="container-fluid">

				<div class="row">
					<div id="title" class="col-sm-3 col-sm-push-9">
						<h2>Polimento</h2>
						<div class="separador-title"></div>
						<h3>Chevrolet S10</h3>
					</div>

					<figure class="col-sm-9 col-sm-pull-3">
						<div class="row">
							<div class="col-sm-6 img-antes">
								<img src="<?php bloginfo("template_url") ?>/img/raonyoliveira-galeria-antes.jpg">
							</div>
							<div class="col-sm-6 img-depois">
								<img src="<?php bloginfo("template_url") ?>/img/raonyoliveira-galeria-depois.jpg">
							</div>
						</div>
					</figure>
				</div>

			</div>
		</article>

		<article id="galeria-estetica" class="galeria-left">
			<div class="container-fluid">

				<div class="row">
					<div id="title" class="col-sm-3">
						<h2>Estética Automotiva</h2>
						<div class="separador-title"></div>
						<h3>Ford Fiesta</h3>
					</div>

					<figure class="col-sm-9">
						<div class="row">
							<div class="col-sm-6 img-antes">
								<img src="<?php bloginfo("template_url") ?>/img/raonyoliveira-galeria-antes.jpg">
							</div>
							<div class="col-sm-6 img-depois">
								<img src="<?php bloginfo("template_url") ?>/img/raonyoliveira-galeria-depois.jpg">
							</div>
						</div>
					</figure>
				</div>

			</div>
		</article>

		<div class="clearfix"></div>

		<div id="rodape" class="container-fuid"></div>




		<?php include 'depoimentos.php'; ?>

		<?php include 'contato.php'; ?>


	</section>



<?php get_footer(); ?>
