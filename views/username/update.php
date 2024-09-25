<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h2>Update User</h2>

        <?php if (isset($_SESSION['flash_alert'])): ?>
    <div class="alert alert-<?= $_SESSION['flash_alert']['type']; ?>">
        <?= $_SESSION['flash_alert']['message']; ?>
        <?php unset($_SESSION['flash_alert']); // Clear after displaying ?>
    </div>
<?php endif; ?>

        <form action="<?= site_url('user/update/' . $user['id']); ?>" method="POST">
            <div class="mb-3">
                <label for="jld_LastName">Last Name:</label>
                <input type="text" class="form-control" id="jld_LastName" name="jld_LastName" value="<?= $user['jld_LastName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jld_FirstName">First Name:</label>
                <input type="text" class="form-control" id="jld_FirstName" name="jld_FirstName" value="<?= $user['jld_FirstName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jld_Email">Email:</label>
                <input type="email" class="form-control" id="jld_Email" name="jld_Email" value="<?= $user['jld_Email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jld_Gender">Gender:</label>
                <select class="form-control" id="jld_Gender" name="jld_Gender" required>
                    <option value="">Select</option>
                    <option value="Male" <?= $user['jld_Gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?= $user['jld_Gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                    <option value="Other" <?= $user['jld_Gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="jld_Address">Address:</label>
                <input type="text" class="form-control" id="jld_Address" name="jld_Address" value="<?= $user['jld_Address']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
