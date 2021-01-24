<?php
$categoryList= null;
if (!empty($this->categoryManager)) {
    $categoryList = $this->categoryManager->getAllCategory();
}
?>
<div class="container mt-5">
    <div class="row align-items-center">
        <h1>Thêm mặt hàng</h1>
        <form class="col-8" method="post">
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Loại hàng</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Category" name="category">
                        <?php foreach ($categoryList as $category):?>
                            <option value="<?php echo $category->getId()?>"><?php echo $category->getName()?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Giá</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="price" name="price" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="amount" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="number" min="0" class="form-control" id="amount" name="amount" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Mô tả</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                </div>
            </div>
            <div class="pt-2 pb-3 d-flex justify-content-end">
                <button type="submit" class="btn btn-outline-success me-3">Add</button>
                <a class="btn btn-outline-danger" href="index.php" role="button">Exit</a>
            </div>
        </form>
    </div>
</div>
