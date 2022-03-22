<?= $this->extend('template/userlayout'); ?>

<?= $this->section('user'); ?>

<div class="container-fluid container__fluid">
  <div class="header__main-nav">
    <div class="header__main-nav-btn">
      <!-- <i class="fi-br-menu-burger" id="header-main-nav-btn-i"></i> -->
      <div id="header-main-nav-btn-i" class="line__humberger">
        <span class="line__menu line-1" id="line1"></span>
        <span class="line__menu line-2" id="line2"></span>
        <span class="line__menu line-3" id="line3"></span>
      </div>
    </div>
    <div class="header__main-nav-profile">
      <div class="nav-profile__photo">
        <img src="/profile/<?= $data_user['foto']; ?>" alt="profile-picture" id="photo-dropdown" />
      </div>
      <div class="nav-profile__desc">
        <p id="profileName"><?php if ($data_user['nama'] != null && $data_user['nama'] != "") {
                              echo $data_user['nama'];
                            } else {
                              echo $data_user['username'];
                            } ?></p>
        <p id="profileEmail"><?= $data_user['email']; ?></p>
      </div>
      <div class="nav-profile__btn">
        <i class="fi-br-angle-down" id="btn-dropdown"></i>
      </div>
    </div>

    <div class="header__main-nav-dropdown" id="header-main-nav-dropdown">
      <p class="nav-dropdown__title">Pengaturan Profil</p>
      <p class="d-flex align-items-center">
        <a href="profil.html" class="d-block">Lihat Profil</a>
      </p>
      <hr />
      <p class="d-flex align-items-center">
        <i class="fa-solid fa-arrow-right-from-bracket d-flex"></i>
        <a href="/logout" class="d-block">Log out</a>
      </p>
    </div>
  </div>

  <div class="header__main-title">
    <div class="header__main-title__pagination">Dashboard</div>
    <div class="header__main-title__subtitle">
      <div class="title__subtitle-desc">
        <h1>Dashboard Overview</h1>
        <p>Halo <span><?= $data_user['nama']; ?></span>, selamat datang kembali!</p>
      </div>
      <div class="title__subtitle-btn">
        <a href="report.html" class="report__link big__btn">
          <img src="/assets/img/icon/report-icon.svg" alt="icon-report" />
          <span>Report</span>
        </a>
      </div>
    </div>
  </div>

  <!-- body main -->
  <!-- progress pengisian -->
  <div class="progress__content">
    <div class="progress__content-card mb-3 mb-sm-0" id="progress-data-induk">
      <div class="d-flex align-items-center mb-4">
        <div class="progress__icon-warp">
          <img src="/assets/img/logo-data-induk.svg" alt="logo-data-induk" />
        </div>
        <h5 class="mb-0 card__title">Pengisian Data Induk</h5>
      </div>

      <div class="progress__content-progress">
        <div class="progress__content-progress-desc">
          <p>Task Complete</p>
          <p>72%</p>
        </div>
        <div>
          <div class="progress progress__content-progress-bar">
            <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%" data-bs-toggle="tooltip" data-bs-placement="top" title="72%"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="progress__content-card" id="progress-spmi">
      <div class="d-flex align-items-center mb-4">
        <div class="progress__icon-warp">
          <img src="/assets/img/logo-spmi.svg" alt="logo-spmi" />
        </div>
        <h5 class="mb-0 card__title">Pengisian Nilai SPMI</h5>
      </div>

      <div class="progress__content-progress">
        <div class="progress__content-progress-desc">
          <p>Task Complete</p>
          <p>5/12 Standar (42%)</p>
        </div>
        <div>
          <div class="progress progress__content-progress-bar">
            <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100" style="width: 42%" data-bs-toggle="tooltip" data-bs-placement="top" title="42%"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- rekap content -->
  <div class="recap__content">
    <!-- left -->
    <div class="recap__content-link">
      <div class="recap__link-card">
        <div class="recap__link-card__body">
          <img src="/assets/img/penelitian-logo.svg" alt="penelitian-logo" />
          <h5 class="card__title mb-0 ellipsis__text">Penelitian</h5>
        </div>
        <div class="recap__link-card__footer">
          <a href="#">
            <span class="ellipsis__text">Selengkapnya</span>
            <i class="bi bi-arrow-right-circle d-flex"></i>
          </a>
        </div>
      </div>

      <div class="recap__link-card">
        <div class="recap__link-card__body">
          <img src="/assets/img/pengabdian-masyarakat-logo.svg" alt="penelitian-logo" />
          <h5 class="card__title mb-0 ellipsis__text">
            Pengabdian Masyarakat
          </h5>
        </div>
        <div class="recap__link-card__footer">
          <a href="#">
            <span class="ellipsis__text">Selengkapnya</span>
            <i class="bi bi-arrow-right-circle d-flex"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- right -->
    <div class="recap__content-unit">
      <div class="recap__table">
        <h5 class="card__title mb-0">Daftar Unit</h5>
        <div class="table__unit table-responsive">
          <table class="table table__unit__content table-hover">
            <thead>
              <tr>
                <th class="table__unit__head__number">no</th>
                <th class="table__unit__head__unit">unit</th>
                <th class="table__unit__head__progress">progress</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td><a href="#" class="unit__link">S1 Informatika</a></td>
                <td>
                  <div class="progress table__unit__progress">
                    <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%" data-bs-toggle="tooltip" data-bs-placement="top" title="60%"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td><a href="#" class="unit__link">S1 Matematika</a></td>
                <td>
                  <div class="progress table__unit__progress">
                    <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%" data-bs-toggle="tooltip" data-bs-placement="top" title="90%"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td><a href="#" class="unit__link">S1 Statistika</a></td>
                <td>
                  <div class="progress table__unit__progress">
                    <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%" data-bs-toggle="tooltip" data-bs-placement="top" title="75%"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>
                  <a href="#" class="unit__link">S1 Teknik Lingkungan</a>
                </td>
                <td>
                  <div class="progress table__unit__progress">
                    <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%" data-bs-toggle="tooltip" data-bs-placement="top" title="30%"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td><a href="#" class="unit__link">S1 Kedokteran</a></td>
                <td>
                  <div class="progress table__unit__progress">
                    <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%" data-bs-toggle="tooltip" data-bs-placement="top" title="45%"></div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td>
                  <a href="#" class="unit__link">S1 Kesehatan Masyarakat</a>
                </td>
                <td>
                  <div class="progress table__unit__progress">
                    <div class="progress-bar bg__dark-main unit__progressbar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%" data-bs-toggle="tooltip" data-bs-placement="top" title="100%"></div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('userscript'); ?>
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

  // tooltips
  // progress bar unit
  const tooltipsUnitProgress =
    document.querySelectorAll(".unit__progressbar");
  tooltipsUnitProgress.forEach((t) => {
    new bootstrap.Tooltip(t);
  });
</script>
<?= $this->endSection(); ?>