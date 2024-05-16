<?php include("includes/header.php"); ?>

<div class="container">
        <h1 class="mt-4 mb-4">Shopping Cart</h1>

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Product 1</h5>
                        <p class="card-text">Price: $10.99</p>
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Product 2</h5>
                        <p class="card-text">Price: $19.99</p>
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Product 3</h5>
                        <p class="card-text">Price: $24.99</p>
                        <button class="btn btn-danger btn-sm">Remove</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <hr>
                        <p>Total Items: 3</p>
                        <p>Total Price: $55.97</p>
                        <a href="#" class="btn btn-primary btn-block">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>
