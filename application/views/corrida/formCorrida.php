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
<!--Descrição Corrida-->
            <div class="form-group">
                <label for="nomecorrida">Corrida</label>
                <input id="nomecorrida" class="form-control" type="text" name="nomecorrida"
                value="<?= set_value('nomecorrida', $registro['nomecorrida']); ?>"
                placeholder="Digite o nome da corrida" required>
            </div>
<!--Data -->
            <div class="form-group">
                <label for="data">Data</label>
                <input id="data" class="form-control" type="date" name="data"
                value="<?= set_value('data', $registro['data']); ?>"
                placeholder="DD/MM/AAAA" required>
            </div>
<!--Kilometragem -->
            <div class="form-group">
                <label for="kilometragem">Kilometragem</label>
                <input id="kilometragem" class="form-control" type="text" name="kilometragem"
                value="<?= set_value('kilometragem', $registro['kilometragem']); ?>"
                placeholder="1km ... 5 km... 10 km... 21 km... 42 km..." required>
            </div>
<!--Regiao-->
            <div class="form-group">
                <label for="regiao">Região</label>
                <input id="regiao" class="form-control" type="text" name="regiao"
                value="<?= set_value('regiao', $registro['regiao']); ?>"
                placeholder="Digite a região/cidade que irá ocorrer" required>
            </div>
<!--Informações Adicionais-->
            <div class="form-group">
                <label for="infoadicionais">Informações Adicionais</label>
                <input id="infoadicionais" class="form-control" type="text" name="infoadicionais"
                value="<?= set_value('infoadicionais', $registro['infoadicionais']); ?>"
                placeholder="Digite informações adicionais relevantes à corrida" required>
            </div>
            <button class="btn btn-success" type="submit">Cadastrar</button>
          </form>
        </div>
    </div>
</div>
