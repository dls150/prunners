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
            <div class="form-group">
                <label for="equipe">equipe</label>
                <input id="equipe" class="form-control" type="text" name="equipe"
                value="<?= set_value('equipe', $registro['equipe']); ?>"
                placeholder="Digite informações sobre a equipe" required>
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
          </form>
        </div>
    </div>
</div>
