<?php 
$root = "C:/xampp/htdocs/ecommerce/";
include $root."common/connection.php";
// include $root."common/authenticate.php";
include $root."common/header.php";

// Get the current page URL
$current_url = $_SERVER['REQUEST_URI'];

function isCurrentPage($page) {
    global $current_url;
    return strpos($current_url, $page) !== false;
}
?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; min-height: 100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Admin <i class="fa-solid fa-user-tie"></i></span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ecommerce/admin/dashboard.php" class="nav-link text-white <?php echo isCurrentPage('dashboard') ? 'active' : ''; ?>" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Dashboard <i class="fa-solid fa-house"></i>
        </a>
      </li>
      <li>
        <a href="#" class="nav-link text-white <?php echo isCurrentPage('orders') ? 'active' : ''; ?>">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Orders <i class="fa-solid fa-sack-dollar"></i>
        </a>
      </li>
      <li>
        <a href="/ecommerce/admin/product.php" class="nav-link text-white <?php echo isCurrentPage('product') ? 'active' : ''; ?>">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
          Products
          <i class="fa-solid fa-gift"></i>
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
</div>
<?php include $root."common/footer.php" ?>