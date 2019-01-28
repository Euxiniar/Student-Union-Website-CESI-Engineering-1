    <div id="item-<?php echo($datasItemStore["Id_article"]);?>" class="item-box-container x9"
    
    
    <?php switch ($counter) {
  case 1:
  echo 'style="box-shadow: 5px 5px 0 #fff, 10px 10px 0 rgb(253,228,153);"';
  break;

  case 2:
  echo 'style="box-shadow: 5px 5px 0 #fff, 10px 10px 0 rgb(224,234,241);"';
  break;

  case 3:
  echo 'style="box-shadow: 5px 5px 0 #fff, 10px 10px 0 rgb(252,193,153);"';
  break;
}
?>
>

<?php switch ($counter) {
  case 1:
  echo '<div class="item-stock-bar" style="background-color:rgb(253,228,153)"><span><img src="https://img.icons8.com/office/16/000000/medal2.png"> Best Seller <img src="https://img.icons8.com/office/16/000000/medal2.png"></span></div>';
  break;

  case 2:
  echo '<div class="item-stock-bar" style="background-color:rgb(224,234,241)"><span><img src="https://img.icons8.com/office/16/000000/medal-second-place.png"> Deuxième Meilleure Vente <img src="https://img.icons8.com/office/16/000000/medal-second-place.png"></span></div>';
  break;

  case 3:
  echo '<div class="item-stock-bar" style="background-color:rgb(252,193,153)"><span><img src="https://img.icons8.com/office/16/000000/medal2-third-place.png"> Troisième Meilleure Vente <img src="https://img.icons8.com/office/16/000000/medal2-third-place.png"></span></div>';
  break;
}
?>
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

  <?php
                        if (isset($_SESSION['id'])) {
                            if ($_SESSION['status'] == "Membre BDE") {
                              include("./item-admin.php");
                              }
                            }
                        ?>
</div>