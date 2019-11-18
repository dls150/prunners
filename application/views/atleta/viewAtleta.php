<div class="row">
    <div class="col-md-12">
        <div class="box">
          <!-- <div class="box-header with-border">
              <h2 class="box-title"><?php //echo $titulo; ?></h2>
          </div> -->
          <div class="box-body">
            <a class="btn btn-primary" href="<?= site_url('atleta/cadastrar'); ?>">
              <i class="fa fa-fw fa-plus"></i>Adicionar
            </a>
            <table class="table table-hover table-striped">
              <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Equipe</th>
                <th>Categoria</th>
                <th>Documento</th>
                <th>Info Adicionais</th>
                <th class="col-md-1">Ações</th>
              </thead>
              <tbody>
                <?php foreach($lista as $item):?>
                  <tr>
                    <td><?= $item['idatleta'];?></td>
                    <td><?= $item['nome'];?></td>
                    <td><?= $item['equipe'];?></td>
                    <td><?= $item['categoria'];?></td>
                    <td><?= $item['documento'];?></td>
                    <td><?= $item['infoadicionais'];?></td>
                    <td>
                        <a class="btn btn-xs btn-info" href="<?= site_url('atleta/cadastrar/'.$item['idatleta']); ?>">
                            <i class="fa fa-fw fa-edit"></i>
                        </a>
                        <a class="btn btn-xs btn-danger" href="<?= site_url('atleta/remover/'.$item['idatleta']); ?>">
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
