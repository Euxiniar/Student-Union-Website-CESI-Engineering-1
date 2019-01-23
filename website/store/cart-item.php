<tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="<?php echo $datasEvent['Image'] ?>"alt="..." class="img-responsive" />
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin"><?php echo $datasEvent['Titre'] ?></h4>
                                <p><?php echo $datasEvent['Description'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><?php echo $datasEvent['Cout'] ?>€</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="<?php echo $datasEvent['Quantite'] ?>" min="1" max="10">
                    </td>
                    <td data-th="Subtotal" class="text-center"></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm"><i class="glyphicon glyphicon-refresh"></i>
                        </button>
                        <button class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </td>
                </tr>