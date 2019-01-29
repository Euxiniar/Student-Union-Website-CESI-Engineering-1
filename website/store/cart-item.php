<tr>
<td data-th="Product">
    <div class="row">
      <div class="col-sm-2 hidden-xs">
        <img src="<?php echo $datasEvent['Image'] ?>"alt="..." class="img-thumbnail img-responsive rounded float-left" />
      </div>
      <div class="col-sm-10">
        <h4 class="nomargin">
          <?php echo $datasEvent['Titre'] ?>
        </h4>
        <p>
          <?php echo $datasEvent['Description'] ?>
        </p>
        <span class="stock-info">
          En stock : <?php echo $datasEvent['Stock'] ?>
        </span>
        <p class="delivery-warning">
          Livraison uniquement dans votre BDE !
        </p>
      </div>
    </div>
  </td>
  <td data-th="Price">
    <?php echo $datasEvent['Cout'] ?>€
  </td>
  <td data-th="Quantity">
    <input type="number" oninput="processNewQty({Qty:this.value,ArticleID:'<?php echo $datasEvent['Id_article']?>'})" class="form-control text-center" value="<?php echo $datasEvent['Quantite'] ?>" min="1" max="10">
  </td>
  <td data-th="Subtotal" class="text-center">
  <span class="price-sub"><?php echo $datasEvent['Quantite']*$datasEvent['Cout'] ?></span>€
  </td>
  <td class="actions" data-th="">
  <!--
    <button type="button" class="btn btn-info btn-sm">
    <i class="fa fa-refresh" aria-hidden="true"></i>
    </button>-->
    <button type="button" class="btn btn-danger btn-sm" onclick="processRemoveItem(<?php echo $datasEvent['Id_article']?>)">
    <i class="fa fa-times" aria-hidden="true"></i>
    </button>
  </td>
</tr>