<?php error_reporting(0); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">

    <div class="row">
      <div class="col-sm">
        <h3 class="text-center text-secondary">Registrar tarefa</h3>
      </div>
    </div>

    <div class="row justify-content-end">
      <div class="col-sm-auto">
        <a href="<?= URL ?>/tarefas" class="btn btn-secondary" type="button">
          <img src="<?= URL ?>/img/arrow-left-circle-white.svg" alt="Voltar">
        </a>
      </div>
    </div>

    <form name="cadastrar" method="POST" action="<?= URL ?>/tarefas/cadastrar">
      
      <div class="row mb-3">
        <div class="col-sm">
          <label for="tarefa" class="form-label">Nome da tarefa</label>
          <input type="text" name="tarefa" id="tarefa" value="<?= $dados['tarefa'] ?>" class="form-control <?= $dados['tarefa_erro'] ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback"><?= $dados['tarefa_erro'] ?></div>
        </div>
        <div class="col-sm">
          <label for="prioridade" class="form-label">Prioridade:</label>
          <select class="form-select <?= $dados['prioridade_erro'] ? 'is-invalid' : '' ?>" id="prioridade" name="prioridade">
            <option value="Alta" <?= $dados['prioridade'] == 'Alta' ? 'selected' : '' ?>selected>Alta</option>
            <option value="Media" <?= $dados['prioridade'] == 'Media' ? 'selected' : '' ?>>Média</option>
            <option value="Baixa" <?= $dados['prioridade'] == 'Baixa' ? 'selected' : '' ?>>Baixa</option>
          </select>
          <div class="invalid-feedback"><?= $dados['prioridade_erro'] ?></div>
        </div>
        <div class="col-sm">
          <label for="estado" class="form-label">Estado:</label>
          <select class="form-select <?= $dados['estado_erro'] ? 'is-invalid' : '' ?>" id="estado" name="estado">
            <option value="Executada" <?= $dados['estado'] == 'Executada' ? 'selected' : '' ?> selected>Executada</option>
            <option value="Em andamento" <?= $dados['estado'] == 'Em andamento' ? 'selected' : '' ?>>Em andamento</option>
            <option value="Cancelada" <?= $dados['estado'] == 'Cancelada' ? 'selected' : '' ?>>Cancelada</option>
          </select>
          <div class="invalid-feedback"><?= $dados['estado_erro'] ?></div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm">
          <label for="texto" class="form-label">Descrição</label>
          <textarea name="texto" id="texto" class="form-control <?= $dados['texto_erro'] ? 'is-invalid' : '' ?>" rows="5"><?= $dados['texto'] ?></textarea>
          <div class="invalid-feedback"><?= $dados['texto_erro'] ?></div>
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-sm-auto">
          <input type="image" class="btn btn-secondary" src="<?= URL ?>/img/saveWhite.svg" title="Cadastrar Tarefa"/>
        </div>
      </div>
    </form>
  </div>
</main>
