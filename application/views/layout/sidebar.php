<?php $users = $this->db->where('id_user', $this->session->userdata('id_user'))->get('v_users')->row(); ?>
<aside class="aside aside-fixed">
  <div class="aside-header">
    <a href="javascript:void(0)" class="aside-logo ">MILALA<span>CENTER</span></a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">
    <div class="aside-loggedin">
      <div class="d-flex align-items-center justify-content-start">
        <a href="" class="avatar"><img src="<?= base_url($users->img_usr != '' ? 'upload/users/' . $users->img_usr : 'assets/img/milala_logo.png') ?>" class="rounded-circle" alt=""></a>
        <!-- <div class="aside-alert-link">
          <a href="<?= base_url('notification/list') ?>" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>
        </div> -->
      </div>
      <div class="aside-loggedin-user">
        <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
          <h6 class="tx-semibold mg-b-0"><?= $users->fullname ?></h6>
          <i data-feather="chevron-down"></i>
        </a>
        <p class="tx-color-03 tx-12 mg-b-0"><?= $users->nama_role ?></p>
      </div>
      <div class="collapse" id="loggedinMenu">
        <ul class="nav nav-aside mg-b-0">
          <li class="nav-item"><a href="<?= base_url('myprofile') ?>" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
          <li class="nav-item"><a href="<?= base_url('HistoryLogin') ?>" class="nav-link"><i data-feather="refresh-ccw"></i> <span>History Login</span></a></li>
          <li class="nav-item"><a href="<?= base_url('logout') ?>" class="nav-link"><i data-feather="log-out"></i> <span>Log Out</span></a></li>
        </ul>
      </div>
    </div><!-- aside-loggedin -->
    <ul class="nav nav-aside">
      <li class="nav-item <?= $this->uri->segment(1) == 'home' ? 'active' : null ?>"><a href="<?= base_url('home') ?>" class="nav-link"><i data-feather="home"></i> <span>Dashboard</span></a></li>

      <!-- Role Administrator -->
      <?php if ($users->id_role == 1) : ?>
        <!-- Section Notifikasi -->
        <li class="nav-label mg-t-25">Notifikasi</li>
        <?php $countNotification = $this->db->where('to_user_id', $this->session->userdata('id_user'))->where('read_notif','0')->get('notification')->num_rows(); ?>
        <li class="nav-item <?= $this->uri->segment(1) == 'notification' ? 'active' : null ?>"><a href="<?= base_url('notification') ?>" class="nav-link"><i data-feather="bell"></i> <span>Notification <span class="badge badge-sm badge-danger"><?= $countNotification ?></span> </span></a></li>
        
        <!-- Data Master -->
        <li class="nav-label mg-t-25">Data Master</li>
        <li class="nav-item <?= $this->uri->segment(2) == 'user' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/user') ?>" class="nav-link"><i data-feather="activity"></i> <span>Users</span></a></li>
        <li class="nav-item <?= $this->uri->segment(2) == 'role' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/role') ?>" class="nav-link"><i data-feather="activity"></i> <span>Role</span></a></li>

        <li class="nav-label mg-t-25">Task </li>
        <li class="nav-item <?= $this->uri->segment(1) == 'foto' ? 'task' : null ?>"><a href="<?= base_url('Task') ?>" class="nav-link"><i data-feather="bookmark"></i> <span>List Tugas</span></a></li>
        <li class="nav-item <?= $this->uri->segment(1) == 'foto' ? 'remainder' : null ?>"><a href="<?= base_url('Remainder') ?>" class="nav-link"><i data-feather="clock"></i> <span>Remainder</span></a></li>

        <!-- Section Reservasi -->
        <li class="nav-label mg-t-25">Reservasi</li>
        <li class="nav-item <?= $this->uri->segment(2) == 'foto' ? 'active' : null ?>"><a href="<?= base_url('Reservasi_mobil') ?>" class="nav-link"><i data-feather="award"></i> <span>Reservasi Mobil</span></a></li>

        <!-- Section Document -->
        <!-- <li class="nav-label mg-t-25">Document</li>
        <li class="nav-item <?= $this->uri->segment(1) === 'Document' && $this->uri->segment(2) === 'list'  ? 'active' : null ?>"><a href="<?= base_url('Document/list') ?>" class="nav-link"><i data-feather="download"></i> <span>Daftar Dokumen</span></a></li>
        <li class="nav-item <?= $this->uri->segment(1) === 'Document' && $this->uri->segment(2) === 'category' ? 'active' : null ?>"><a href="<?= base_url('Document/category') ?>" class="nav-link"><i data-feather="navigation"></i> <span>Category</span></a></li> -->

        <!-- Settings -->
        <li class="nav-label mg-t-25">Settings</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'bantuan' ? 'active' : null ?>"><a href="<?= base_url('bantuan') ?>" class="nav-link"><i data-feather="alert-triangle"></i> <span>Bantuan</span></a></li>
      <?php endif; ?>
      
      <?php if ($users->id_role == 5) : ?>
        <li class="nav-label mg-t-25">Data</li>
        <li class="nav-item <?= $this->uri->segment(2) == 'user' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/user') ?>" class="nav-link"><i data-feather="users"></i> <span>Sub Koordinator</span></a></li>
        <li class="nav-item <?= $this->uri->segment(2) == 'Calon_pemilih' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/Calon_pemilih') ?>" class="nav-link"><i data-feather="users"></i> <span>Input Calon Pemilih</span></a></li>
      <?php endif; ?>

      <?php if ($users->id_role == 7) : ?>
        <li class="nav-label mg-t-25">Data</li>
        <li class="nav-item <?= $this->uri->segment(2) == 'Calon_pemilih' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/Calon_pemilih') ?>" class="nav-link"><i data-feather="users"></i> <span>Input Calon Pemilih</span></a></li>
      <?php endif; ?>

      <?php if ($users->id_role == 8) : ?>
        <li class="nav-label mg-t-25">Data Saksi TPS</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'suara_tps' ? 'active' : null ?>"><a href="<?= base_url('suara_tps') ?>" class="nav-link"><i data-feather="users"></i> <span>Input Suara TPS</span></a></li>
      <?php endif; ?>

      <button class="btn btn-danger btn-block mt-3" id="logout"><i data-feather="log-out" class="text-white"></i> LOGOUT</button>
    </ul>
  </div>
</aside>