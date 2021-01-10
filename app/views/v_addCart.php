<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/addingFormTpl.php"; ?>

<?php if (!isset($pageData)) $pageData = []; ?>

<!--  choose the client-->
  <div class="select-block">
    <label for="clientId">client</label>
    <select name="clientid" class="browser-default custom-select select-field" id="clientId">
       <?php foreach ($pageData['allClients'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['fio'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

<!--   choose the contract-->
  <div class="select-block">
    <label for="managerId">contract</label>
    <select name="contractid" class="browser-default custom-select select-field" id="managerId">
       <?php foreach ($pageData['allContracts'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

<!--   choose the place-->
  <div class="select-block">
    <label for="managerId">place</label>
    <select name="placeid" class="browser-default custom-select select-field" id="managerId">
       <?php foreach ($pageData['allPlaces'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

<!--   choose the team-->
  <div class="select-block">
    <label for="managerId">team</label>
    <select name="teamid" class="browser-default custom-select select-field" id="managerId">
       <?php foreach ($pageData['allTeams'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>