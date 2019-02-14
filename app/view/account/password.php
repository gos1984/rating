<section id="entry">
  <h3 class="center">Обновление пароля</h3>
  <form id="entry-form" class="modal_form" action="javascript:void(null);" onsubmit="verification('#entry-form','/password','/entry')">
    <div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
    <input type="hidden" name="id" required="" value="<?php echo $data['id'] ?>"/>
    <input type="hidden" name="email" required="" value="<?php echo $data['email'] ?>"/>
    <label for="password_forgot1">
      <input id="password_forgot1" type="password" name="password" required="" placeholder="Пароль" pattern="\w{6,}" title="Не менее 6 символов"/>
    </label>
    <label for="password_forgot2">
      <input id="password_forgot2" type="password" name="password-repeat" required="" placeholder="Повторите пароль" pattern="\w{6,}" title="Не менее 6 символов"/>
    </label>
    <button>Войти</button>
  </form>
</section>