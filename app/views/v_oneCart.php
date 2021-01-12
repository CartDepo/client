<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/saveFormTpl.php" ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <!--   choose the place-->
  <div class="select-block">
    <label for="placeId">Расположение</label>
    <select name="placeId" class="browser-default custom-select select-field" id="placeId">
       <?php foreach ($pageData['allPlaces'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--   choose the team-->
<?php if (count($pageData['allTeams']) != 0): ?>
  <div class="select-block">
    <label for="teamId">Бригада</label>
    <select name="teamId" class="browser-default custom-select select-field" id="teamId">
       <?php foreach ($pageData['allTeams'] as $value): ?>
         <option <? if ($pageData['note']['id'] == $value['id']): ?>  selected <? endif; ?>
             value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>
<?php else: ?>
  <div class="message-in-form">
    <p>Нет свободных бригад</p>
  </div>
<?php endif; ?>

  <button type="submit" class="btn btn-primary">Изменить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>