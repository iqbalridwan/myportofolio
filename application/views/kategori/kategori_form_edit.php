<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Kategori</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<!-- /.panel-->
				<div class="panel panel-default">
					<div class="panel-heading">Forms</div>
					<div class="panel-body">
						<div class="col-md-6 col-md-offset-3">
							<form role="form" action="" method="post">
								<?php $row=$row->row(); ?>
							<div class="form-group">
								<label>Kategori* </label>
								<input type="hidden" value="<?=$row->id_kategori ?>" name="id_kategori">
								<input class="form-control" type="text"  value="<?=$this->input->post('kategori_sampah') ?? $row->kategori_sampah ?>"  name="kategori_sampah">
								<?= form_error('kategori') ?>
							</div>
										<button type="submit" class="btn btn-primary">Submit Button</button>
									<button type="reset" class="btn btn-default">Reset Button</button>
								</div>
							
						</div>
					</div>
				</div><!-- /.panel-->
			</div>
	</div>
</div>