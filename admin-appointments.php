<div class="container-fluid">
	<div class="row">
		<!-- Sidebar -->
		<div class="col-md-2">
			<?php include("includes/header.php"); ?>
		</div>
		<!-- Main Content -->
		<div class="col-md">
			<br>
			<h6 class="text-center">Welcome, <?php echo $username; ?>!</h6>
			<div class="card card-outline card-primary">
				<div class="card-header d-flex justify-content-between">
					<h3 class="card-title mb-0">List of Appointments</h3>
					<!-- Search Bar -->
					<div class="input-group mt-2 mb-2" style="width: 20%;">
						<input type="text" id="searchInput" class="form-control" placeholder="Search...">
					</div>
				</div>

				<div class="card-body">
					<div class="container-fluid">

						<table class="table table-hover table-striped table-bordered">
							<colgroup>
								<col width="5%">
								<col width="20%">
								<col width="20%">
								<col width="25%">
								<col width="20%">
								<col width="10%">
							</colgroup>
							<thead>
								<tr>
									<th>#</th>
									<th>Date Created</th>
									<th>Code</th>
									<th>Owner</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody id="appointmentsTable">
								<?php
								// Include database configuration
								require 'config.php';

								// Fetch appointments from the database
								$sql = "SELECT * FROM appointments ORDER BY unix_timestamp(`date_created`) DESC";
								$stmt = $pdo->query($sql);
								$count = 1;
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
									echo "<tr>";
									echo "<td class='text-center'>" . $count++ . "</td>";
									echo "<td>" . $row['date_created'] . "</td>";
									echo "<td>" . $row['code'] . "</td>";
									echo "<td>" . $row['ownername'] . "</td>";
									echo "<td>";
									switch ($row['status']) {
										case 0:
											echo '<span class="rounded-pill badge badge-primary">Pending</span>';
											break;
										case 1:
											echo '<span class="rounded-pill badge badge-success">Confirmed</span>';
											break;
										case 2: // Changed from 3 to 2 for consistency
											echo '<span class="rounded-pill badge badge-danger">Cancelled</span>';
											break;
										default:
											echo "Unknown"; // Handle any other status
											break;
									}
									echo "</td>";
									echo "<td class='text-center'>
												<button class='btn btn-sm btn-info' onclick='viewUser(" . json_encode($row) . ")'><i class='fas fa-eye'></i></button>
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

<script>
	$(document).ready(function() {
		$('#searchInput').on('keyup', function() {
			var searchText = $(this).val().toLowerCase();
			$('#appointmentsTable tr').filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(searchText) > -1);
			});
		});
	});
</script>


<?php include("includes/footer.php"); ?>