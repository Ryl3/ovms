<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2">
            <?php include("includes/header.php"); ?>
        </div>

        <!-- Dashboard Content -->
        <div class="col-md">
            <div class="container">
                <br>
                <h6 class="text-center">Welcome, <?php echo $username; ?>!</h6>
                <h4 class="mt-4 mb-4">Dashboard</h4>

                <div class="row">
                    <?php
                    // Database connection
                    require 'config.php';

                    // Fetching data from appointments, services, users, and category tables
                    $tables = ['appointments', 'services', 'user', 'category'];
                    foreach ($tables as $table) {
                        $sql = "SELECT COUNT(*) as total FROM $table";
                        $stmt = $pdo->query($sql);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total = $result['total'];
                    ?>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ucfirst($table); ?></h5>
                                    <p class="card-text">Total: <?php echo $total; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h3>Appointments Booked</h3>
                        <canvas id="appointmentChart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-md-6">
                        <h3>Services Offered</h3>
                        <canvas id="servicesChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <h3>Users Registered</h3>
                        <canvas id="usersChart" width="400" height="200"></canvas>
                    </div>
                    <div class="col-md-6">
                        <h3>Categories</h3>
                        <canvas id="categoriesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var_dump($appointmentData);
    var_dump($servicesData);
    var_dump($usersData);
    var_dump($categoriesData);

    $(document).ready(function() {
        // PHP fetched data for appointments booked in the last 30 days
        var appointmentData = <?php echo json_encode($appointmentData); ?>;

        // PHP fetched data for services offered
        var servicesData = <?php echo json_encode($servicesData); ?>;

        // PHP fetched data for users registered
        var usersData = <?php echo json_encode($usersData); ?>;

        // PHP fetched data for categories
        var categoriesData = <?php echo json_encode($categoriesData); ?>;

        // Set up the appointments chart
        var ctx1 = document.getElementById('appointmentChart').getContext('2d');
        var appointmentChart = new Chart(ctx1, {
            type: 'line',
            data: appointmentData,
            options: {}
        });

        // Set up the services chart
        var ctx2 = document.getElementById('servicesChart').getContext('2d');
        var servicesChart = new Chart(ctx2, {
            type: 'bar',
            data: servicesData,
            options: {}
        });

        // Set up the users chart
        var ctx3 = document.getElementById('usersChart').getContext('2d');
        var usersChart = new Chart(ctx3, {
            type: 'line',
            data: usersData,
            options: {}
        });

        // Set up the categories chart
        var ctx4 = document.getElementById('categoriesChart').getContext('2d');
        var categoriesChart = new Chart(ctx4, {
            type: 'bar',
            data: categoriesData,
            options: {}
        });
    });

    // Set up the appointments chart
    var ctx1 = document.getElementById('appointmentChart').getContext('2d');
    var appointmentChart = new Chart(ctx1, {
        type: 'line',
        data: appointmentData,
        options: {}
    });

    // Set up the services chart
    var ctx2 = document.getElementById('servicesChart').getContext('2d');
    var servicesChart = new Chart(ctx2, {
        type: 'bar',
        data: servicesData,
        options: {}
    });

    // Set up the users chart
    var ctx3 = document.getElementById('usersChart').getContext('2d');
    var usersChart = new Chart(ctx3, {
        type: 'line',
        data: usersData,
        options: {}
    });

    // Set up the categories chart
    var ctx4 = document.getElementById('categoriesChart').getContext('2d');
    var categoriesChart = new Chart(ctx4, {
        type: 'bar',
        data: categoriesData,
        options: {}
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<?php include("includes/footer.php"); ?>