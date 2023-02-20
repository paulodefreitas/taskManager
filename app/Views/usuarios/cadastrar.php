<?php error_reporting(0); ?>
<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container" style="max-width: 400px; margin-top: 75px; border-radius: 15px; border: 2px solid #f3f3f3">
    <div style="padding: 10px">
      <div class="row text-center mb-3">
        <div class="col">
          <h3 class="text-secondary">Cadastro de Usuário</h3>
        </div>
      </div>
      <form name="cadastrar" method="POST" action="<?= URL ?>/usuarios/cadastrar">
        <div class="row mb-3">
          <div class="col">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= $dados['nome'] ?>" class="form-control <?= $dados['nome_erro'] ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
              <?= $dados['nome_erro'] ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" value="<?= $dados['email'] ?>" class="form-control <?= $dados['email_erro'] ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
              <?= $dados['email_erro'] ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" id="senha" value="<?= $dados['senha'] ?>" class="form-control <?= $dados['senha_erro'] ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
              <?= $dados['senha_erro'] ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="confirma_senha" class="form-label">Confirme a Senha</label>
            <input type="password" name="confirma_senha" id="confirma_senha" value="<?= $dados['confirma_senha'] ?>" class="form-control <?= $dados['confirma_senha_erro'] ? 'is-invalid' : '' ?>">
            <div class="invalid-feedback">
              <?= $dados['confirma_senha_erro'] ?>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <input type="submit" value="Cadastrar" class="btn btn-secondary w-100">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <p class="text-center mb-0">Já tem uma conta? <a href="<?= URL ?>/usuarios/login">Faça Login</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
</main>
