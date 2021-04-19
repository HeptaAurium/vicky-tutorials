<?php
$action = "Show";
$active = 'edit';

require_once 'include/header.php';
require_once 'bin/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('Location:show.php');
    exit;
}

$query = "SELECT * FROM users WHERE id='$id'";
$user = $conn->query($query)->fetch_array();

if (count($user) == 0) {
    header('Location:show.php');
    exit;
}

?>
<?php if (isset($_GET['errors'])) : ?>
    <div class="alert alert-danger col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
        <strong><?php echo $_GET['errors']; ?></strong>
    </div>
<?php endif ?>

<?php if (isset($_GET['success'])) : ?>
    <?php if ($_GET['success'] == 1) : ?>
        <div class="alert alert-success col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
            <strong>User data updated successfully</strong>
        </div>
    <?php else : ?>
        <div class="alert alert-danger col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
            <strong>Something went wrong! Try again later!</strong>
        </div>
    <?php endif ?>
<?php endif ?>

<div class="container">
    <form action="/action.php" method="post" class="col-sm-12 col-md-8 col-lg-6 rounded mx-auto bg-white shadow p-4 my-3">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" value="<?php echo $user['fname'] ?>" class="form-control" placeholder="First Name" aria-describedby="helpId" required>
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" value="<?php echo $user['lname'] ?>" class="form-control" placeholder="Last Name" aria-describedby="helpId" required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo $user['email'] ?>" class="form-control" placeholder="Your email address" aria-describedby="helpId" required>
        </div>

        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">

        <button type="submit" name="update" class="btn btn-primary">Update</button>

    </form>
</div>