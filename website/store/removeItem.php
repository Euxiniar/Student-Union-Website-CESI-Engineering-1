
<?php session_start();

if(isset($_POST['ArticleID']))
{
    $idArticle = $_POST['ArticleID'];
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spd_delete_item_from_cart_by_id_user_and_article({$_SESSION['id']}, $idArticle);");
} ?>