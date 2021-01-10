<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/addingFormTpl.php"; ?>
  <div class="select-block">
    <label for="clientId">clientId</label>
    <select name="clientId" class="browser-default custom-select select-field" id="clientId">
      <option selected value="md5">md5</option>
      <option value="sha256">sha256</option>
    </select>
  </div>

  <div class="select-block">
    <label for="clientId">managerId</label>
    <select name="managerId" class="browser-default custom-select select-field" id="managerId">
      <option selected value="md5">md5</option>
      <option value="sha256">sha256</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>