<?php if (!isset($pageData)) $pageData = []; ?>
<?php $placeTypes = Menu::getPlaceTypes(); ?>

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
    <a class="navbar-brand" href="/"><?= $pageData['title'] ?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            Добавить
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-link" href="/client/addClient">Добавить клиента</a>
            <a class="nav-link" href="/contract/addContract">Добавить контракт</a>
            <a class="nav-link" href="/manager/addManager">Добавить менеджера</a>
            <a class="nav-link" href="/cart/addCart">Добавить вагон</a>
            <a class="nav-link" href="/crash/addCrash">Добавить неисправность</a>
            <a class="nav-link" href="/detailType/addDetailType">Добавить тип детали</a>
            <a class="nav-link" href="/detail/addDetail">Добавить деталь</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <!--Level 2-->
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            Просмотр
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="nav-link" href="/cart">Вагоны</a>
            <a class="nav-link" href="/contract">Договоры</a>
            <a class="nav-link" href="/crash">Неисправности</a>
            <a class="nav-link" href="/client">Клиенты</a>
            <a class="nav-link" href="/place">Расположения</a>

            <!--Level 3-->
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
              Свободные расположения
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
               <?php foreach ($placeTypes as $placeType): ?>
                 <a class="nav-link"
                    href="/place/allFree?placeType=<?= $placeType['id'] ?>"><?= $placeType['name'] ?></a>
               <?php endforeach; ?>
            </div>

          </div>
        </li>

      </ul>
    </div>
  </nav>


