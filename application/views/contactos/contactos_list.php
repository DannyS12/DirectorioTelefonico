<h2 style="margin-top:0px">Contactos</h2>
<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4">
        <?php echo anchor(site_url('contactos/create'),'Nuevo', 'class="btn btn-primary"'); ?>
    </div>
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
    <div class="col-md-1 text-right">
    </div>
    <div class="col-md-3 text-right">
        <form action="<?php echo site_url('contactos/index'); ?>" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                        if ($q <> '')
                        {
                            ?>
                            <a href="<?php echo site_url('contactos'); ?>" class="btn btn-default">Restaurar</a>
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
<th>Nombre</th>
<th>TelefonoFijo</th>
<th>Celular</th>
<th>Direccion</th>
<th>Email</th>
<th>FechaNacimiento</th>
<th>Foto</th>
<th>IdGrupo</th>
<th>Action</th>
    </tr><?php
    foreach ($contactos_data as $contactos)
    {
        ?>
        <tr>
    <td width="80px"><?php echo ++$start ?></td>
    <td><?php echo $contactos->Nombre ?></td>
    <td><?php echo $contactos->TelefonoFijo ?></td>
    <td><?php echo $contactos->Celular ?></td>
    <td><?php echo $contactos->Direccion ?></td>
    <td><?php echo $contactos->Email ?></td>
    <td><?php echo $contactos->FechaNacimiento ?></td>
    <td><?php echo $contactos->Foto ?></td>
    <td><?php echo $contactos->IdGrupo ?></td>
    <td style="text-align:center" width="200px">
        <?php
        echo anchor(site_url('contactos/read/'.$contactos->IdContacto),'Detalles');
        echo ' | ';
        echo anchor(site_url('contactos/update/'.$contactos->IdContacto),'Actualizar');
        echo ' | ';
        echo anchor(site_url('contactos/delete/'.$contactos->IdContacto),'Eliminar','onclick="javasciprt: return confirm(\'Está seguro ?\')"');
        ?>
    </td>
</tr>
        <?php
    }
    ?>
</table>
<div class="row">
    <div class="col-md-6">
        <a href="#" class="btn btn-primary">Total de Registros : <?php echo $total_rows ?></a>
</div>
    <div class="col-md-6 text-right">
        <?php echo $pagination ?>
    </div>
</div>
