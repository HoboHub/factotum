<div class="overlay">
	<div class="popup enter-block">
		<h2 class="popup__header">Войти</h2>
		<div class="create-acc">
			<a href="register.php" class="popup__link">Создать аккаунт</a>
		</div>
		<div class="popup__content">
			<form name="sign_in" action="php/enter_validation/auth.php" method="post">
				<label class="popup__label">Адрес электронной почты</label>
				<input type="text" class="popup__form form-control" name="email" id="email">

				<div class="popup__pass-block">
					<label class="popup__label">Пароль</label>
					<input type="password" class="popup__form form-control" name="pass" id="pass">
					<a class="popup__eye eye_closed" id="pass-eye"><i class="fas fa-eye-slash"></i></a>
					<br>
					<div class="forget-pass"> 
						<a href="../resset_pass.php" class="popup__link">Сброс пароля</a>
					</div>
				</div>
				<button class="popup__enter btn btn__enter disabled" type="submit">Вход</button>
			</form>
		</div>
		<div class="popup__close btn btn__close" id="close-btn"><i class="fas fa-times"></i></div>
	</div>
</div>