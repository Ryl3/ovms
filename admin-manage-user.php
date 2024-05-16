<?php include("includes/header.php"); ?>
<br>
<h6 class="text-center">Welcome, <?php echo $username; ?>!</h6>
<div class="content">
	<div class="card card-outline card-primary rounded-0 shadow">
		<div class="card-header d-flex justify-content-between align-items-center">
			<h3 class="card-title m-0">List of System Users</h3>
			<div class="card-tools">
				<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addUserModal">
					<i class="fas fa-plus"></i> Create New
				</button>
			</div>
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<table class="table table-hover table-striped text-center">
					<thead>
						<colgroup>
							<!-- id -->
							<col width="5%">
							<!-- avatar -->
							<col width="10%">
							<!-- name -->
							<col width="20%">
							<!-- email -->
							<col width="20%">
							<!-- username -->
							<col width="10%">
							<!-- position -->
							<col width="10%">
							<!-- user type -->
							<col width="10%">
							<!-- action -->
							<col width="15%">
						</colgroup>
						<tr>
							<th class="text-center">#</th>
							<th>Avatar</th>
							<th>Name</th>
							<th>Email</th>
							<th>Username</th>
							<th>Position</th>
							<th>User Type</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Include database configuration
						require 'config.php';
						// Fetch categories from the database
						$sql = "SELECT * FROM user";
						$stmt = $pdo->query($sql);
						$count = 1;
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
							echo "<tr>";
							echo "<td class='text-center'>" . $count++ . "</td>";
							echo "<td class='text-center'><img src='" . $row['avatar'] . "' alt='Avatar' class='img-thumbnail' width='50'></td>";
							echo "<td class='text-left'>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
							echo "<td class='text-left'>" . $row['email'] . "</td>";
							echo "<td class='text-left'>" . $row['username'] . "</td>";
							echo "<td class='text-left'>" . $row['position'] . "</td>";
							echo "<td class='text-left'>" . $row['account_type'] . "</td>";
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

<!-- Modal for adding a new user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="admin-manage-user-insert.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstname">First Name</label>
								<input type="text" class="form-control" id="firstname" name="firstname" required>
							</div>
							<div class="form-group">
								<label for="lastname">Last Name</label>
								<input type="text" class="form-control" id="lastname" name="lastname" required>
							</div>
							<div class="form-group">
								<label for="phone">Phone Number</label>
								<input type="text" class="form-control" id="phone" name="phone" required>
							</div>
							<div class="form-group">
								<label for="email">Email Address</label>
								<input type="email" class="form-control" id="email" name="email" required>
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
							<div class="form-group">
								<label for="account_type">Account Type</label>
								<select class="form-control" id="account_type" name="account_type" required>
									<option value="admin">Admin</option>
								</select>
							</div>
							<div class="form-group">
								<label for="status">Account Status</label>
								<select class="form-control" id="status" name="status" required>
									<option value="active">Active</option>
									<option value="disabled">Disabled</option>
								</select>
							</div>
							<div class="form-group">
								<label for="position">Position</label>
								<select class="form-control" id="position" name="position" required>
									<option value="staff">Staff</option>
									<option value="veterinarian">Veterinarian</option>
								</select>
							</div>
							<div class="form-group">
								<label for="avatar">Avatar</label>
								<input type="file" class="form-control-file" id="avatar" name="avatar" required>
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Add User</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal for viewing user details -->
<div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewUserModalLabel">View User Details</h5>
				<h6><small><i>Click anywhere outside to close.</i></small></h6>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-4 text-center">
						<img id="view_user_avatar" src="" alt="Avatar" class="img-thumbnail" width="150">
					</div>
					<div class="col-md-8">
						<p><strong>Name:</strong> <span id="view_user_name"></span></p>
						<p><strong>Email:</strong> <span id="view_user_email"></span></p>
						<p><strong>Username:</strong> <span id="view_user_username"></span></p>
						<p><strong>Position:</strong> <span id="view_user_position"></span></p>
						<p><strong>User Type:</strong> <span id="view_user_type"></span></p>
						<!-- Add more user details here -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function viewUser(user) {
		$('#view_user_avatar').attr('src', user.avatar);
		$('#view_user_name').text(user.firstname + ' ' + user.lastname);
		$('#view_user_email').text(user.email);
		$('#view_user_username').text(user.username);
		$('#view_user_position').text(user.position);
		$('#view_user_type').text(user.account_type);
		$('#viewUserModal').modal('show');
	}
</script>

<?php include("includes/footer.php"); ?>

<style>
	.table {
		border: 3px solid black;
	}

	.table th,
	.table td {
		border: 2px solid black;
		text-align: center;
		vertical-align: middle;
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