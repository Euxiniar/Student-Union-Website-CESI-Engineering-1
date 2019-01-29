<?php
if(isset($_GET['name'])){
    $url = 'http://localhost:3000/page?name='.$_GET['name'];
    $url = str_replace(" ", "%20", $url);
    $api_json = file_get_contents($url);
    $api_array= json_decode($api_json, true);
    echo $api_array['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" name="name"/>
        <button type="submit">submit</button>
    </form>
</body>
</html>