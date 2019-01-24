
<?php session_start();
if(isset($_POST['Id_Article']))
{
    $idArticle = $_POST['Id_Article'];
    echo "Type : Remove Item from Cart, ID Item : $idArticle";
    include("../scripts/setConnexionLocalBDD.php");
    $query = $local_bdd->query("call orleans_bde.spd_delete_item_from_cart_by_id_user_and_article({$_SESSION['id']}, $idArticle);");
    if($query) // will return true if successful else it will return false
    {
    echo "Yes !";
    } else {
        echo "No !";
    }

} ?>
