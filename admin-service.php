<!-- CSS styles -->
<style>
    .select2-container .select2-selection--multiple .select2-selection__rendered {
        width: 763px !important; /* Set the width to auto to allow options to expand */
		height: 35px !important;
        white-space: nowrap; /* Prevent options from wrapping */
    }

    .select2-container .select2-selection--multiple .select2-selection__choice {
        display: inline-block; /* Display options in a row */
    }

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


<?php include("includes/header.php"); ?>
<br>
<h6 class="text-center">Welcome, <?php echo $username; ?>!</h6>
<div class="content">
	<div class="card card-outline card-primary rounded-0 shadow">
		<div class="card-header d-flex justify-content-between">
			<h3 class="card-title">Services Lists</h3>
			<div class="card-tools">
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addServicesModal">
					<i class="fas fa-plus"></i> Add New <!-- Font Awesome plus icon -->
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<div class="container-fluid">
					<table class="table table-hover table-striped">
						<colgroup>
							<col width="5%">
							<col width="20%">
							<col width="20%">
							<col width="20%">
							<col width="10%">
							<col width="10%">
						</colgroup>
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th>Date Created</th>
								<th>Service</th>
								<th>For</th>
								<th>Cost</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                        // Include database configuration
                        require 'config.php';

                        $sql = "SELECT s.*, GROUP_CONCAT(c.name SEPARATOR ', ') as category_names
                                FROM services s
                                LEFT JOIN category c ON FIND_IN_SET(c.id, s.categoryids)
                                GROUP BY s.id";
                        $stmt = $pdo->query($sql);
                        $count = 1;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $count++ . "</td>";
                            echo "<td>" . $row['date_created'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['category_names'] . "</td>";
                            echo "<td>₱" . $row['fee'] . "</td>";
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

<!-- Modal for adding a new service -->
<div class="modal fade" id="addServicesModal" tabindex="-1" role="dialog" aria-labelledby="addServicesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Changed modal-lg for larger size -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServicesModalLabel">Add New Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="adm	in-services-insert.php" method="post">
                    <div class="form-group">
                        <label for="serviceName">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" name="serviceName" required>
                    </div>
                    <!-- Select2 dropdown -->
                    <div class="form-group">
                        <?php
                        require 'config.php';
                        $sql = "SELECT id, name FROM category ORDER BY name ASC";
                        $stmt = $pdo->query($sql);
                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <label for="categoryIds">Category IDs <small><i>(Pet Types)</i></small></label>
						<br>
                        <select class="form-control form-control-border w-100 p-3" id="categoryIds" name="categoryIds[]" multiple required>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control summernote" id="description" name="description" rows="5" required></textarea> <!-- Adjusted rows and added a larger height -->
                    </div>
                    <div class="form-group">
                        <label for="fee">Fee</label>
                        <input type="number" class="form-control" id="fee" name="fee" required>
                    </div>
                    <div class="form-group text-center"> <!-- Centered the submit button -->
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#description').summernote({
            height: 150, // Adjust the height as needed
            placeholder: 'Enter description here...',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });

        $('#categoryIds').select2();
    });
</script>

<?php include("includes/footer.php"); ?>