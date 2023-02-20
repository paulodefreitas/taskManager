<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?= URL ?>">Gerenciador de Tarefas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= URL ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?= URL ?>/paginas/sobre">Sobre</a>
          </li>
        </ul>

                <?php if (isset($_SESSION["usuario_id"])): ?>
                    <span class="navbar-text">
                    <?= $_SESSION["usuario_nome"] ?>
                    </span>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>/usuarios/sair"><img src="<?= URL ?>/public/img/log-out-white.svg"/></a>
                        </li>
                    </ul> 
                <?php else: ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>/usuarios/cadastrar"><img src="<?= URL ?>/public/img/userWhite.svg"/> Sign Up </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>/usuarios/login"><img src="<?= URL ?>/public/img/log-in-white.svg"/> Login </a>
                        </li>
                    </ul>
                <?php endif; ?>



            </div>
        </nav>
    </div>
</header>