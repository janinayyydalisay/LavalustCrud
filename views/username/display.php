<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h2>User List</h2>

        <?php if (isset($_SESSION['flash_alert'])): ?>
            <div class="alert alert-<?= $_SESSION['flash_alert']['type']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['flash_alert']['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['flash_alert']); ?>
        <?php endif; ?>

        <?php if (isset($username) && !empty($username)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($username as $user): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= $user['jld_LastName']; ?></td>
                    <td><?= $user['jld_FirstName']; ?></td>
                    <td><?= $user['jld_Email']; ?></td>
                    <td><?= $user['jld_Gender']; ?></td>
                    <td><?= $user['jld_Address']; ?></td>
                    <td>
                        <a href="<?= site_url('user/update/' .$user['id']); ?>">Update</a>
                        <a href="<?= site_url('user/delete/' .$user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No users found.</p>
        <?php endif; ?>

        <a href="<?= site_url('user/create'); ?>" class="btn btn-primary">Add User</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

