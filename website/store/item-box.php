

            <div class="contenu10">

                <div class="contenu100">
                    <p><?php echo($datasItemStore["Titre"]);?></p>
                    </br>
                </div>

                <div class="contenu101">
                <img
                    src="<?php echo($datasItemStore["Image"]);?>"
                    alt="<?php echo($datasItemStore["Description"]);?>"
                    height="100%" 
                    width="100%" 
                />
                     </br>
                </div>

                <div class="contenu102">

                    <div class="prix">
                    <p><?php echo($datasItemStore["Cout"]);?>€</p>
                    </div>
                
                         <p>
                        </p>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number"  data-type="minus" data-field='<?php echo $datasItemStore["Id_article"]; ?>'>
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                                <input type="text" name='<?php echo $datasItemStore["Id_article"]; ?>' class="form-control input-number" value="0" min="0" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field='<?php echo $datasItemStore["Id_article"]; ?>'>
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                         </div>
                        <p></p>
                    </br>
                </div>
                <div class="contenu103">
                    <div id="bouton_bde">
                         <button type="button" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
                        <button type="button" class="btn btn-warning btn-circle"><i class="glyphicon glyphicon-cog"></i></button>
                    </div>
                </div>

            </div>