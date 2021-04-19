<?php
$action = "Create";
$active = "create";
require_once 'include/header.php';
?>
<?php if (isset($_GET['errors'])) : ?>
    <div class="alert alert-danger col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
        <strong><?php echo $_GET['errors']; ?></strong>
    </div>
<?php endif ?>

<?php if (isset($_GET['success'])) : ?>
    <?php if ($_GET['success'] == 1) : ?>
        <div class="alert alert-success col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
            <strong>User created successfully</strong>
        </div>
    <?php else : ?>
        <div class="alert alert-danger col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3" role="alert">
            <strong>Could Not create user! Try again later!</strong>
        </div>
    <?php endif ?>
<?php endif ?>



<div class="container">
    <form action="/action.php" method="post" class="col-sm-12 col-md-8 col-lg-6 rounded mx-auto bg-white shadow p-4 my-3">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="" class="form-control" placeholder="First Name" aria-describedby="helpId" required>
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="" class="form-control" placeholder="Last Name" aria-describedby="helpId" required>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="Your email address" aria-describedby="helpId" required>
        </div>
        <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" name="pwd" id="" class="form-control" placeholder="Password" aria-describedby="helpId" required>
        </div>
        <div class="form-group">
            <label for="pwd2">Confirm Password</label>
            <input type="password" name="pwd2" id="" class="form-control" placeholder="Password" aria-describedby="helpId" required>
        </div>

        <button type="submit" name="insert" class="btn btn-primary">Register</button>

    </form>
</div>
