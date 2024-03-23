/* This PHP code snippet is a form for adding products to a website. Here's a breakdown of what the
code does: */
    <?php
    require_once("entities/product.class.php");
    require_once('entities/category.class.php');
//? Ghi chú lại các biến được khởi tạo và sử dụng để lưu thông tin lỗi.
    $loi_str = "";
   /* This part of the code snippet is checking if the form has been submitted by checking if the
   "btnsubmit" parameter is set in the `` superglobal array. If the form has been submitted,
   it proceeds to retrieve the values entered in the form fields for product name, category ID,
   price, quantity, description, and the uploaded picture file. */
    if (isset($_POST["btnsubmit"])) {
        // !IMPORTANT: Lấy giá trị từ biểu mẫu và khởi tạo đối tượng sản phẩm mới
        $productName = $_POST["txtname"];
        $cateID = $_POST["txtcateid"];
        $price = $_POST["txtprice"];
        $quantity = $_POST["txtquantity"];
        $description = $_POST["txtdesc"];
        $picture = $_FILES["txtpic"];

    /* The code snippet you provided is creating a new `Product` object by passing in various
    parameters such as product name, category ID, price, quantity, description, and picture. This
    object creation is a crucial step in the process of adding a new product to the database. The
    `Product` class likely contains methods to handle the saving of product information to the
    database. */
    // !IMPORTANT: Lưu sản phẩm vào cơ sở dữ liệut
        $newProduct = new Product(
            $productName,
            $cateID,
            $price,
            $quantity,
            $description,
            $picture
        );

   /* This part of the code snippet is handling the process of saving a new product to the database.
   Here's a breakdown of what it does: */
        $loi = array();

         // !IMPORTANT: Xử lý lỗi nếu không thể lưu sản phẩ
        $result = $newProduct->save($loi);

        if (!$result) {
          // !IMPORTANT: Chuyển hướng người dùng đến trang product-add.php với thông báo lỗi
            $loi_str = implode("<br>", $loi);

            header("Location: product-add.php?status=failure&error=" . urlencode($loi_str));
        } else {
            // !IMPORTANT: Chuyển hướng người dùng đến trang product-add.php với thông báo sản phẩm đã được thêm thành công
            header("Location: product-add.php?status=inserted");
        }
    }
    ?>
    <?php if ($loi_str != "") { ?>
        <div class="alert alert-danger"><?php echo $loi_str ?></div>
    <?php } ?>
    <?php require 'header.php'; ?>

    <?php
    if (isset($_GET["status"])) {
        if ($_GET["status"] == 'inserted') {
            echo "<h2>Add successful product.</h2>";
        } else {
            echo "<h2>Add failed product.</h2>";
        }
    }
    ?>

    <!-- Form Add products -->
    <form method="post" enctype="multipart/form-data">
        <!-- Product's name -->
        <div class="row">
            <div class="lbltitle">
                <label> Product's name </label>
            </div>
            <div class="lblinput">
                <input type="text" name="txtname" value="<?php echo isset($_POST["txtname"]) ? $_POST["txtname"] : "" ?>">
            </div>
        </div>
        <!-- Product Description -->
        <div class="row">
            <div class="lbltitle">
                <label> Product Description </label>
            </div>
            <div class="lblinput">
                <textarea name="txtdesc" cols="21" rows="10"><?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : "" ?></textarea>
            </div>
        </div>
        <!-- The number of products -->
        <div class="row">
            <div class="lbltitle">
                <label> The number of products </label>
            </div>
            <div class="lblinput">
                <input type="number" name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : "" ?>">
            </div>
        </div>
        <!-- Product price -->
        <div class="row">
            <div class="lbltitle">
                <label> Product price </label>
            </div>
            <div class="lblinput">
                <input type="number" name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : "" ?>">
            </div>
        </div>
        <!-- Product Type -->
        <div class="row">
            <div class="lbltitle">
                <label> Product Type </label>
            </div>
            <div class="lblinput">
                <select name="txtcateid">
                    <option value="" selected>-- Select type --</option>
                    <?php $cates = Category::list_category(); ?>
                    <?php foreach ($cates as $item) { ?>
                        <option value="<?php echo $item['CateID']; ?>"><?php echo $item['CategoryName']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- URL Image -->
        <div class="row">
            <div class="lbltitle">
                <label>Url Image</label>
            </div>
            <div class="lblinput">
                <input type="file" name="txtpic" accept=".png,.gif,.jpg,.jpeg">
            </div>
        </div>
        <!-- Click more button -->
        <div class="row">
            <div class="lbltitle"></div>
            <div class="submit">
                <button type="submit" name="btnsubmit"> Add Product </button>
            </div>
        </div>
    </form>

    <!-- Footer -->
    <?php require 'footer.php'; ?>
