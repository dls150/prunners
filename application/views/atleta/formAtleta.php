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
<!-- Nome -->
            <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" class="form-control" type="text" name="nome"
                value="<?= set_value('nome', $registro['nome']); ?>"
                placeholder="Digite seu nome" required>
            </div>
<!-- Equipe -->
          <div class="form-group">
            <label for="idequipe">Equipe</label>
            <select class="form-control" name="idequipe" required>
              <option value="">Selecione um item da lista</option>
              <?php foreach ($listaEquipes as $e): ?>
                  <option value="<?= $e['idequipe']; ?>" <?php if(isset($registro) && $e['idequipe']==$registro['idequipe']) echo "selected";?>>
                      <?= $e['equipe']; ?>
                  </option>
              <?php endforeach; ?>
            </select>
          </div>
<!-- Categoria -->
          <div class="form-group">
            <label for="idcategoria">Categoria</label>
            <select class="form-control" name="idcategoria" required>
              <option value="">Selecione um item da lista</option>
              <?php foreach ($listaCategorias as $e): ?>
                  <option value="<?= $e['idcategoria']; ?>" <?php if(isset($registro) && $e['idcategoria']==$registro['idcategoria']) echo "selected";?>>
                      <?= $e['categoria']; ?>
                  </option>
              <?php endforeach; ?>
            </select>
          </div>
<!-- Documento -->
            <div class="form-group">
                <label for="documento">Documento</label>
                <input id="documento" class="form-control" type="text" name="documento"
                value="<?= set_value('documento', $registro['documento']); ?>"
                placeholder="CPF ou RG" required>
            </div>
<!-- Info Adicionais -->
            <div class="form-group">
                <label for="infoadicionais">Informações Adicionais</label>
                <input id="infoadicionais" class="form-control" type="text" name="infoadicionais"
                value="<?= set_value('infoadicionais', $registro['infoadicionais']); ?>"
                placeholder="Descreva demais informações relevantes sobre o/a atleta." required>
            </div>

            <button class="btn btn-success" type="submit">Cadastrar</button>
          </form>
        </div>
    </div>
</div>
