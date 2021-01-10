<?php if (!isset($pageData)) $pageData = []; ?>
<div class="wide-container">
   <main class="content">
      <div class="info">
         <table class="table">
            <thead>
            <tr>
               <? foreach ($pageData['tableTitles'] as $title): ?>
                  <th scope="col"><?= $title ?></th>
               <? endforeach; ?>
            </tr>
            </thead>
            <tbody>
            <? foreach ($pageData['notes'] as $note): ?>
               <? foreach ($pageData['tableTitles'] as $title): ?>
                  <td><?= $note[$title] ?></td>
               <? endforeach; ?>
               </tr>
            <? endforeach; ?>
            </tbody>
         </table>
      </div>
   </main>
</div>