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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Total Read Count Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total Read Count <span>| All time</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-plus-circle"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $sql = "SELECT COUNT(*) AS total_records FROM books_read";
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_assoc($result);
                      echo "<h6>{$row['total_records']}</h6>";
                      ?>
                      <!-- <h6>145</h6> -->
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Revenue <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reading Report <span>/Yearly</span></h5>

                  <!-- Line Chart -->
                  <div id="bookChart"></div>

                  <script>
                    // Fetch data from PHP endpoint
                    fetch('ajax/yearCount.php')
                      .then(response => response.json())
                      .then(data => {
                        // Extract labels and series data from the fetched data
                        // console.log(response);
                        const labels = data.map(item => item.year);
                        const series = data.map(item => item.record_count);

                        // Create the column chart using ApexCharts.js
                        const options = {
                          chart: {
                            type: 'bar',
                            height: 400,
                          },
                          series: [{
                            name: 'Books Read',
                            data: series
                          }],
                          labels: {
                            style: {
                              colors: ['black']
                            }
                          },
                          xaxis: {
                            categories: labels
                          }
                        };

                        const chart = new ApexCharts(document.querySelector("#bookChart"), options);
                        chart.render();
                      });
                  </script>

                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

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