<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="row justify-content-center">
    <div class="col-md-9 text-center text-light">
      <img src="https://seeklogo.com/images/R/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com.png" alt="AdminLTE Logo" class="rounded-circle" style="width: 50px; height: 50px;">
      <p class="mt-2 lead">المديرية الفرعية لدى محكمة الاستئناف بورزازات</p>
    </div>
  </div>
<div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

          <img src="https://media.istockphoto.com/id/1337144146/vector/default-avatar-profile-icon-vector.jpg?s=612x612&w=0&k=20&c=BIbFwuv7FxTWvh5S3vB6bkT0Qv8Vn8N5Ffseq84ClGI=" class="img-circle elevation-2" alt="User Image" >
        </div>
        <div class="info">
          <a href="/profile" class="d-block">{{ auth()->user()->Nom}} {{ auth()->user()->Prenom}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- Sidebar Menu -->

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
</a>
              </p>
            </a> </li>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="/fournisseurs" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Fournisseurs</p>
                </a>
                </li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
                <a href="/tirbunales" class="nav-link">
                  <i class="fas fa-balance-scale nav-icon"></i>
                  <p>Tribunale</p>
                </a></li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
                <a href="/marcher" class="nav-link">
                  <i class="far fa-handshake nav-icon"></i>
                  <p>Marché</p>
                </a></li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
                <a href="/categories" class="nav-link">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Catégorie</p>
                </a></li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
                <a href="/stocks" class="nav-link">
                  <i class="fas fa-database nav-icon"></i>
                  <p>Stock</p>
                </a></li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
                <a href="/commandes" class="nav-link">
                  <i class="fas fa-shopping-cart nav-icon"></i>
                  <p>Commande</p>
                </a></li>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                   <li class="nav-item">
            <a href="http://127.0.0.1:8000" class="nav-link">
            <i class="fas fa-sign-out-alt"></i>
              <p>
                logout
              </p>
            </a></li>
      <!-- /.sidebar-menu -->
    </div>
    </aside>
