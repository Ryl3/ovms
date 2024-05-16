<?php include("includes/header.php"); ?>

<div class="container">
        <h1 class="mt-4 mb-4">Inventory Management</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Add New Product</h5>
                        <form action="add_product.php" method="post">
                            <div class="form-group">
                                <label for="productName">Product Name:</label>
                                <input type="text" class="form-control" id="productName" name="productName" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="medicine">Medicine</option>
                                    <option value="pet_food">Pet Food</option>
                                    <option value="treats">Treats</option>
                                    <option value="shampoo">Shampoo</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            // Dummy inventory data with quantity
            $inventory = array(
                array("name" => "Medicine A", "category" => "Medicine", "price" => "$10.99", "quantity" => 20),
                array("name" => "Pet Food B", "category" => "Pet Food", "price" => "$19.99", "quantity" => 15),
                array("name" => "Treats C", "category" => "Treats", "price" => "$24.99", "quantity" => 30),
                array("name" => "Shampoo D", "category" => "Shampoo", "price" => "$14.99", "quantity" => 25)
            );

            // Display inventory items
            foreach ($inventory as $item) {
                echo '<div class="col-md-3 mb-4">';
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $item['name'] . '</h5>';
                echo '<p class="card-text">Category: ' . $item['category'] . '</p>';
                echo '<p class="card-text">Price: ' . $item['price'] . '</p>';
                echo '<p class="card-text">Quantity: ' . $item['quantity'] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

<?php include("includes/footer.php"); ?>
