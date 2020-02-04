	<?php include_once( __DIR__ . '/modal/modal_registration.php' ); ?>
	<?php include_once( __DIR__ . '/modal/modal_add_task.php' ); ?>
    <nav class="navbar">
      <div>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h4 class="navbar-brand" href="#">Windows Calculator</h4>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php $treeMenu->getMenuHtml(); ?>
            </ul>
		
			<?php if (!$user->isLoggedin()) { ?>
			<form class="navbar-form navbar-right" method="POST" action="/login.php">
				<div class="form-group">
				  <input type="text" name="email" placeholder="Введите email" class="form-control">
				</div>
				<div class="form-group">
				  <input type="password" name="password" placeholder="Введите пароль" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Войти</button>
			</form>
			<?php } else { ?>
			<ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Добро пожаловать: <span class="glyphicon glyphicon-user"></span> 
                        <strong><?=$user->getName(); ?></strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left dropdown-menu-profile">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="text-left"><strong><?=$user->getName(); ?></strong></p>
                                        <p class="text-left small"><?=$user->getEmail(); ?></p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-sm btn-profile">Мой профиль</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="/logout.php" class="btn btn-danger btn-block">Выход</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
			<?php } ?>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>