<?php if (!isset($pageData)) $pageData = []; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= PROJECT_FOLDER_PATH ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= PROJECT_FOLDER_PATH ?>css/style.css">
  <title><?= $pageData['title'] ?></title>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Главная</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="/client/addClient">Добавить клиента</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/contract/addContract">Добавить контракт</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul>
    </div>
  </nav>


