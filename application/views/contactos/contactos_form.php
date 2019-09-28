        <h2 style="margin-top:0px">Contactos <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nombre <?php echo form_error('Nombre') ?></label>
            <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre" value="<?php echo $Nombre; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">TelefonoFijo <?php echo form_error('TelefonoFijo') ?></label>
            <input type="text" class="form-control" name="TelefonoFijo" id="TelefonoFijo" placeholder="TelefonoFijo" value="<?php echo $TelefonoFijo; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Celular <?php echo form_error('Celular') ?></label>
            <input type="text" class="form-control" name="Celular" id="Celular" placeholder="Celular" value="<?php echo $Celular; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Direccion <?php echo form_error('Direccion') ?></label>
            <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Direccion" value="<?php echo $Direccion; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('Email') ?></label>
            <input type="text" class="form-control" name="Email" id="Email" placeholder="Email" value="<?php echo $Email; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">FechaNacimiento <?php echo form_error('FechaNacimiento') ?></label>
            <input type="text" class="form-control" name="FechaNacimiento" id="FechaNacimiento" placeholder="FechaNacimiento" value="<?php echo $FechaNacimiento; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('Foto') ?></label>
            <input type="text" class="form-control" name="Foto" id="Foto" placeholder="Foto" value="<?php echo $Foto; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">IdGrupo <?php echo form_error('IdGrupo') ?></label>
            <input type="text" class="form-control" name="IdGrupo" id="IdGrupo" placeholder="IdGrupo" value="<?php echo $IdGrupo; ?>" />
        </div>
	    <input type="hidden" name="IdContacto" value="<?php echo $IdContacto; ?>" />
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
	    <a href="<?php echo site_url('contactos') ?>" class="btn btn-default">Cancel</a>
	</form>
