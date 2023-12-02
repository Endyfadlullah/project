<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-chart-pie"></i>
      </div>
      <div class="sidebar-brand-text mx-3">GlobalTech</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Transaksi
    </div>

    <!-- Pendapatan -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="pendapatan.php">
        <i class="fas fa-fw fa-arrow-up"></i>
        <span>Pendapatan</span>
      </a>
    </li>

    <!-- Pengeluaran -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="pengeluaran.php">
        <i class="fas fa-fw fa-arrow-down"></i>
        <span>Pengeluaran</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Data
    </div>

    <!-- Karyawan -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="karyawan.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Karyawan</span>
      </a>
    </li>

    <!-- Supplier -->
    <li class="nav-item">
      <a class="nav-link" href="supplier.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Supplier</span></a>
    </li>

    <!-- Customer -->
    <li class="nav-item">
      <a class="nav-link" href="customer.php">
        <i class="fas fa-fw fa-users"></i>
        <span>Customer</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Laporan
    </div>
    <!-- Laporan Keuangan -->
    <li class="nav-item">
      <a class="nav-link" href="laporan.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Laporan Keuangan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <style>
      .nav-item.active .fas::before{
        color: #7071E8;
      }
      .sidebar .nav-item.active>.nav-link{
        background-color: #ffffff;
        color: #7071E8;
      }
    </style>

    <script>
      // Ambil URL saat ini
      const currentLocation = window.location.href;

      // Ambil semua link di sidebar
      const sidebarLinks = document.querySelectorAll('#accordionSidebar a.nav-link');

      // Loop melalui setiap link di sidebar
      sidebarLinks.forEach(link => {
        // Jika link pada sidebar sesuai dengan URL saat ini, tambahkan kelas 'active'
        if (link.href === currentLocation) {
          link.classList.add('active');

          // Jika link merupakan submenu, tambahkan juga kelas 'show' ke parent item submenu
          const parentItem = link.parentElement;
          if (parentItem.classList.contains('nav-item')) {
            parentItem.classList.add('active');
          }
        }
      });
    </script>