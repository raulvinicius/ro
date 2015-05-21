<?php get_header(); ?>



	<section id="home" class="page">


		<section id="apresentacao">
			<div class="container-fluid">

				<div class="row">
				<div id="bg-logo">
					<div id="cols" class="col-sm-12">
						<figure><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-logo.png"></figure>
					</div>
				</div>
				</div>

			</div>
		</section>

		<section id="servicos">
			<div class="container-fluid">

				<div id="intro" class="row">

					<div class="col-sm-12">
						<h2 class="hided ani-04-in-out">Lembra, aquela sensação de carro novo?
						<span class="hided ani-04-in-out">Nós também adoramos!</span></h2>
					</div>

					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
						<p class="hided ani-04-in-out">E pensando nisso, oferecemos os melhores serviços para trazer de volta, pra você, aquela sensação, ou se for o caso, não deixá-la ir embora.</p>
					</div>

				</div>

				<div class="row">

					<div id="martelinho" class="col-sm-4 hided">
						<h3>
							<i><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-icon-martelinho.png"></i>
							Martelinho de Ouro
						</h3>

						<p>Restauração artesanal, lataria original.</p>

						<div class="linha-divisao"></div>

						<a class="veja-mais" href="<?php bloginfo('url') ?>/martelinho-de-ouro">
							<span>Conheça melhor</span>
							<i class="glyphicon glyphicon-plus-sign ani-02-in-out"></i>
						</a>

					</div>

					<div id="polimento" class="col-sm-4 hided ani-04-in-out">
						<h3>
							<i><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-icon-polimento.png"></i>
							Polimento
						</h3>

						<p>Pintura tão viva, que quase respira.</p>

						<div class="linha-divisao"></div>

						<a class="veja-mais" href="<?php bloginfo('url') ?>/polimento">
							<span>Conheça melhor</span>
							<i class="glyphicon glyphicon-plus-sign ani-02-in-out"></i>
						</a>

					</div>

					<div id="estetica" class="col-sm-4 hided ani-06-in-out">
						<h3>
							<i><img src="<?php bloginfo('template_url') ?>/img/raonyoliveira-icon-estetica.png"></i>
							Estética automotiva
						</h3>

						<p>Está tudo nos detalhes.</p>

						<div class="linha-divisao"></div>

						<a class="veja-mais" href="<?php bloginfo('url') ?>/estetica-automotiva">
							<span>Conheça melhor</span>
							<i class="glyphicon glyphicon-plus-sign ani-02-in-out"></i>
						</a>

					</div>
				</div>

			</div>
		</section>

		<!-- <?php include 'depoimentos.php'; ?> -->

		<?php include 'contato.php'; ?>






	</section>



<?php get_footer(); ?>
