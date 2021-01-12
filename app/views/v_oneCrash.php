<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/saveFormTpl.php" ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <!--   choose the crash status-->
  <div class="select-block">
    <label for="crash-status-id">Состояние неисправности</label>
    <select name="crashstatusid" class="browser-default custom-select select-field" id="crash-status-id">
       <?php foreach ($pageData['allStatuses'] as $value): ?>
         <option <? if ($pageData['note']['crashstatusid'] == $value['id']): ?>  selected <? endif; ?>
             value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Изменить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>