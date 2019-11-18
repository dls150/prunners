<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('corrida/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Corrida</th>
                <th>Data</th>
                <th>Kms</th>
                <th>Região</th>
                <th>Informações Adicionais</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['idcorrida'];?></td>
                    <td><?= $item['nomecorrida'];?></td>
                    <td><?= $item['data'];?></td>
                    <td><?= $item['kilometragem'];?></td>
                    <td><?= $item['regiao'];?></td>
                    <td><?= $item['infoadicionais'];?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('corrida/cadastrar/'.$item['idcorrida']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url('corrida/remover/'.$item['idcorrida']); ?>">
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
