<div class="container-fluid common-max-width-60">
    <form method="post">
        <div class="row">
            <div class="col-md-12">
                <textarea id="textareaWriteMessage" name ="commentToInsert" class="form-control mb-1" rows="3" placeholder="Écrivez votre message ici ..." maxlength="500" required></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 common-center-text">
                <?php
                if (isset($_SESSION['id']))
                    echo '
                    <button id ="suppr-message-button" type="button" class="btn btn-danger fas fa-times-circle" onclick="processResetMessage()"></button>
                    <button type="submit" name ="button-submit-comment" class="btn btn-success fas fa-arrow-circle-right"></button>';
                ?>
            </div>
        </div>
    </form>

    <hr class="common-separator2">
</div>


