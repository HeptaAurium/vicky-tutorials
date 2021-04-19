<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $action ?></title>
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <!-- Nav tabs -->
    <div class="col-sm-12 col-md-8 col-lg-6 rounded mx-auto my-3">
        <ul class="nav nav-tabs" id="navId">
            <li class="nav-item">
                <a href="index.php" class="nav-link <?php if ($active == 'create') echo "active"; ?>">Create</a>
            </li>
            <li class="nav-item">
                <a href="/show.php" class="nav-link  <?php if ($active == 'show') echo "active"; ?>">Read</a>
            </li>
            <li class="nav-item">
                <a href="/edit.php" class="nav-link disabled  <?php if ($active == 'edit') echo "active"; ?>">Update</a>
            </li>
        </ul>
    </div>