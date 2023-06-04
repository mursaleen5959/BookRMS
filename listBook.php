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
                        <img  id="modal_cover" src="" alt="" width="250px">
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

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Books List</h5>
              <p>Here is the list of all the books read until now.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Book</th>
                    <th scope="col">Author</th>
                    <th scope="col">Date (Read)</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `books_read` WHERE 1";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $count_ = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                      $count_ += 1;
                      echo "<tr>";
                      // echo "<th scope='row'>{$row['id']}</th>";
                      echo "<th scope='row'>{$count_}</th>";
                      echo "<td>{$row['book']}</td>";
                      echo "<td>{$row['author']}</td>";
                      // Format the date to dd/mm/yy
                      $dateRead = new DateTime($row['book_read_date']);
                      $dateRead = $dateRead->format('d/m/Y');

                      echo "<td>{$dateRead}</td>";
                      echo "<td><img src='{$row['book_cover']}' height='90px'></td>";
                      echo "<td>";
                      echo "<form action='editBook.php' method='POST'>";
                      echo '<button data-id="'.$row['id'].'" type="button" class="bookView btn btn-success"><i class="bi bi-eye-fill"></i></button>';
                      echo "<button class='btn btn-primary ms-2' name='book_id' value='{$row['id']}'><i class='bi bi-pencil'></i></button>";
                      echo "</form>";
                      echo "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "0 results";
                  }

                  mysqli_close($conn);
                  ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

  <?php require_once('includes/footer.inc.php'); ?>
</body>
<script>
  $(document).ready(function() {

    $(document).on('click','.bookView',function () {      
      var id = $(this).data('id');
      $.ajax({
        url: 'ajax/listBooksAjax.php',
        type: 'POST',
        data: {
          id: id,
          bookView:true
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
          $('#modal_cover').attr('src',response[0].book_cover);

          $('#BookDetailModal').modal('show');
        }
      });
    })
  });
</script>

</html>