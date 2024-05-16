<style>
    .custom-card {
        height: 150px; /* You can adjust this value as needed */
    }
</style>

<div class="row">
    <!-- Appointments Card -->
    <div class="col-md-6">
        <div class="card custom-card">
            <div class="card-body">
                <h5 class="card-title">Number of Appointments</h5>
                <p class="card-text">You have made <?php echo $appointments_count; ?> appointments.</p>
            </div>
        </div>
    </div>

    <!-- Medical Records Card -->
    <!-- <div class="col-md-3">
        <div class="card custom-card">
            <div class="card-body">
                <h5 class="card-title">Number of Medical Records</h5>
                <p class="card-text">You have <?php echo $medical_records_count; ?> medical records in the system.</p>
            </div>
        </div>
    </div> -->

    <!-- Pets Card -->
    <div class="col-md-6">
        <div class="card custom-card">
            <div class="card-body">
                <h5 class="card-title">Number of Pets</h5>
                <p class="card-text">You own <?php echo $pet_count; ?> pets.</p>
            </div>
        </div>
    </div>

    <!-- Shop Card -->
    <!-- <div class="col-md-3">
        <div class="card custom-card">
            <div class="card-body">
                <h5 class="card-title">Number of Purchased Items</h5>
                <p class="card-text">You have purchased <?php echo $purchased_item; ?> items.</p>
            </div>
        </div>
    </div> -->
</div>
