<?php if (!isset($pageData)) $pageData = []; ?>
<div class="wide-container">
  <main class="content">
    <div class="info">
      <table class="table">
        <thead>
        <tr>
           <?php if ($pageData['tableTitles']): ?>
              <? foreach ($pageData['tableTitles'] as $title): ?>
               <th scope="col"><?= $title ?></th>
              <? endforeach; ?>
           <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php if ($pageData['notes']): ?>
           <? foreach ($pageData['notes'] as $note): ?>
              <? foreach ($pageData['tableTitles'] as $title): ?>
                 <?php if (isset($note[$title]['name'])): ?>
                <td><?= $note[$title]['name'] ?></td>
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