<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/addingFormTpl.php"; ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <!--  choose the client-->
  <div class="select-block">
    <label for="clientId">Клиент</label>
    <select name="clientid" class="browser-default custom-select select-field" id="clientId">
       <?php foreach ($pageData['allClients'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['fio'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--   choose the contract-->
  <div class="select-block">
    <label for="contractId">Контракт</label>
    <select name="contractid" class="browser-default custom-select select-field" id="contractId">
       <?php foreach ($pageData['allContracts'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--   choose the place-->
  <div class="select-block">
    <label for="placeId">Расположение</label>
    <select name="placeid" class="browser-default custom-select select-field" id="placeId">
       <?php foreach ($pageData['allPlaces'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--   choose the team-->
<?php if (count($pageData['allTeams']) != 0): ?>
  <div class="select-block">
    <label for="teamId">Бригада</label>
    <select name="teamid" class="browser-default custom-select select-field" id="teamId">
       <?php foreach ($pageData['allTeams'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>
<?php else: ?>
  <div class="message-in-form">
    <p>Нет свободных бригад</p>
  </div>
<?php endif; ?>

  <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>