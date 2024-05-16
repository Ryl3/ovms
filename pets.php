<?php
session_start();
include 'config.php'; // Include your database connection
include("includes/header.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

$userId = $_SESSION['user_id'];

// Check if the user exists
$stmtUserCheck = $pdo->prepare("SELECT userid FROM user WHERE userid = ?");
$stmtUserCheck->execute([$userId]);
if ($stmtUserCheck->rowCount() == 0) {
    die('User ID is not valid.');
}

function getFormattedAge($birthdate)
{
    $date = new DateTime($birthdate);
    $now = new DateTime();
    $interval = $now->diff($date);

    $years = $interval->y;
    $months = $interval->m;
    $days = $interval->d;

    $yearText = $years > 1 ? 'yrs.' : 'yr.';
    $monthText = $months > 1 ? 'mos.' : 'mos.';
    $dayText = $days > 1 ? 'days' : 'day';
    $formattedAge = '';
    if ($years > 0) {
        $formattedAge .= "$years $yearText ";
    }
    if ($months > 0) {
        $formattedAge .= "$months $monthText ";
    }
    if ($days > 0) {
        $formattedAge .= "$days $dayText ";
    }
    return trim($formattedAge) . ' old';
}

// Fetch all pets for the logged-in user
$stmt = $pdo->prepare("SELECT name, species, breed, birthdate, age, sex FROM pets WHERE pet_owner = ?");
$stmt->execute([$userId]);
$pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}

if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']);
}

?>

<div class="container mt-2">
    <h1>My Pets</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPetModal">Add Pet</button>

    <!-- Modal for Adding New Pet -->
    <div class="modal fade" id="addPetModal" tabindex="-1" aria-labelledby="addPetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPetModalLabel">Add Pet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="insert-pets.php">
                        <div class="mb-3">
                            <label for="name" class="form-label">Pet Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="species" class="form-label">Species:</label>
                            <input type="text" class="form-control" id="species" name="species" required>
                        </div>
                        <div class="mb-3">
                            <label for="breed" class="form-label">Breed:</label>
                            <input type="text" class="form-control" id="breed" name="breed" required>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Birthdate:</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">Sex:</label>
                            <select class="form-select" id="sex" name="sex">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Pet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Display Pets in Cards -->
    <div class="row mt-4">
        <?php foreach ($pets as $pet) { ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($pet['name']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($pet['species']) ?></h6>
                        <p class="card-text">
                            Breed: <?= htmlspecialchars($pet['breed']) ?><br>
                            Birthdate: <?= htmlspecialchars($pet['birthdate']) ?><br>
                            Age: <?= getFormattedAge($pet['birthdate']) ?><br>
                            Sex: <?= htmlspecialchars($pet['sex']) ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            setTimeout(() => {
                fadeOutEffect(alert);
            }, 2000);
        });

        function fadeOutEffect(target) {
            let fadeEffect = setInterval(function() {
                if (!target.style.opacity) {
                    target.style.opacity = 1;
                }
                if (target.style.opacity > 0) {
                    target.style.opacity -= 0.1;
                } else {
                    clearInterval(fadeEffect);
                    target.style.display = 'none';
                }
            }, 50);
        }
    });
</script>

<script>
    function calculateAge() {
        var birthdate = document.getElementById('birthdate').value;
        if (birthdate) {
            var dob = new Date(birthdate);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
                m += 12; // Borrow 12 months
            }

            if (today.getDate() < dob.getDate()) {
                m--;
            }
            var monthText = m > 1 ? 'months' : 'month';
            var yearText = age > 1 ? 'years' : 'year';
            var formattedAge = (age > 0 ? age + ' ' + yearText + ' ' : '') + (m > 0 ? m + ' ' + monthText : '');
            document.getElementById('ageDisplay').innerText = formattedAge + ' old';
        } else {
            document.getElementById('ageDisplay').innerText = '';
        }
    }
</script>

<?php
include("includes/footer.php");
?>