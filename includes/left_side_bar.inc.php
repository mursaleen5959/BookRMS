<?php 

// $page = end(explode("/",$_SERVER["PHP_SELF"]));
$path_parts = explode('/', $_SERVER['PHP_SELF']);
$page = end($path_parts);

?>

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link <?=$page=='index.php'?'':'collapsed';?>" href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <!-- End Dashboard Nav -->


  <li class="nav-item">
    <a class="nav-link <?=$page=='addBook.php'?'':'collapsed';?>" href="addBook.php">
      <i class="bi bi-book"></i>
      <span>Add Book</span>
    </a>
  </li>
  <!-- End Add book Page Nav -->

  <li class="nav-item">
    <a class="nav-link <?=$page=='listBook.php'?'':'collapsed';?>" href="listBook.php">
      <i class="bi bi-card-list"></i>
      <span>Books List (DataTable)</span>
    </a>
  </li>
  <!-- End BookList Page Nav -->
  <li class="nav-item">
    <a class="nav-link <?=$page=='listBookcards.php'?'':'collapsed';?>" href="listBookcards.php">
      <i class="bi bi-card-list"></i>
      <span>Books List (Cards)</span>
    </a>
  </li>
  <!-- End Login Page Nav -->


</ul>

</aside>