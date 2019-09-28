<h2 style="margin-top:0px">Grupo <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">NombreGrupo <?php echo form_error('NombreGrupo') ?></label>
        <input type="text" class="form-control" name="NombreGrupo" id="NombreGrupo" placeholder="NombreGrupo" value="<?php echo $NombreGrupo; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Descripcion <?php echo form_error('Descripcion') ?></label>
        <input type="text" class="form-control" name="Descripcion" id="Descripcion" placeholder="Descripcion" value="<?php echo $Descripcion; ?>" />
    </div>
    <input type="hidden" name="IdGrupo" value="<?php echo $IdGrupo; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('grupocontacto') ?>" class="btn btn-default">Cancelar</a>
</form>
