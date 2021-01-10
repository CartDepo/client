<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/addingFormTpl.php"; ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <div class="select-block">
    <label for="clientId">clientid</label>
    <select name="clientid" class="browser-default custom-select select-field" id="clientId">
       <?php foreach ($pageData['allClients'] as $value): ?>
         <option value="<?=$value['id']?>"><?=$value['fio']?></option>
       <? endforeach; ?>
    </select>
  </div>

  <div class="select-block">
    <label for="managerId">managerid</label>
    <select name="managerid" class="browser-default custom-select select-field" id="managerId">
       <?php foreach ($pageData['allManagers'] as $value): ?>
         <option value="<?=$value['id']?>"><?=$value['fio']?></option>
       <? endforeach; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>