    <div id="item-<?php echo($datasItemStore["Id_article"]);?>" class="item-box-container x9">
  <div class="item-box-title">
    <div class="Title">
      <span>
      <?php echo($datasItemStore["Titre"]);?>
    </span>
      <div class="title-price-separator">
      </div>
    </div>
    <div class="Price">
      <span><?php echo($datasItemStore["Cout"]);?>€</span>
    </div>
  </div>

  <div class="item-box-image">
    <img class="product-image" src="<?php echo $datasItemStore["Image"]?>">
  </div>

<div class="item-stock-bar">
<span> Stock : <?php echo $datasItemStore["Stock"]?></span>
</div>

  <div class="item-user-bar">
    <div class="btn-toolbar">
      <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number custom-size"  data-type="minus" data-field="<?php echo($datasItemStore["Id_article"]);?>">
               <i class="fas fa-minus"></i>
              </button>
          </span>
      <input type="number" name="<?php echo($datasItemStore["Id_article"]);?>" class="form-control input-number col-3 input-qty" value="1" min="1" max="100">
      <span class="input-group-btn">
              <button type="button" class="btn btn-primary btn-number custom-size" data-type="plus" data-field="<?php echo($datasItemStore["Id_article"]);?>">
                  <i class="fas fa-plus"></i>
              </button>
          </span>
          <button id="<?php echo($datasItemStore["Id_article"]);?>" class="btn btn-primary custom-size-cart" type="button" name="Panier" onclick='addToCart(this.id)'><i class="fas fa-cart-plus"></i></button>
    </div> 
   
  </div>

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

</div>