<?php include("includes/header.php"); ?>

<div class="container">
    <h1 class="mt-4 mb-4">Pet Admission</h1>

    <div class="row">
        <!-- Pet Admission Form -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Admit a Pet</h5>
                    <form action="submit_admission.php" method="post">
                        <div class="form-group">
                            <label for="petName">Pet Name:</label>
                            <input type="text" class="form-control" id="petName" name="petName" required>
                        </div>
                        <div class="form-group">
                            <label for="species">Species:</label>
                            <input type="text" class="form-control" id="species" name="species" required>
                        </div>
                        <div class="form-group">
                            <label for="breed">Breed:</label>
                            <input type="text" class="form-control" id="breed" name="breed" required>
                        </div>
                        <div class="form-group">
                            <label for="ownerName">Owner's Name:</label>
                            <input type="text" class="form-control" id="ownerName" name="ownerName" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact Number:</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Admit Pet</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Pet Admission Form (Sample) -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Pet Admission Form (Sample)</h5>
                    <p class="card-text">Below is a sample pet admission form for viewing purposes only. This form is not functional in this demonstration.</p>
                    <p class="card-text">Pet Name: Fluffy</p>
                    <p class="card-text">Species: Dog</p>
                    <p class="card-text">Breed: Golden Retriever</p>
                    <p class="card-text">Owner's Name: John Doe</p>
                    <p class="card-text">Contact Number: 123-456-7890</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Medication/Treatment Button -->
    <div class="row">

    
        <div class="col-md-6">
            <button class="btn btn-success mb-4" data-toggle="modal" data-target="#medicationModal">Medication/Prescription</button>
        </div>
    </div>

    <!-- Prescription Display -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Prescription/Medication</h5>
                    <p class="card-text">Below is a sample prescription/medication for viewing purposes only:</p>
                    <p class="card-text"><strong>Medication:</strong> Antibiotics</p>
                    <p class="card-text"><strong>Dosage:</strong> 1 tablet per day</p>
                    <p class="card-text"><strong>Dietary Advice:</strong> Avoid fatty foods</p>
                    <p class="card-text"><strong>Follow-up Appointment:</strong> Next week</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Medication Modal -->
<div class="modal fade" id="medicationModal" tabindex="-1" role="dialog" aria-labelledby="medicationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="medicationModalLabel">Add Medication</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="medicationName">Medication Name:</label>
                        <input type="text" class="form-control" id="medicationName" required>
                    </div>
                    <div class="form-group">
                        <label for="dosage">Dosage:</label>
                        <input type="text" class="form-control" id="dosage" required>
                    </div>
                    <div class="form-group">
                        <label for="instructions">Instructions:</label>
                        <textarea class="form-control" id="instructions" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
