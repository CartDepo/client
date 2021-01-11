<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/addingFormTpl.php"; ?>

<?php if (!isset($pageData)) $pageData = []; ?>

   <!--  choose the cart-->
   <div class="select-block">
      <label for="cartId">Номер вагона</label>
      <select name="cartid" class="browser-default custom-select select-field" id="cartId">
         <?php foreach ($pageData['allCarts'] as $value): ?>
            <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
         <? endforeach; ?>
      </select>
   </div>

   <!--   choose the crash type-->
   <div class="select-block">
      <label for="crash-type-id">Тип неисправности</label>
      <select name="typeid" class="browser-default custom-select select-field" id="crash-type-id">
         <?php foreach ($pageData['allTypes'] as $value): ?>
            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
         <? endforeach; ?>
      </select>
   </div>

   <!--   choose the crash status-->
   <div class="select-block">
      <label for="crash-status-id">Состояние неисправности</label>
      <select name="crashstatusid" class="browser-default custom-select select-field" id="crash-status-id">
         <?php foreach ($pageData['allStatuses'] as $value): ?>
            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
         <? endforeach; ?>
      </select>
   </div>

   <button type="submit" class="btn btn-primary">Добавить</button>
   </form>
   </div>
   </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>