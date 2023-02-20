<?php error_reporting(0); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3 class="text-center text-secondary">
          Deletar tarefa
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
    <form action="<?= URL ?>/tarefas/deletar/<?= $dados['tarefa']->id ?>" method="POST">
      <div class="row mb-3">
        <div class="col-sm">
          <label for="nome-tarefa" class="form-label">Nome da tarefa</label>
          <input type="text" id="nome-tarefa" class="form-control" value="<?= $dados['tarefa']->tarefa ?>" disabled>
        </div>
        <div class="col-sm">
          <label for="prioridade" class="form-label">Prioridade</label>
          <input type="text" id="prioridade" class="form-control" value="<?= $dados['tarefa']->prioridade ?>" disabled>
        </div>
        <div class="col-sm">
          <label for="estado" class="form-label">Estado</label>
          <input type="text" id="estado" class="form-control" value="<?= $dados['tarefa']->estado ?>" disabled>
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
          <button type="submit" class="btn btn-secondary">
            <img src="<?=URL?>/img/trashX.svg"/>
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
