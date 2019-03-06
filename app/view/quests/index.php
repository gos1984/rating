  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Анкета</h1>
          <p><a href="<?php echo PATH_TPL ?>img/instruction.docx">Инструкция по заполнению анкеты </a></p>
          <form id="quest" action="/results" method="POST">
            <div class="verif_user">
              <label for="company" class="h3">
                <span>Организация</span>
                <input id="company" type="text" name="company"/>
              </label>
              <label for="lastname" class="h3">
                <span>Фамилия</span>
                <input id="lastname" type="text" name="lastname"/>
              </label>
              <label for="name" class="h3">
                <span>Имя</span>
                <input id="name" type="text" name="name"/>
              </label>
              <label for="patron" class="h3">
                <span>Отчество</span>
                <input id="patron" type="text" name="patron"/>
              </label>
              <label for="position" class="h3">
                <span>Должность</span>
                <input id="position" type="text" name="position"/>
              </label>
              <label for="city" class="h3">
                <span>Город</span>
                <input id="city" type="text" name="city"/>
              </label>
              <label for="address" class="h3">
                <span>Адрес</span>
                <input id="address" type="text" name="address"/>
              </label>
              <div class="block quest">
                <span class="h3">Тип учреждения</span>
                <?php foreach ($data['company'] as $c => $company): ?>
                  <div class="block-child">
                    <label for="<?php echo "company$c"; ?>" class="check radio">
                      <i class="before"></i><i class="after"></i>
                      <input id="<?php echo "company$c"; ?>" type="radio" name="type_company" value="<?php echo $c; ?>" required="required"/>
                      <span><?php echo $company; ?></span>
                    </label>
                  </div>
                <?php endforeach ?>
              </div>
              <div class="block quest"><span class="h3">Вид оказываемого лечения</span>
                <?php foreach ($data['treatment'] as $t => $treatment): ?>
                 <div class="block-child">
                  <label for="<?php echo "treatment$t"; ?>" class="check radio">
                    <i class="before"></i><i class="after"></i>
                    <input id="<?php echo "treatment$t"; ?>" type="radio" name="treatment" value="<?php echo $t; ?>" />
                    <span><?php echo $treatment; ?></span>
                  </label>
                </div>
              <?php endforeach ?>
            </div>
            <div class="block modal_show quest"><span class="h3">Выберите модальности, которые имеются в отделении</span>
                <?php foreach ($data['modal'] as $m => $modal): ?>
                 <div class="block-child">
                  <label for="<?php echo "modal$m"; ?>" class="check checkbox">
                    <i class="before"></i><i class="after"></i>
                    <input id="<?php echo "modal$m"; ?>" type="checkbox" name="modal[]" value="<?php echo $m; ?>" />
                    <span><?php echo $modal; ?></span>
                  </label>
                </div>
              <?php endforeach ?>
            </div>
          </div>
          <div class="steps">
            <div class="questions">
            </div>
            <input type="hidden" name="user" value="<?php echo $_SESSION['id']; ?>">
            <input id="result" type="hidden" name="result"/>
          </div>

          <p class="center">Обращаем ваше внимание, что после отправки анкеты дальнейшее ее редактирование будет недоступно. Пожалуйста, проверьте правильность введенных данных</p>
          <label for="conf1" class="confidential check checkbox">
            <i class="before"></i><i class="after"></i>
            <input id="conf1" type="checkbox" name="conf" required="">
            <span>Подтверждаю достоверность введенных данных</span>
          </label>
          <button class="green">Отправить</button>
        </form>
      </div>
    </div>
  </div>
</section>
<section id="graph">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="graph"></div>
      </div>
    </div>
  </div>
</section>