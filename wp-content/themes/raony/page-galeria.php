<?php get_header(); ?>



	<section id="galeria">


		<section id="apresentacao">
			<div class="container-fluid">

				<div class="row">
					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
						<p>Com muito orgulho colocamos aqui algumas das tranformações que realizamos para os nossos clientes.</p>
					</div>
				</div>

			</div>
		</section>

		<?php 

            $galeria = get_page_by_path( 'galeria' );
            $galeria = get_field( 'galeria', $galeria->ID );

			$servicos = array();
			$servicos['martelinho'] = 'Martelinho de Ouro';
			$servicos['polimento'] = 'Polimento';
			$servicos['estetica'] = 'Estética Automotiva';

			$par = true;

			for ($i=0; $i < count( $galeria ); $i++) 
			{ 

				if ( $i % 2 == 0 ) :
					$par = true;
				else :
					$par = false;
				endif;

				$servico = $galeria[ $i ]['servico'];
				$modelo = $galeria[ $i ]['modelo'];
				$antes = $galeria[ $i ]['antes'];
        		$antes = wp_get_attachment_image_src($antes, 'galeria');
				$depois = $galeria[ $i ]['depois'];
        		$depois = wp_get_attachment_image_src($depois, 'galeria');

				?>

				<article id="galeria-<?php echo $servico; ?>" class="<?php echo ( !$par ) ? '' : 'galeria-left'; ?>">
					<div class="container-fluid">

						<div id="row-galeria" class="row">
							<div id="title" class="col-sm-3 <?php echo ( $par ) ? '' : 'col-sm-push-9'; ?>">
								<div id="wrap">
									<h2><?php echo $servicos[$servico] ?></h2>
									<div class="separador-title"></div>
									<h3><?php echo $modelo ?></h3>
								</div>
							</div>

							<figure class="col-sm-9 col-sm-offset-3 <?php echo ( $par ) ? '' : 'col-sm-pull-3'; ?>">
								<div class="row">
									<div class="col-sm-6 img-antes">
										<div id="legenda" class="ani-04-in-out">Antes</div>
										<div id="efeito"></div>
										<img src="<?php echo $antes[0]; ?>">
									</div>
									<div class="col-sm-6 img-depois">
										<div id="legenda" class="ani-06-in-out">Depois</div>
										<img src="<?php echo $depois[0]; ?>">
									</div>
								</div>
							</figure>
						</div>

					</div>
				</article>


				<?php 

			}

		 ?>

		<div class="clearfix"></div>

		<div id="rodape" class="container-fuid"></div>




		<!-- <?php include 'depoimentos.php'; ?> -->

		<?php include 'contato.php'; ?>


	</section>



<?php get_footer(); ?>
