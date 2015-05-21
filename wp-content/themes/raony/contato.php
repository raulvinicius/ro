		<section id="contato" class="container-fluid">

			<div class="row">
				<div class="col-sm-offset-1 col-sm-10">
					<h2>Contato e orçamentos</h2>
				</div>
			</div>


			<div class="row">
				<form class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6" action="<?php bloginfo('url') ?>/envia-email" method="POST">

					<div class="row">
						<div id="group-nome" class="form-group col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	    					<label for="nome">Nome <span>*</span></label>
	    					<input type="text" id="nome" class="ani-04-in-out cor-mestre required" name="nm">
		  				</div>
					</div>

					<div class="row">
						<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	    					<label for="assunto">Assunto <span>*</span></label>
		    				<select id="assunto" class="cor-mestre required" name="ssnt">
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
	    					<input type="email" id="email" class="cor-mestre required" name="ml">
		  				</div>

						<div class="form-group col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4">
    						<label for="telefone">Telefone</label>
    						<input type="phone" id="telefone" class="cor-mestre" name="tlfn">
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
  							<textarea id="mensagem" class="cor-mestre required" name="msgm"></textarea>
	  					</div>
	  				</div>

	  				<div class="row">
	  					<div class="col-xs-offset-1 col-xs-10 col-sm-offset-1 col-sm-10">
	  						<input class="cor-mestre" type="submit" value="Enviar">
	  					</div>
	  				</div>

	  				<div id="form-notes" class="row">

  						<div id="success" class="hidden cor-mestre alert alert-success">
  						  <button type="button" class="close"><span class="glyphicon glyphicon-remove-sign"></span></button>
  						  <strong>Sucesso!</strong> Seu e-mail foi enviado, obrigado.
  						</div>

  						<div id="error" class="hidden cor-mestre alert alert-warning">
  						  <button type="button" class="close"><span class="glyphicon glyphicon-remove-sign"></span></button>
  						  <strong>Opa!</strong> E-mail não enviado, tente novamente.
  						</div>

	  				</div>

				</form>
			</div>

			<div><a id="humano" title="By Humano" href="#">By Humano</a></div>

		</section>