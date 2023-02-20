<?php error_reporting(0); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="text-center text-secondary">
          Lista de tarefas
        </h3>
      </div>
    </div>
    <div class="row justify-content-end mb-3">
      <div class="col-auto">
        <a href="<?= URL ?>/tarefas/cadastrar" class="btn btn-secondary">
        <img src="<?=URL?>/img/plusWhite.svg"/>
        </a>
      </div>
    </div>
    <?= Sessao::mensagem('tarefa') ?>
    <div class="row">
      <div class="col">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Usuário</th>
              <th scope="col">Tarefa</th>
              <th scope="col">Data</th>
              <th scope="col">Prioridade</th>
              <th scope="col">Executada</th>
              <th scope="col">Operações</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dados['tarefas'] as $tarefa) : ?>
              <tr>
                <td><?= $tarefa->nome ?></td>
                <td><?= $tarefa->tarefa ?></td>
                <td><?= Checa::dataBr($tarefa->tarefaDataCadastro) ?></td>
                <td><?= $tarefa->prioridade ?></td>
                <td><?= $tarefa->estado ?></td>
                <td>
                  <div class="d-flex justify-content-end">
                    <a href="<?= URL.'/tarefas/ver/'.$tarefa->tarefaId ?>" class="btn btn-secondary me-2">
                      <img src="<?=URL?>/img/eyeWhite.svg"/>
                    </a>
                    <a href="<?= URL . '/tarefas/editar/' . $tarefa->tarefaId ?>" class="btn btn-secondary me-2">
                      <img src="<?=URL?>/img/editWhite.svg"/>
                    </a>
                    <a href="<?= URL.'/tarefas/deletar/'.$tarefa->tarefaId ?>" class="btn btn-secondary me-2">
                      <img src="<?=URL?>/img/trashX.svg"/>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
</main>
