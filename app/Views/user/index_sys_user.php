
<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <h1><?= $content; ?></h1>
</div>
<div class="row">
<div class="d-flex p-2 bd-highlight">
    <a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-primary">CREATE</a>
</div>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-info" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>   
<?php endif; ?>

<div class="row">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>No</th>
		<th>User</th>
		<th>Email</th>
		<th>Password</th>
		<th>Idrol</th>
		<th>Creado At</th>
		<th>Creado By</th>
		<th>Actualizado At</th>
		<th>Actualizado By</th>
		<th>Borrado At</th>
		<th>Borrado By</th>
		<th>Action</th>
        </tr>
        <tr>
        </thead><?php foreach ($data as $value): ?>
        <tr>
			<td width="80px"><?php $start=0; echo ++$start ?></td>
			<td><?= $value['user'] ?></td>
			<td><?= $value['email'] ?></td>
			<td><?= $value['password'] ?></td>
			<td><?= $value['idrol'] ?></td>
			<td><?= $value['creado_at'] ?></td>
			<td><?= $value['creado_by'] ?></td>
			<td><?= $value['actualizado_at'] ?></td>
			<td><?= $value['actualizado_by'] ?></td>
			<td><?= $value['borrado_at'] ?></td>
			<td><?= $value['borrado_by'] ?></td><td>
            <span class="float-right">
                <a type="button" class="btn btn-sm btn-primary" href="<?= base_url('user/read/'.$value['id'] )?>">READ</a>
                <a type="button" class="btn btn-sm btn-warning" href="<?= base_url('user/update/'.$value['id'] )?>">EDITE</a>
                <a type="button" class="btn btn-sm btn-danger" href="<?= base_url('user/delete/'.$value['id'] )?>" onclick="javascript: return confirm('Delete \nAre You Sure ?')">DELETE</a>
            </span>
            </td>
            <?php  endforeach; ?>
        </tbody>
    </table>
    <!-- pagination -->
    <?php echo $pager->links('paging', 'ligatcode_pagination') ?>
</div>
<?= $this->endSection(); ?>