<?php
$action = "Show";
$active = 'show';

require_once 'include/header.php';
require_once 'bin/conn.php';

$query = "SELECT * FROM users";
$users = $conn->query($query);
?>
<?php if (isset($_GET['success'])) : ?>
    <?php if ($_GET['success'] == 1) : ?>
        <div class="alert alert-success col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
            <strong>User deleted successfully</strong>
        </div>
    <?php else : ?>
        <div class="alert alert-danger col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
            <strong>Something went wrong! Try again later!</strong>
        </div>
    <?php endif ?>
<?php endif ?>
<div class="col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3">
    <table class="table table-bordered table-condensed table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $users->fetch_array()) : ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['fname'] ?></td>
                    <td><?php echo $user['lname'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td>
                        <div class="d-flex flex-row">
                            <a href="edit.php?id=<?php echo $user['id'] ?>" class="btn bg-transparent text-secondary"> Edit </a>
                            <form action="/delete.php" method="post">
                                <input type="hidden" name="user" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete" class="btn bg-transparent text-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


<?php require_once 'include/footer.php'; ?>