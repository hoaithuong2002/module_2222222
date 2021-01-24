<?php
require __DIR__ ."vendor/autoload.php";
use App\Controller\PageController;
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;

$controller = new PageController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Product Manager</title>
</head>
<body>
<?php
switch ($page) {
    case 'products':
        $controller->productsPage();
        break;
    case 'edit-product':
        $controller->editProductPage();
        break;
    case 'create-product':
        $controller->createProductPage();
        break;
    case 'delete-product':
        $controller->deleteProductPage();
        break;
    default:
        $controller->productsPage();
}
?>
</body>
</html