<?php
    $this->layout = 'login';
    $this->title = 'Панель управления';
?>

<section>
	<div class="block-pass-login">
		<h2 class="admin-title">Панель управления - вход</h2>
		<?php if (isset($data['messageError'])) echo "<p class='message-error'>{$data['messageError']}</p>";?>
		<form method="post">
			<ul class="pass-login">
				<li><label for="login">Логин: </label><input type="text" name="input_login" id="login" required></li>
				<li><label for="password">Пароль:</label><input type="password" name="input_password" id="password" required></li>
			</ul>
			<p class="al_right"><input type="submit" name="submit" value="Войти"></p>
		</form>
	</div>
</section>