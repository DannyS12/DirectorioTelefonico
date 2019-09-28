<h2 style="margin-top:0px">Grupos</h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('grupocontacto/create'),'Nuevo', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('grupocontacto/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('grupocontacto'); ?>" class="btn btn-default">Restaurar</a>
                            <?php
                        }
                    ?>
                  <button class="btn btn-primary" type="submit">Buscar</button>
                </span>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" style="margin-bottom: 10px">
    <tr>
        <th>No</th>
<th>NombreGrupo</th>
<th>Descripcion</th>
<th>Action</th>
    </tr><?php
    foreach ($grupocontacto_data as $grupocontacto)
    {
        ?>
        <tr>
    <td width="80px"><?php echo ++$start ?></td>
    <td><?php echo $grupocontacto->NombreGrupo ?></td>
    <td><?php echo $grupocontacto->Descripcion ?></td>
    <td style="text-align:center" width="200px">
        <?php
        echo anchor(site_url('grupocontacto/read/'.$grupocontacto->IdGrupo),'Detalles');
        echo ' | ';
        echo anchor(site_url('grupocontacto/update/'.$grupocontacto->IdGrupo),'Actualizar');
        echo ' | ';
        echo anchor(site_url('grupocontacto/delete/'.$grupocontacto->IdGrupo),'Eliminar','onclick="javasciprt: return confirm(\'Está seguro ?\')"');
        ?>
    </td>
</tr>
        <?php
    }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total de registros : <?php echo $total_rows ?></a>
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
