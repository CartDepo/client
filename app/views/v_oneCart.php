<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php include VIEW_PATH . "baseTpl/saveFormTpl.php" ?>

<?php if (!isset($pageData)) $pageData = []; ?>

  <!--   choose the place-->
  <div class="select-block">
    <label for="placeId">Расположение</label>
    <select name="placeId" class="browser-default custom-select select-field" id="placeId">
       <?php foreach ($pageData['allPlaces'] as $value): ?>
         <option <? if ($pageData['note']['place']['id'] == $value['id']): ?>  selected <? endif; ?>
             value="<?= $value['id'] ?>"><?= $value['number'] ?></option>
       <? endforeach; ?>
    </select>
  </div>

  <!--   choose the team-->
<?php if (count($pageData['allTeams']) != 0): ?>
  <div class="select-block">
    <label for="teamId">Бригада</label>
    <select name="teamId" class="browser-default custom-select select-field" id="teamId">
       <?php foreach ($pageData['allTeams'] as $value): ?>
         <option <? if ($pageData['note']['team']['id'] == $value['id']): ?>  selected <? endif; ?>
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
  </div>

  <h1 class="cart-crasher-title">Неисправности вагона</h1>
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
                     <?php if ($title == 'description'): ?>
                    <td><a href="/crash?id=<?= (string)$note['id'] ?>"><?= $note[$title] ?></a></td>
                     <?php else: ?>
                        <?php if (isset($note[$title]['name'])): ?>
                      <td><?= $note[$title]['name'] ?></td>
                        <?php elseif (isset($note[$title]['number'])): ?>
                      <td><?= $note[$title]['number'] ?></td>
                        <? else: ?>
                      <td><?= $note[$title] ?></td>
                        <?php endif; ?>
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