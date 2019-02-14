<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="<?php echo PATH_TPL ?>/style.css"/>
  <title>topld 2.0</title>
  <meta name="description" content="">
  <meta property="og:type" content="website" />
  <meta property="og:url" content= "" />
  <meta property="og:title" content=""/>
  <meta property="og:description" content="" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image" content="" />
</head>
<body>
  <header id="header" class="<?php echo !empty($_SESSION['admin']) ? "admin" : "" ?>">
    <div class="container-fluid">
      <div class="row justify-content-between align-items-center">
        <div class="col-6 col-md-3">
          <div class="logo"><a href="/"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""></a></div>
        </div>
        <div class="col-12 col-md-6">
         <?php if (!empty($_SESSION['admin'])): ?>
           <nav class="main-menu">
            <ul>
              <li><a href="/administrator">Вопросы</a></li>
              <li><a href="/administrator/answers">Ответы</a></li>
              <li><a href="/administrator/category">Категории</a></li>
              <li><a href="/administrator/modal">Модальности</a></li>
              <li><a href="/administrator/users">Пользователи</a></li>
            </ul>
          </nav>
        <?php endif ?>
        <div class="nav_mobile"><i></i><i></i><i></i></div>
      </div>
      <div class="col-6 col-md-3 right">

        <div class="account">
          <?php if (!empty($_SESSION['admin'])): ?>
            <a href="/exit">Выйти</a>
          <?php endif ?>
        </div>

      </div>
    </div>
  </div>
</header>