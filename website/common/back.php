
<form method="post">
    <button type="submit" class="btn btn-dark common-left-text m-2" name="back"><i class="fas fa-arrow-circle-left"></i></button>
</form>

<?php

if (isset($_POST['back']))
    if(isset($_SERVER['HTTP_REFERER']) AND !empty($_SERVER['HTTP_REFERER'])){
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }else{
        header('Location:../connected/index.php');
    }
?>