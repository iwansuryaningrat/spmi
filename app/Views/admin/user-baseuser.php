<?= $this->extend('template/adminlayout'); ?>

<?= $this->section('admin'); ?>

<div class="container-fluid container__fluid pb-0">
  <div class="header__main-nav">
    <div class="header__main-nav-btn">
      <div id="header-main-nav-btn-i" class="line__humberger">
        <span class="line__menu line-1" id="line1"></span>
        <span class="line__menu line-2" id="line2"></span>
        <span class="line__menu line-3" id="line3"></span>
      </div>
    </div>
    <div class="header__main-nav-profile">
      <div class="nav-profile__photo">
        <img src="/profile/<?= $usersession['foto']; ?>" alt="profile-picture" id="photo-dropdown" />
      </div>
      <div class="nav-profile__desc">
        <p id="profileName" class="ellipsis__text"><?php if ($usersession['nama'] != null && $usersession['nama'] != "") {
                                                      echo $usersession['nama'];
                                                    } else {
                                                      echo $usersession['username'];
                                                    } ?></p>
        <p id="profileStatus" class="ellipsis__text">Administrator</p>
      </div>
      <div class="nav-profile__btn">
        <i class="fi-br-angle-down" id="btn-dropdown"></i>
      </div>
    </div>

    <div class="header__main-nav-dropdown" id="header-main-nav-dropdown">
      <p class="nav-dropdown__title">Pengaturan Profil</p>
      <p class="d-flex align-items-center">
        <a href="/admin/profile" class="d-block">Lihat Profil</a>
      </p>
      <hr />
      <p class="d-flex align-items-center">
        <i class="fa-solid fa-arrow-right-from-bracket d-flex"></i>
        <a href="/logout" class="d-block">Log out</a>
      </p>
    </div>
  </div>

  <div class="header__main-title">
    <div class="header__main-title__pagination">
      <a href="/admin/index">Dashboard</a>
      / Base User
    </div>
    <div class="header__main-title__subtitle">
      <div class="title__subtitle-desc">
        <h1>Base User</h1>
        <p>
          Halo <span><?= $usersession['nama']; ?></span>, selamat datang di dashboard base user
        </p>
      </div>
    </div>
  </div>

  <!--========== body main ==========-->
  <div class="title__table__add">
    <h4 class="title__body__user">Daftar Base User</h4>
    <a href="/admin/addUser" class="btn shadow-none btn__add btn__dark">
      <i class="fa-solid fa-plus"></i>
      Add User
    </a>
  </div>

  <!-- table indikator -->
  <div class="sipmpp__table">
    <div class="table-responsive">
      <table class="table table__user__content sipmpp__table-content table-hover">
        <thead class="bg__light">
          <tr>
            <th class="table__user-number">No</th>
            <th class="table__user-fullname">Nama Lengkap</th>
            <th class="table__user-username">Username</th>
            <th class="table__user-email">email</th>
            <th class="table__user-nip">nip</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Adi Wibowo</td>
            <td>bowo.informatika</td>
            <td>adiwibowo@lecturer.undip.ac.id</td>
            <td>2406011912001234</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Iwan Budi Kusumaningrat Jayabaya</td>
            <td>iwanjayabaya.informatika</td>
            <td>iwanjayabaya@lecturer.undip.ac.id</td>
            <td>2406011912001289</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<script>
  // dropdown
  $(document).click((e) => {
    if (
      e.target.id !== "header-main-nav-dropdown" &&
      e.target.id !== "btn-dropdown" &&
      e.target.id !== "photo-dropdown"
    ) {
      $("#header-main-nav-dropdown").removeClass("active");
    }
  });
  $("#btn-dropdown").click(() => {
    $("#header-main-nav-dropdown").toggleClass("active");
  });
  $("#photo-dropdown").click(() => {
    $("#header-main-nav-dropdown").toggleClass("active");
  });
</script>

<?= $this->endSection(); ?>