<?php include("includes/header.php"); ?>
<br>
<h6 class="text-center">Welcome, <?php echo $username; ?>!</h6>
<div class="content">
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">Category List <small><i>(Pet Types)</i></small></h3>
            <div class="card-tools">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCategoryModal">
                    <i class="fas fa-plus"></i> Add New <!-- Font Awesome plus icon -->
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <table class="table table-hover table-striped">
                    <colgroup>
                        <col width="10%">
                        <col width="40%">
                        <col width="35%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Date Created</th>
                            <th>Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include database configuration
                        require 'config.php';

                        // Fetch categories from the database
                        // KUWANG OG EDIT AND DELETE // KUWANG OG EDIT AND DELETE // KUWANG OG EDIT AND DELETE // KUWANG OG EDIT AND DELETE
                        $sql = "SELECT * FROM category";
                        $stmt = $pdo->query($sql);
                        $count = 1;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $count++ . "</td>";
                            echo "<td>" . $row['date_created'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td class='text-center'>
                                    <button class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></button>
                                    <button class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i></button>
							  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Modal for adding a new category -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="admin-category-insert.php" method="post">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<style>
    .table {
        border: 3px solid black;
    }

    .table th,
    .table td {
        border: 2px solid black;
    }

    .card-title {
        margin-bottom: 0;
        /* Remove default margin */
    }

    .card-tools {
        display: flex;
        /* Use Flexbox for alignment */
        align-items: center;
        /* Align items vertically */
    }

    .card-tools a {
        text-decoration: none;
        /* Remove text decoration */
        margin-left: auto;
        /* Push the anchor tag to the right */
    }
</style>