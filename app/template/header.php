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
  <header id="header" <?php echo !empty($data['header']) ? "class=\"{$data['header']}\"" : "" ?>>
    <div class="container-fluid">
      <div class="row justify-content-between align-items-center">
        <div class="col-6 col-md-2">
          <div class="logo"><a href="/"><img src="<?php echo PATH_TPL ?>/img/logo.png" alt=""></a></div>
        </div>
        <div class="col-12 col-md-8">
            <nav class="main-menu">
             <ul>
               <li><a href="<?php echo (URL == "/") ? '#sec2' : '/#sec2' ?>">О рейтинге</a></li>
               <li><a href="<?php echo (URL == "/") ? '#sec4' : '/#sec4' ?>">Как принять участие</a></li>
               <li><a href="<?php echo (URL == "/") ? '#sec5' : '/#sec5' ?>">Методология</a></li>
               <li><a href="/total/2018">Итоги 2018</a></li>
               <?php if (!empty($_SESSION['login'])): ?>
                 <li><a href="/quests">Анкета</a></li>
               <?php endif ?>
             </ul>
           </nav>
         <div class="nav_mobile"><i></i><i></i><i></i></div>
       </div>
       <div class="col-6 col-md-2 right">

        <div class="account">
          <?php if (!empty($_SESSION['login'])): ?>
            <a href="/exit">Выйти</a>
            <?php else: ?>
              <a href="#account" class="fancybox">Войти</a>
            <?php endif ?>
          </div>

        </div>
      </div>
    </div>
  </header>