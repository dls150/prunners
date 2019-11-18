<div class="row col-md-12">
    <div class="box">
        <div class="box-body">
          <?php
              //verificando se o form_validation retornou erros
              if(validation_errors() != null){ ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                    <?php echo validation_errors(); //mostra os erros?>
                </div>
          <?php } ?>

          <?php echo form_open($acao); ?>
<!-- Atleta -->
            <div class="form-group">
              <label for="idatleta">Atleta</label>
              <select class="form-control" name="idatleta" required>
                <option value="">Selecione um atleta para o evento</option>
                <?php foreach ($listaAtletas as $e): ?>
                    <option value="<?= $e['idatleta']; ?>" <?php if(isset($registro) && $e['idatleta']==$registro['idatleta']) echo "selected";?>>
                        <?= $e['idatleta']; ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>
<!-- Corrida -->
            <div class="form-group">
              <label for="idcorrida">Corrida</label>
              <select class="form-control" name="idcorrida" required>
                <option value="">Selecione uma categoria da lista</option>
                <?php foreach ($listaCorridas as $e): ?>
                    <option value="<?= $e['idcorrida']; ?>" <?php if(isset($registro) && $e['idcorrida']==$registro['idcorrida']) echo "selected";?>>
                        <?= $e['nomecorrida']; ?>
                    </option>
                <?php endforeach; ?>
              </select>
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
          </form>
        </div>
    </div>
</div>
