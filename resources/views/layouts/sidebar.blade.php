<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgb(44, 103, 174);">


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="{{asset('assets/dist/img/favicon.png')}}" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <div class="info">
        <a href="#" class="d-block">Dashboard Naive Bayes</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Data Training -->
        <li class="nav-item">
          <a href="/DataTrainingCuaca" class="nav-link {{Request::is('DataTrainingCuaca') ? 'active' : ''}}">
            <i class="fas fa-school"></i>
            <p>
              Data Training Cuaca
            </p>
          </a>
        </li>
        <!-- Data Training  -->

        <!-- Data Uji -->
        <li class="nav-item">
          <a href="/DataUjiCuaca" class="nav-link {{Request::is('DataUjiCuaca') ? 'active' : ''}}">
            <i class="fas fa-school"></i>
            <p>
              Uji Metode
            </p>
          </a>
        </li>
        <!-- Data Uji  -->

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>