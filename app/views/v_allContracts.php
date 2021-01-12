<?php include VIEW_PATH . "baseTpl/headerTpl.php"; ?>

<?php if (!isset($pageData)) $pageData = []; ?>
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
                  <td><a href="/contract?id=<?= (string)$note['id'] ?>"><?= $note[$title] ?></a></td>
                   <?php else: ?>
                      <?php if (isset($note[$title]['fio'])): ?>
                    <td><a href="#"><?= $note[$title]['fio'] ?></a></td>
                      <?php elseif (isset($note[$title]['name'])): ?>
                    <td><a href="#"><?= $note[$title]['name'] ?></a></td>
                      <? else: ?>
                    <td><a href="#"><?= $note[$title] ?></a></td>
                      <?php endif; ?>
                   <? endif; ?>
                <? endforeach; ?>
              </tr>
             <? endforeach; ?>
          <?php endif; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>

<?php include VIEW_PATH . "baseTpl/footerTpl.php"; ?>