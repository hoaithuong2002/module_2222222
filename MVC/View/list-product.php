<?php
$products = null;
if (!empty($this->productManager)) {
    $products = $this->productManager->getAllProduct();
}
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['search'])){

    $productSearch = [];

    $nameSearch = $_GET['search'];

    foreach ($products as $product) {
        if (substr($product->getName(), 0, strlen($_GET['search'])) == $_GET['search']){
            $productSearch[] = $product;
        }
    }
    $products = $productSearch;
}
?>
<div class="container mt-5">
    <table class="table table-striped table-bordered caption-top">
        <caption>
            <h1>Danh sách mặt hàng</h1>
            <div class="pt-2 pb-3 d-flex justify-content-between">
                <form class="d-flex" method="get">
                    <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
                <a class="btn btn-outline-success pb-2" href="index.php?page=create-product" role="button">Create</a>
            </div>
        </caption>
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên hàng</th>
            <th scope="col">Loại hàng</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($listProduct)):?>
            <tr>
                <th scope="row" colspan="4" class="text-center">No result is found</th>
            </tr>
        <?php endif;?>
        <?php foreach ($products as $product):?>
            <?php $id = $product->getId(); $_SESSION["$id"] = $product;?>
            <tr>
                <th scope="row"><?php echo $product->getId()?></th>
                <td><?php echo $product->getName()?></td>
                <td><?php echo $product->getCategory()?></td>
                <td>
                    <a href="index.php?page=edit-product&id=<?php echo $product->getId()?>&name=<?php echo $product->getName()?>">Edit</a>
                    <a href="index.php?page=delete-product&id=<?php echo $product->getId()?>&name=<?php echo $product->getName()?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>