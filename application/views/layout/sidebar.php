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
          <li class="nav-item"><a href="<?= base_url('MyProfile') ?>" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
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
        <li class="nav-item <?= $this->uri->segment(2) == 'role' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/Role') ?>" class="nav-link"><i data-feather="activity"></i> <span>Role</span></a></li>
        <li class="nav-item <?= $this->uri->segment(2) == 'cabang' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/Cabang') ?>" class="nav-link"><i data-feather="activity"></i> <span>Cabang</span></a></li>
        <li class="nav-item <?= $this->uri->segment(2) == 'gudang' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/Gudang') ?>" class="nav-link"><i data-feather="activity"></i> <span>Gudang</span></a></li>
        <li class="nav-item <?= $this->uri->segment(2) == 'pelanggan' ? 'active' : null ?>"><a href="<?= base_url('Masterdata/Pelanggan') ?>" class="nav-link"><i data-feather="activity"></i> <span>Pelanggan</span></a></li>

        <li class="nav-label mg-t-25">Task IT</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Task' ? 'active' : null ?>"><a href="<?= base_url('Task') ?>" class="nav-link"><i data-feather="bookmark"></i> <span>List Tugas</span></a></li>
        <!-- <li class="nav-item <?= $this->uri->segment(1) == 'Remainder' ? 'active' : null ?>"><a href="<?= base_url('Remainder') ?>" class="nav-link"><i data-feather="clock"></i> <span>Remainder</span></a></li> -->

        <!-- Section Reservasi -->
        <li class="nav-label mg-t-25">Kompetensi</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Kompetensi' ? 'active' : null ?>"><a href="<?= base_url('Kompetensi') ?>" class="nav-link"><i data-feather="meh"></i> <span>Kompetensi</span></a></li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Human_error' ? 'active' : null ?>"><a href="<?= base_url('Human_error') ?>" class="nav-link"><i data-feather="meh"></i> <span>Human Error</span></a></li>

        <li class="nav-label mg-t-25">Pengajuan</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Pengajuan_fasilitas_bengkel' ? 'active' : null ?>"><a href="<?= base_url('Pengajuan_fasilitas_bengkel') ?>" class="nav-link"><i data-feather="box"></i> <span>Fasilitas Bengkel</span></a></li>

        <li class="nav-label mg-t-25">Persediaan Barang</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Stock_barang' ? 'active' : null ?>"><a href="<?= base_url('Stock_barang') ?>" class="nav-link"><i data-feather="layers"></i> <span>Stock Barang</span></a></li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Stock_barang' ? 'active' : null ?>"><a href="<?= base_url('Stock_barang') ?>" class="nav-link"><i data-feather="layers"></i> <span>Barang Masuk</span></a></li>

        <li class="nav-label mg-t-25">Reservasi</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Reservasi_mobil' ? 'active' : null ?>"><a href="<?= base_url('Reservasi_mobil') ?>" class="nav-link"><i data-feather="award"></i> <span>Reservasi Mobil</span></a></li>

        <li class="nav-label mg-t-25">Landing Control</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'control_landing' && $this->uri->segment(2) == 'Artikel' ? 'active' : null ?>"><a href="<?= base_url('control_landing/Artikel') ?>" class="nav-link"><i data-feather="file-text"></i> <span>Artikel</span></a></li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Contact_messages' ? 'active' : null ?>"><a href="<?= base_url('Contact_messages') ?>" class="nav-link"><i data-feather="mail"></i> <span>Pesan Kontak</span></a></li>

        <!-- Section Document -->
        <!-- <li class="nav-label mg-t-25">Document</li>
        <li class="nav-item <?= $this->uri->segment(1) === 'Document' && $this->uri->segment(2) === 'list'  ? 'active' : null ?>"><a href="<?= base_url('Document/list') ?>" class="nav-link"><i data-feather="download"></i> <span>Daftar Dokumen</span></a></li>
        <li class="nav-item <?= $this->uri->segment(1) === 'Document' && $this->uri->segment(2) === 'category' ? 'active' : null ?>"><a href="<?= base_url('Document/category') ?>" class="nav-link"><i data-feather="navigation"></i> <span>Category</span></a></li> -->

      <?php endif; ?>

      <?php if ($users->id_role == 5) : ?>
        <li class="nav-label mg-t-25">Task </li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Task' ? 'active' : null ?>"><a href="<?= base_url('Task') ?>" class="nav-link"><i data-feather="bookmark"></i> <span>List Tugas</span></a></li>
      <?php endif; ?>

      <?php if ($users->id_role == 7) : ?> <!-- role staff admin -->
        <li class="nav-label mg-t-25">Pengajuan</li>
        <li class="nav-item <?= $this->uri->segment(1) == 'Pengajuan_fasilitas_bengkel' ? 'active' : null ?>"><a href="<?= base_url('Pengajuan_fasilitas_bengkel') ?>" class="nav-link"><i data-feather="box"></i> <span>Fasilitas Bengkel</span></a></li>
      <?php endif; ?>

      <a href="<?= base_url('Logout') ?>" class="btn btn-danger btn-block mt-3" id="logout"><i data-feather="log-out" class="text-white"></i> LOGOUT</a>
    </ul>
  </div>
</aside>