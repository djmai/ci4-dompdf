<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="row content">
    <h1><?= $content; ?></h1>
</div>
<h4 style="margin-top:0px">Sys_user <?php echo $content; ?></h4>
<form action="<?= base_url($action) ?>" method="post">
	 <div class="form-group">
                        <label for="varchar">User
                            <?php echo ('user') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="user" id="user"
                            placeholder="User" value="<?php echo $data['user']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="varchar">Email
                            <?php echo ('email') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="email" id="email"
                            placeholder="Email" value="<?php echo $data['email']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="varchar">Password
                            <?php echo ('password') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="password" id="password"
                            placeholder="Password" value="<?php echo $data['password']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="int">Idrol
                            <?php echo ('idrol') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="idrol" id="idrol"
                            placeholder="Idrol" value="<?php echo $data['idrol']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="timestamp">Creado At
                            <?php echo ('creado_at') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="creado_at" id="creado_at"
                            placeholder="Creado At" value="<?php echo $data['creado_at']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="int">Creado By
                            <?php echo ('creado_by') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="creado_by" id="creado_by"
                            placeholder="Creado By" value="<?php echo $data['creado_by']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="timestamp">Actualizado At
                            <?php echo ('actualizado_at') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="actualizado_at" id="actualizado_at"
                            placeholder="Actualizado At" value="<?php echo $data['actualizado_at']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="int">Actualizado By
                            <?php echo ('actualizado_by') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="actualizado_by" id="actualizado_by"
                            placeholder="Actualizado By" value="<?php echo $data['actualizado_by']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="timestamp">Borrado At
                            <?php echo ('borrado_at') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="borrado_at" id="borrado_at"
                            placeholder="Borrado At" value="<?php echo $data['borrado_at']; ?>" />
                    </div>
	 <div class="form-group">
                        <label for="int">Borrado By
                            <?php echo ('borrado_by') ?></label>
                        <input type="text" class="form-control" autocomplete="off" name="borrado_by" id="borrado_by"
                            placeholder="Borrado By" value="<?php echo $data['borrado_by']; ?>" />
                    </div>
	 <input id="id" class="form-control" type="text" name="id" style="display:none;" value="<?= $data['id'] ?>"> 
	
    <div class="d-flex p-2 bd-highlight">
    <div class="form-group">
        <a class="btn btn-sm btn-danger" href="<?= base_url('user') ?>">Cencel</a>
        <button class="btn btn-sm btn-primary" type="submit">SAVE</button>
    </div>
    </div>
</form>



<?= $this->endSection(); ?>