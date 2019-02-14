<section id="entry">
  <h3 class="center"><?php echo $data; ?></h3>
  <form id="entry-form" class="modal_form" action="javascript:void(null);" onsubmit="verification('#entry-form','/auth','/quests')">
    <div class="logo"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""/></div>
    <label for="email_entry">
      <input id="email_entry" type="email" name="email" required="" placeholder="Адрес электронной почты"/>
    </label>
    <label for="password_entry">
      <input id="password_entry" type="password" name="password" required="" placeholder="Пароль"/>
    </label>
    <button>Войти</button>
  </form>
</section>