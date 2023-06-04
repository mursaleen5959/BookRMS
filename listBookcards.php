<?php
require_once('includes/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once('includes/head_includes.inc.php'); ?>

  <title>Dashboard</title>
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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Books List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <div class="modal fade" id="BookDetailModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Book Record Viewing</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>
                <th>Book</th>
                <td id="modal_book">Book name here</td>
              </tr>
              <tr>
                <th>Author</th>
                <td id="modal_author">Author name here</td>
              </tr>
              <tr>
                <th>Date (book read)</th>
                <td id="modal_date">Author name here</td>
              </tr>
              <tr>
                <th>Repeat Count</th>
                <td id="modal_repeat">99</td>
              </tr>
              <tr>
                <td colspan="2">
                  <div class="text-center">
                    <img id="modal_cover" src="" alt="" width="250px">
                  </div>
                </td>
              </tr>
            </table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div><!-- End Large Modal-->

    <section class="section dashboard">
      <div class="row">

        <?php
        $sql = "SELECT * FROM `books_read` WHERE 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          $count_ = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $count_ += 1;
            // Format the date to dd/mm/yy
            $dateRead = new DateTime($row['book_read_date']);
            $dateRead = $dateRead->format('d/m/Y');
        ?>
            <div class="col-sm-2">
              <!-- Card with an image on top -->
              <div class="card">
                <img src="<?= $row['book_cover'] ?>" class="card-img-top" >
                <div class="card-body">
                  <table>
                    <tr>
                      <th colspan="2"><?=$count_?> - <?=$row['book']?></th>
                    </tr>
                    <tr>
                      <th style="color:grey">
                        <?=$row['author']?>
                      </th>
                    </tr>
                    <tr>
                      <th style="color:grey;font-size:smaller">
                        <?=$dateRead?>
                      </th>
                    </tr>
                    <tr>
                      <td class="text-end">
                      <form action='editBook.php' method='POST'>
                        <button style="padding:1px 3px" data-id="<?=$row['id']?>" type="button" class="bookView btn btn-sm btn-success"><i class="bi bi-eye-fill"></i></button>
                        <button style="padding:1px 3px" class='btn btn-sm btn-primary ms-1' name='book_id' value='<?=$row['id']?>'><i class='bi bi-pencil'></i></button>
                      </form>
                      </td>
                    </tr>
                  </table>
                </div>
              </div><!-- End Card with an image on top -->
            </div>
        <?php
          }
        } else {
          echo "0 results";
        }

        mysqli_close($conn);
        ?>


      </div>
    </section>

  </main><!-- End #main -->

  <?php require_once('includes/footer.inc.php'); ?>
</body>
<script>
  $(document).ready(function() {

    $(document).on('click', '.bookView', function() {
      var id = $(this).data('id');
      $.ajax({
        url: 'ajax/listBooksAjax.php',
        type: 'POST',
        data: {
          id: id,
          bookView: true
        },
        dataType: "json",
        success: function(response) {
          // Success function code
          console.log(response); // Output the response to the console
          $('#modal_book').html(response[0].book);
          $('#modal_author').html(response[0].author);
          var book_read_date = response[0].book_read_date;
          // Split the date string into an array
          var parts = book_read_date.split('-');
          // Rearrange the array elements to form the desired format
          var book_read_date = parts[2] + '/' + parts[1] + '/' + parts[0];
          $('#modal_date').html(book_read_date);
          $('#modal_repeat').html(response[0].repeat_count);
          $('#modal_cover').attr('src', response[0].book_cover);

          $('#BookDetailModal').modal('show');
        }
      });
    })
  });
</script>

</html>