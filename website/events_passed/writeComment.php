<div class="container-fluid common-max-width-60">
    <form>
        <div class="row">
            <div class="col-md-12">
                <textarea id="textareaWriteMessage" class="form-control mb-1" rows="3" placeholder="Écrivez votre message ici ..." maxlength="500"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 common-center-text">
                <button id ="suppr-message-button" type="button" class="btn btn-danger fas fa-times-circle" onclick="processResetMessage()"></button>
                <button type="submit" class="btn btn-success fas fa-arrow-circle-right"></button>
            </div>
        </div>
    </form>

    <hr class="common-separator2">
</div>

<!--<script>
    function processResetMessage() {
        $("#textareaWriteMessage").html(".");
    }
</script>-->


