<!-- Модальное окно регистрации -->
<div class="modal fade" id="modal_registration" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Регистрация</h4>
      </div>
      <div class="modal-body">
		<div class="main-login main-center">
			<form class="form-horizontal" method="POST" action="/registration.php">
				
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Имя</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input pattern=".{2,}" required title="Имя должно содержать не менее 2 символов" type="text" class="form-control" name="name" placeholder="Введите Ваше имя"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input required type="email" class="form-control" name="email" placeholder="Введите Ваш Email"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label required">Пароль</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock aria-hidden="true"></i></span>
							<input pattern=".{6,}" required title="Пароль должен содержать не менее 6 символов" type="password" class="form-control" name="password" placeholder="Придумайте пароль"/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label for="repeat_password" class="cols-sm-2 control-label required">Подтверждение пароля</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock aria-hidden="true"></i></span>
							<input pattern=".{6,}" required title="Пароль должен содержать не менее 6 символов" type="password" class="form-control" name="repeat_password"  placeholder="Повторите пароль"/>
						</div>
					</div>
				</div>

				<div class="form-group ">
					<button type="submit" class="btn btn-danger btn-lg btn-block login-button">Зарегистрироваться</button>
				</div>
			</form>
			<div class="text-center">
				<a href="#">Уже зарегистрированы?</a>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
<!-- /Модальное окно регистрации -->