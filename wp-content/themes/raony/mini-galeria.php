
<div class="row">

	<figure>

		<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">

		  	<?php 

	  		for ($i=0; $i < count( $miniGaleria ); $i++) :

	  			$servico = $miniGaleria[ $i ]['servico'];
	  			$modelo = $miniGaleria[ $i ]['modelo'];
	  			$antes = $miniGaleria[ $i ]['antes'];
	  			$antes = wp_get_attachment_image_src($antes, 'galeria-lg');
	  			$depois = $miniGaleria[ $i ]['depois'];
	  			$depois = wp_get_attachment_image_src($depois, 'galeria-lg');

	  			?>

			    <div class="item <?php echo ( $i == 0 ) ? 'active' : ''; ?>">
			    	<div id="antes" class="col-sm-6">
			    		<div class="row">
			    			<span>Antes</span>
			    			<img src="<?php echo $antes[0] ?>">
			    		</div>
			    	</div>
			    	<div id="depois" class="col-sm-6">
			    		<div class="row">
			    			<span>Depois</span>
			    			<img src="<?php echo $depois[0] ?>">
			    		</div>
			    	</div>
			    </div>

				<?php 

			endfor; 

			?>

 		  </div>


 		  <?php if ( count( $miniGaleria ) > 1 ) : ?>

			  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon icon-prev ani-04-in-out" aria-hidden="true">
				</span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon icon-next ani-04-in-out" aria-hidden="true">
			    </span>
			    <span class="sr-only">Next</span>
			  </a>

		  <?php endif; ?>

		  <?php if ( count( $miniGaleria ) > 1 ) : ?>

		  <!-- Indicators -->
		  <ol class="carousel-indicators">

		  	<?php 

		  	for ($i=0; $i < count( $miniGaleria ); $i++) :

				?>

			    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i ?>" class="<?php echo ( $i == 0 ) ? 'active' : ''; ?>"></li>

			    <?php 

		    endfor;

		    ?>

		  </ol>

  		  <?php endif; ?>

		</div>

		<div class="clearfix"></div>

	</figure>

</div>

