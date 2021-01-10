<?php if (!isset($pageData)) $pageData = []; ?>

<div class="container">
  <div class="row authorization-row">
    <div class="col-md-4 offset-md-4 ">
      <h1 class="adding-form-title"><?= $pageData['title'] ?></h1>
      <form id="formUserData" method="post" action="<?= $pageData['formUri'] ?>" class="form">
         <?php foreach ($pageData['fields'] as $value): ?>
           <div class="form-group">
             <label for="<?= $value ?>"><?= $value ?></label>
             <input type="text" class="form-control" id="<?= $value ?>" name="<?= $value ?>">
           </div>
         <?php endforeach; ?>

