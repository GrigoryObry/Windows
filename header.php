<?php
    session_start();
    
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/select.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/wndType.php");
    require_once ( $_SERVER['DOCUMENT_ROOT'] . "/lib/User.php");
    
    $user = new User($dbh);
    $SelectMenu = new SelectMenu($dbh);
    $wndMenu = new wndMenu($dbh);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>calculator</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/calc.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/menu_style.css">

        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
		<div class="formbar">
			<div class="formbar-content">
				<div class="Auth">
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
                    <ul class="dropdown-menu dropdown-menu-profile">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="glyphicon glyphicon-user icon-size"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?=$user->getName(); ?></strong></p>
                                        <p class="text-left small"><?=$user->getEmail(); ?></p>
                                        <p class="text-left">
                                            <a href="#" class="btn btn-primary btn-block btn-sm">Мой профиль</a>
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
				</div>				
			</div>
		</div>