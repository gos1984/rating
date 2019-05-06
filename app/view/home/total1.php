
<section id="results">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1>Рейтинг отделений<br/> лучевой диагностики <?=$data['year']?></h1>
        <p class="slogan">30 апреля 2019 года в соответствии с методологией рейтинга <br> опубликованы предварительные результаты автоматической программной проверки.</p>
          <p class="slogan">В списке отделения расположены в алфавитном порядке без ранжирования по баллам.<br> 
Финальные результаты рейтинга будут опубликованы 20 мая 2019 года после верификации и экспертизы результатов.</p>
          <div class="reset_block">
            <button class="reset">Сбросить</button>
          </div>
          <div class="over">
           <table>
            <thead>
              <tr class="title">
                <td>
                  <span>Название медицинского учреждения</span>
                  <span class="range">От А до Я</span>
                </td>
                <td class="select">
                  <span>Тип медицинского <br/>учреждения</span>
                  <select class="search" name="company" id="company" multiple="multiple">
                   <option value="reset">---сброс---</option>
                   <?php foreach ($data['company'] as $company): ?>
                    <option value="<?php echo $company; ?>"><?php echo $company; ?></option>
                  <?php endforeach ?>
                </select>
              </td>
              <td class="select">
                <span>Город</span>
                <select class="search" name="city" id="city" multiple="multiple">
                  <option value="reset">---сброс---</option>
                  <?php //foreach ($title1['city'] as $city): ?>
                  <option value="<?php //echo $city; ?>"><?php //echo $city; ?></option>
                  <?php //endforeach ?>
                </select>
              </td>
              <td class="select">
               <span>Набранные баллы</span>
             </td>
              <td class="select">
                <span>Модальность</span>

                <select class="search" name="modal" id="modal" multiple="multiple">
                  <option value="reset">---сброс---</option>
                  <?php foreach ($data['modal'] as $modal): ?>
                    <option value="<?php echo $modal; ?>"><?php echo $modal; ?></option>
                  <?php endforeach ?>
                </select>
              </td>
            </tr>
          </thead>
          <?php if ($data['items']): ?>
            <tbody>
              <?php foreach ($data['nominations'] as $n => $nomination): ?>
                <tr>
                  <td colspan="4"><h3><?php echo $nomination; ?></h3></td>
                  <?php foreach ($data['description'] as $key => $val): ?>
                    <?php if ($val['nomination'] == $n): ?>
                      <tr>
                        <td class="company left"><?php echo $val['company']; ?></td>
                        <td class="type_company"><?php echo $data['company'][$val['type_company']]; ?></td>
                        <td class="city"><?php echo trim(str_replace('СПб','Санкт-Петербург', preg_replace('/^(г\.|Г\.|\w{1,})/', '', $val['city']))); ?></td>
                        <td class="modal"><?php echo $val['ball']; ?></td>
                        <td class="modal"><?php echo $val['modal']; ?></td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                </tr>
              <?php endforeach ?>
            </tbody>
            <?php else: ?>
              <tbody>
                <?php foreach ($data['description'] as $key => $val): ?>
                  <tr>
                    <td class="company left"><?php echo $val['company']; ?></td>
                    <td class="type_company"><?php echo $data['company'][$val['type_company']]; ?></td>
                    <td class="city"><?php echo trim(str_replace('СПб','Санкт-Петербург', preg_replace('/^(г\.|Г\.|\w{1,})/', '', $val['city']))); ?></td>
                    <td class="modal"><?php echo $val['modal']; ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            <?php endif ?>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>