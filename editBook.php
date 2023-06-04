<?php
require_once('includes/db.php');
require_once('includes/functions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id']) && is_numeric($_POST['book_id'])) {
    $selectQuery = "SELECT * FROM books_read WHERE id = '{$_POST['book_id']}'";
    $selectResult = mysqli_query($conn, $selectQuery);
    if (mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);

        $id         = $row['id'];
        $bookName   = $row['book'];
        $authorName = $row['author'];
        $dateRead   = new DateTime($row['book_read_date']);
        $dateRead   = $dateRead->format('d/m/Y');
        $coverImage = $row['book_cover'];
    }
} else {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tokencheck'] == $_SESSION['token']) {

        // Escape special characters, if an
        $id            = mysqli_real_escape_string($conn, $_POST['update_book_id']);
        $bookName      = mysqli_real_escape_string($conn, $_POST['bookName']);
        $authorName    = mysqli_real_escape_string($conn, $_POST['authorName']);
        $old_cover     = mysqli_real_escape_string($conn, $_POST['old_cover']);
        $dateRead      = mysqli_real_escape_string($conn, $_POST['dateRead']);
        $dateRead      = DateTime::createFromFormat('d/m/Y', $dateRead);
        $dateRead      = $dateRead->format('Y-m-d');

        if($_FILES['coverImage']['name'] != '')
        {
            $coverImage    = image_upload('coverImage');
        }
        else if($_FILES['coverImage']['name'] == '')
        {
            $coverImage = $old_cover;
        }

        if ($coverImage == false) {
            exit();
        }
        $sql = "UPDATE `books_read` SET 
                                    `book`='{$bookName}',
                                    `author`='{$authorName}',
                                    `book_read_date`='{$dateRead}',
                                    `book_cover`='{$coverImage}'
                                WHERE `id`='{$id}'";
        if (mysqli_query($conn, $sql)) {
            $err_type = 'success';
            $err_message = "Book Read data Updated successfully.";
            $dateRead   = new DateTime($dateRead);
            $dateRead   = $dateRead->format('d/m/Y');
        } else {
            $err_type = 'danger';
            $err_message = "Error ! ." . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "<script>window.location.href='listBook.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('includes/head_includes.inc.php'); ?>

    <title>Edit Book</title>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php require_once('includes/header.inc.php'); ?>
    <!-- End Header -->

    <!-- ======= Left Sidebar ======= -->
    <?php require_once('includes/left_side_bar.inc.php'); ?>


    <!-- End Left Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Edit Book</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Book</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <?php
                    if (isset($err_message)) {
                    ?>
                        <div class="alert alert-<?= $err_type ?> alert-dismissible fade show" role="alert">
                            <strong><?= $err_type == 'success' ? 'Success !' : 'Error !' ?></strong> <?= $err_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit this Book read record</h5>
                            <p>Please re-enter the required Book name, Author name and the Date(when book read completed) along with the book's cover image</p>

                            <!-- Custom Styled Validation -->
                            <form class="row g-3 needs-validation" enctype="multipart/form-data" method="post" action="" novalidate>
                                <?php
                                $token = rand();
                                $_SESSION['token'] = $token;
                                ?>
                                <input type="hidden" value="<?= $token; ?>" name="tokencheck" />
                                <input type="hidden" value="<?= $id; ?>" name="update_book_id" />

                                <div class="col-md-6">
                                    <label for="bookName" class="form-label">Book name</label>
                                    <input type="text" class="form-control" id="bookName" name="bookName" value="<?= $bookName ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter the Book name.
                                    </div>
                                    <label for="authorName" class="form-label">Author name</label>
                                    <input type="text" class="form-control" id="authorName" name="authorName" value="<?= $authorName ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter the Author name
                                    </div>
                                    <label for="dateRead" class="form-label">Date (read)</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control dateTimeFormat" id="dateRead" name="dateRead" value="<?= $dateRead ?>" aria-describedby="inputGroupPrepend" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter the Date
                                        </div>
                                    </div>
                                    <label for="coverImage" class="form-label">Cover Image</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="old_cover" value="<?=$coverImage?>" hidden>
                                        <input type="file" class="form-control" id="coverImage" name="coverImage" aria-describedby="inputGroupPrepend">
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                        <div class="invalid-feedback">
                                            Please choose a cover Image.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-center">
                                        <img src="<?= $coverImage ?>" alt="" height="300px">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div class="d-grid">
                                                <button class="btn btn-warning" type="submit">Update Book Record</button>
                                            </div>
                                        </div>
                                        <div class="col-4"></div>
                                    </div>
                                </div>
                            </form><!-- End Custom Styled Validation -->

                        </div>
                    </div>

                </div><!-- End Left side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    <?php require_once('includes/footer.inc.php'); ?>
</body>

</html>