<?php include("includes/header.php"); ?>

<div class="container">
        <h1 class="mt-4 mb-4">Dummy Report</h1>

        <div class="card mb-4">
            <div class="card-header">
                Report Overview
            </div>
            <div class="card-body">
                <p>This is a dummy report to demonstrate reporting functionality in the Online Veterinary Management System.</p>
                <p>You can customize this report to include various data and insights relevant to your system.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Sample Graph
            </div>
            <div class="card-body">
                <canvas id="dummyChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('dummyChart').getContext('2d');
        var dummyChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5'],
                datasets: [{
                    label: 'Sample Data',
                    data: [10, 20, 30, 40, 50],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {}
        });
    </script>

<?php include("includes/footer.php"); ?>