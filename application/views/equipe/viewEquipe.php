<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('equipe/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Equipe</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['idequipe'];?></td>
                    <td><?= $item['equipe'];?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('equipe/cadastrar/'.$item['idequipe']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url('equipe/remover/'.$item['idequipe']); ?>">
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
