<?php $this->load->view('commons/cabecalho'); ?>
<div class="container">
	<div class="page-header">
		<h1>Importação tabela CSV</h1>
	</div>
	<?php if (isset($error)): ?>
		<div class="alert alert-error"><?php echo $error; ?></div>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
	<?php endif; ?>

	<form method="post" action="<?=base_url('importar')?>" enctype="multipart/form-data">
		<div class="form-group">
			<label>Selecione o arquivo CSV para importação:</label>
				<input type="file" name="csvfile"/>
		</div>
		<input id="submit" type="submit" value="Importar" class="btn btn-success" />
	</form>
	<br><br>
	<script type="text/javascript">
		$(document).ready(function() { 
		     $('#submit').click(function() { 
            	$.blockUI({css: { backgroundColor: '#e5eff1'}, message: '<h1><img src="assets/images/gif-loading.gif" style="max-width: 80px" /> Por Favor aguarde...</h1>' }); 
            	test(); 
        }); 
		}); 

	</script>

<?php $this->load->view('commons/rodape'); ?>
