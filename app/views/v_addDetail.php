<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/addingFormTpl.php"; ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <!--  choose the detail type id-->
  <div class="select-block">
    <label for="detailId">detail type</label>
    <select name="detailTypeId" class="browser-default custom-select select-field" id="detailId">
       <?php foreach ($pageData['allDetailTypes'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--  choose the cart-->
  <div class="select-block">
    <label for="cartId">cart</label>
    <select name="cartId" class="browser-default custom-select select-field" id="cartId">
       <?php foreach ($pageData['allCarts'] as $value): ?>
         <option value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Добавить</button>
  </form>
  </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>