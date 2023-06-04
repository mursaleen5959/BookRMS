<?php
require_once('includes/db.php');
require_once('includes/functions.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tokencheck'] == $_SESSION['token']) {

  // Escape special characters, if any
  $bookName      = mysqli_real_escape_string($conn, $_POST['bookName']);
  $authorName    = mysqli_real_escape_string($conn, $_POST['authorName']);
  $dateRead      = mysqli_real_escape_string($conn, $_POST['dateRead']);
  $dateRead      = DateTime::createFromFormat('d/m/Y', $dateRead);
  $dateRead      = $dateRead->format('Y-m-d');

  $coverImage    = image_upload('coverImage');

  // Check if the name already exists in the database
  $selectQuery = "SELECT COUNT(*) FROM books_read WHERE book = '$bookName'";
  $selectResult = mysqli_query($conn, $selectQuery);
  $row = mysqli_fetch_row($selectResult);
  $count = $row[0];

  if ($count == 0) {
    if ($coverImage == false) {
      exit();
    }
    $sql = "INSERT INTO `books_read`(`book`, `author`, `book_read_date`, `book_cover`) 
    VALUES ('{$bookName}','{$authorName}','{$dateRead}','{$coverImage}')";
    if (mysqli_query($conn, $sql)) {
      $err_type = 'success';
      $err_message = "Book Read data inserted successfully.";
    } else {
      $err_type = 'danger';
      $err_message = "Error ! ." . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    $err_type = 'danger';
    $err_message = "Book with this Name already exists in the database";
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('includes/head_includes.inc.php'); ?>

  <title>Add Book</title>
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
      <h1>Add Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Add Book</li>
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
              <h5 class="card-title">Add new Book read record</h5>
              <p>Please enter the Book name, Author name and the Date(when book read completed) along with the book's cover image</p>

              <!-- Custom Styled Validation -->
              <form class="row g-3 needs-validation" enctype="multipart/form-data" method="post" action="" novalidate>
                <?php
                $token = rand();
                $_SESSION['token'] = $token;
                ?>
                <input type="hidden" value="<?= $token; ?>" name="tokencheck" />
                <div class="col-md-6">
                  <label for="bookName" class="form-label">Book name</label>
                  <input type="text" class="form-control" id="bookName" name="bookName" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please enter the Book name.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="authorName" class="form-label">Author name</label>
                  <input type="text" class="form-control" id="authorName" name="authorName" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                  <div class="invalid-feedback">
                    Please enter the Author name
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="dateRead" class="form-label">Date (read)</label>
                  <div class="input-group has-validation">
                    <input type="text" class="form-control dateTimeFormat" id="dateRead" name="dateRead" aria-describedby="inputGroupPrepend" required>
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please enter the Date
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="coverImage" class="form-label">Cover Image</label>
                  <div class="input-group has-validation">
                    <input type="file" class="form-control" id="coverImage" name="coverImage" aria-describedby="inputGroupPrepend">
                    <div class="valid-feedback">
                      Looks good!
                    </div>
                    <div class="invalid-feedback">
                      Please choose a cover Image.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                      <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Save Book Read</button>
                      </div>
                    </div>
                    <div class="col-4"></div>
                  </div>
                </div>
              </form><!-- End Custom Styled Validation -->

            </div>
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <!-- <div class="col-lg-4"></div> -->
        <?php //require_once('includes/right_side_column.inc.php');
        ?>
        <!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php require_once('includes/footer.inc.php'); ?>
</body>

</html>