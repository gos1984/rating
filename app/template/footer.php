<footer id="footer">
</footer>
<div class="popup">
	<form id="account" class="modal_form" action="javascript:void(null);" onsubmit="verification('#account','/auth','/quests')">
		<div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
		<label for="email1">
			<input id="email1" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
		</label>
		<label for="password1">
			<input id="password1" type="password" name="password" required="" placeholder="Пароль"/>
		</label>
		<button>Войти</button>
		<div class="result"></div>
		<a href="#registr" class="block fancybox">Зарегистрироваться</a>
		<a href="#forgot" class="block fancybox">Восстановить пароль</a>
	</form>
	<form id="registr" class="modal_form" action="javascript:void(null);" onsubmit="verification('#registr','/registr')">
		<div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
		<label for="email2">
			<input id="email2" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
		</label>
		<label for="password3">
			<input id="password3" type="password" name="password" required="" placeholder="Пароль" pattern="\w{6,}" title="Не менее 6 символов"/>
		</label>
		<label for="password4">
			<input id="password4" type="password" name="password-repeat" required="" placeholder="Повторите пароль" pattern="\w{6,}" title="Не менее 6 символов"/>
		</label>
		<button>Зарегистрироваться</button>
		<div class="result"></div>
		<a href="#account" class="fancybox block">Авторизация</a>
		<a href="#forgot" class="fancybox block">Восстановить пароль</a>
	</form>
	<form id="forgot" class="modal_form" action="javascript:void(null);" onsubmit="verification('#forgot','/forgot')">
		<div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
		<label for="email3">
			<input id="email3" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
		</label>
		<button>Восстановить</button>
		<a href="#account" class="fancybox block">Войти в аккаунт</a>
		<a href="#registr" class="fancybox block">Зарегистрироваться</a>
	</form>
</div>
<script src="<?php echo PATH_TPL; ?>/js/main.js"></script>
</body>
</html>