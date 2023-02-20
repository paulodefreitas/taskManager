<?php error_reporting(0); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center text-secondary">
          Visualizar tarefa
        </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-end">
        <a href="<?= URL ?>/tarefas" class="btn btn-secondary">
          <img src="<?=URL?>/img/arrow-left-circle-white.svg"/>
        </a>
      </div>
    </div>
    <form>
      <div class="row mb-3">
        <div class="col-sm">
          <label for="nome-tarefa" class="form-label">Nome da tarefa</label>
          <input type="text" id="nome-tarefa" class="form-control" value="<?= $dados['tarefa']->tarefa ?>" disabled>
        </div>
        <div class="col-sm">
          <label for="prioridade" class="form-label">Prioridade</label>
          <select id="prioridade" class="form-select" disabled>
            <option selected><?= $dados['tarefa']->prioridade ?></option>
          </select>
        </div>
        <div class="col-sm">
          <label for="estado" class="form-label">Estado</label>
          <select id="estado" class="form-select" disabled>
            <option selected><?= $dados['tarefa']->estado ?></option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12">
          <label for="descricao" class="form-label">Descrição</label>
          <textarea id="descricao" class="form-control" style="height: 80px" disabled><?= $dados['tarefa']->texto ?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-end">
          <?php if ($dados['tarefa']->usuario_id == $_SESSION['usuario_id']) : ?>
            <a href="<?= URL . '/tarefas/editar/' . $dados['tarefa']->id ?>"  class="btn btn-secondary">
              <img src="<?=URL?>/img/editWhite.svg"/>
            </a>
          <?php endif ?>
        </div>
      </div>
    </form>
  </div>
</main>
