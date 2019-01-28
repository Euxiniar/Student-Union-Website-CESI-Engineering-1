<div class="item-admin-bar">

<form id="form">
  <button type="button" class="btn btn-danger custom-size delete-item-button" onclick="processRemoveArticle(<?php echo $datasItemStore['Id_article'];?>)">
                     <i class="fas fa-trash-alt"></i>
                    </button>
</form>

<form method="post" id="form" action="./editArticle.php">
  <input type="hidden" name="id" value="<?php echo $datasItemStore['Id_article'];?>"/>
  <button class="btn btn-warning" type="button submit" name="edit"><i class="fas fa-cog"></i></button>
</form>
</div>