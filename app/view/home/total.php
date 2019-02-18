<section id="results">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Список лучших отделений<br/> лучевой диагностики по результатам <br/>Всероссийского рейтинга-2018</h1>
        <p class="slogan">В соответствии с методологией в рейтинг включены все отделения,<br/>
результаты анкетирования которых оказались выше 27,3 баллов (среднего значения по результатам анкетирования всех участников).</p>
        <p class="slogan">В списке отделения расположены в алфавитном порядке без ранжирования по баллам.</p>
  <div class="reset_block">
    <button class="reset">Сбросить</button>
  </div>
  <div class="over">
     <div class="table">
    <div class="table-row title">
      <div class="table-cell">
        <span>Название медицинского учреждения</span>
        <span class="range">От А до Я</span>
      </div>
      <div class="table-cell select">
        <span>Тип медицинского <br/>учреждения</span>
        <select class="search" name="company" id="company" multiple="multiple">
           <option value="reset">---сброс---</option>
          <?php foreach ($data['company'] as $company): ?>
            <option value="<?php echo $company; ?>"><?php echo $company; ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="table-cell select">
        <span>Город</span>
        <select class="search" name="city" id="city" multiple="multiple">
          <option value="reset">---сброс---</option>
          <?php //foreach ($title1['city'] as $city): ?>
            <option value="<?php //echo $city; ?>"><?php echo $city; ?></option>
          <?php //endforeach ?>
        </select>
      </div>
      <div class="table-cell select">
        <span>Модальность</span>

        <select class="search" name="modal" id="modal" multiple="multiple">
          <option value="reset">---сброс---</option>
          <?php foreach ($data['modal'] as $modal): ?>
            <option value="<?php echo $modal; ?>"><?php echo $modal; ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="table-body">
      <?php foreach ($data['description'] as $key => $val): ?>
        <div class="table-row">
          <div class="table-cell company left"><?php echo $val['company']; ?></div>
          <div class="table-cell type_company"><?php echo $data['company'][$val['type_company']]; ?></div>
          <div class="table-cell city"><?php echo trim(str_replace('СПб','Санкт-Петербург', preg_replace('/^(г\.|Г\.|\w{1,})/', '', $val['city']))); ?></div>
          <div class="table-cell modal"><?php echo $val['modal']; ?> </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  </div>
 
      </div>
    </div>
  </div>
</section>