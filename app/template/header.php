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
          <?php if (URL == "/"): ?>
            <nav class="main-menu">
             <ul>
               <li><a href="#sec2">О рейтинге</a></li>
               <li><a href="#sec4">Как принять участие</a></li>
               <li><a href="#sec5">Методология</a></li>
               <?php if (!empty($_SESSION['login'])): ?>
                 <li><a href="/quests">Анкета</a></li>
               <?php endif ?>
             </ul>
           </nav>
         <?php endif ?>
         <div class="nav_mobile"><i></i><i></i><i></i></div>
       </div>
       <div class="col-6 col-md-3 right">

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