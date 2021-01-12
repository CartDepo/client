<?php if (!isset($pageData)) $pageData = []; ?>

<div class="container">
  <div class="row authorization-row">
    <div class="col-md-4 offset-md-4 ">
      <h1 class="adding-form-title"><?= $pageData['title'] ?></h1>
      <form id="formUserData" method="post" action="<?= $pageData['formUri'] ?>" class="form">
        <input hidden type="text" name="id" value="<?= (string)$pageData['note']['id'] ?>">
         <? foreach ($pageData['fields'] as $value): ?>

            <? $key = $value[0]; ?>
            <? $fieldData = $pageData['note'][$key];

            if (is_array($fieldData) and $fieldData['id'])
               $idField = $fieldData['id'];

            // set value
            if (isset($fieldData['name']))
               $fieldValue = $fieldData['name'];
            elseif (isset($fieldData['number']))
               $fieldValue = $fieldData['number'];
            else
               $fieldValue = $fieldData;
            ?>

           <div class="form-group">
             <label for="<?= $key ?>"><?= $value[1] ?></label>
             <input <? if ($value[2] === true): ?> disabled <? endif; ?>
                 type="text" class="form-control"
                 id="<?= $key ?>"
                <? if ($value[2] !== true): ?>
                  name="<?= $key ?>"
                <? endif; ?>
                 value="<?= $fieldValue ?>">
              <? if ($idField): ?>
                <input hidden type="text" name="<?= $key ?>" value="<?= $idField ?>">
              <? elseif ($value[2] === true): ?>
                <input hidden type="text" name="<?= $key ?>" value="<?= $fieldValue ?>">
              <? endif; ?>
           </div>
         <? endforeach; ?>

