<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/saveFormTpl.php" ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <!--   choose the place-->
  <div class="select-block">
  <label for="clientId">Клиент</label>
    <select name="clientid" class="browser-default custom-select select-field" id="clientId">
       <?php foreach ($pageData['allClients'] as $value): ?>
         <option value="<?=$value['id']?>"><?=$value['fio']?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--   choose the team-->
<?php if (count($pageData['allTeams']) != 0): ?>
  <div class="select-block">
    <label for="teamId">Бригада</label>
    <label for="managerId">Менеджер</label>
    <select name="managerid" class="browser-default custom-select select-field" id="managerId">
       <?php foreach ($pageData['allManagers'] as $value): ?>
         <option value="<?=$value['id']?>"><?=$value['fio']?></option>
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
  </div>

  <h1 class="cart-crasher-title">Связанные вагоны</h1>
  <div class="cart-table-for-crashes">
    <div class="wide-container">
      <main class="content">
        <div class="info">
          <table class="table">
            <thead>
            <tr>
               <?php if ($pageData['tableTitlesName']): ?>
                  <? foreach ($pageData['tableTitlesName'] as $title): ?>
                   <th scope="col"><?= $title ?></th>
                  <? endforeach; ?>
               <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php if ($pageData['notes']): ?>
               <? foreach ($pageData['notes'] as $note): ?>
                  <? foreach ($pageData['fieldTitles'] as $title): ?>
                     <?php if ($title == 'number'): ?>
                        <td><a href="/cart?id=<?= (string)$note['id'] ?>"><?= $note[$title] ?></a></td>
                     <?php else: ?>
                        <td><?= $note[$title] ?></td>
                     <?php endif; ?>
                  <? endforeach; ?>
                </tr>
               <? endforeach; ?>
            <?php endif; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>