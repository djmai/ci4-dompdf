<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="row content">
    <h1><?= $content; ?></h1>
</div>
<table class="table table-light table-striped">
    <tbody>
	    <tr><th width="15%">User</th><td>: 	<?php echo $data['user']; ?></td></tr>
	    <tr><th width="15%">Email</th><td>: 	<?php echo $data['email']; ?></td></tr>
	    <tr><th width="15%">Password</th><td>: 	<?php echo $data['password']; ?></td></tr>
	    <tr><th width="15%">Idrol</th><td>: 	<?php echo $data['idrol']; ?></td></tr>
	    <tr><th width="15%">Creado At</th><td>: 	<?php echo $data['creado_at']; ?></td></tr>
	    <tr><th width="15%">Creado By</th><td>: 	<?php echo $data['creado_by']; ?></td></tr>
	    <tr><th width="15%">Actualizado At</th><td>: 	<?php echo $data['actualizado_at']; ?></td></tr>
	    <tr><th width="15%">Actualizado By</th><td>: 	<?php echo $data['actualizado_by']; ?></td></tr>
	    <tr><th width="15%">Borrado At</th><td>: 	<?php echo $data['borrado_at']; ?></td></tr>
	    <tr><th width="15%">Borrado By</th><td>: 	<?php echo $data['borrado_by']; ?></td></tr>
</tbody>
</table>
    <div class="d-flex p-2 bd-highlight">
        <a class="btn btn-sm btn-danger" href="<?= \base_url('user') ?>">back</a>
    </div>
<?= $this->endSection(); ?>