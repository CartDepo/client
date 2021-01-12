<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

  <div class="container">
    <div class="row authorization-row">
      <div class="col-md-4 offset-md-4 ">
        <div class="authorization-image-block">
          <img src="<?= PROJECT_FOLDER_PATH ?>images/Authorization.png" class="authorization-image" alt="">
        </div>
        <form>
          <div class="form-group">
            <label for="exampleInputEmail1">Логин</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Введите логин">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
          </div>
          <button type="submit" class="btn btn-primary">Войти</button>
        </form>
      </div>
    </div>
  </div>


<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>