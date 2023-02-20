<?php error_reporting(0); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container" style="max-width: 350px; margin-top: 75px; border-radius:15px; border:2px solid #f3f3f3">
    <div style="padding: 10px">
      <div class="row" style="text-align: center;margin-bottom: 10px;">
        <div class="col-sm">
          <img src="<?= URL ?>/img/user.svg" width="100px" height="100px">
        </div>
      </div>
      <?=Sessao::mensagem('usuario')?>
      <form name="login" method="POST" action="<?= URL ?>/usuarios/login">
        <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="text" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $dados['email_erro'] ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control  <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
          <div class="invalid-feedback">
            <?= $dados['senha_erro'] ?>
          </div>          
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-secondary">Entrar</button>
        </div>
      </form>
    </div>    
  </div>
</main>
