<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('evento/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Atleta</th>
                <th>Corrida</th>
                <th>Kms</th>
                <th>Data</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['idevento'];?></td>
                    <td><?= $item['nome'];?></td>
                    <td><?= $item['nomecorrida'];?></td>
                    <td><?= $item['kilometragem'];?></td>
                    <td><?= $item['data'];?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('evento/cadastrar/'.$item['idevento']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url('evento/remover/'.$item['idevento']); ?>">
                            <i class="fa fa-fw fa-trash"></i>
                        </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
