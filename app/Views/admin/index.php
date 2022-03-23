<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard SIPMPP Admin | UNDIP</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/solid.css" integrity="sha384-ltWlpN+Dl8XfKEnC9oW+dDRF8Z7jsYkxQ/WMRoJ2VHH5G2nQZ4if2NWwmV0ybzZ7" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/fontawesome.css" integrity="sha384-RLM8Rxp/DcBfCfSI3bGwwoMMxxy34D2e58WAqXmmdnh0WYlAQ8jeOB3A1ed5KUSm" crossorigin="anonymous" />
  <!-- uicons icon -->
  <link rel="stylesheet" href="/admin/assets/vendor/uicons-bold-rounded/css/uicons-bold-rounded.css" />
  <!-- custom -->
  <link rel="stylesheet" href="/admin/assets/css/styles-admin-dashboard.css" />
</head>

<body>
  <!-- sidebar -->
  <div class="position-relative">
    <div class="sidebar__content" id="sidebar-content">
      <!-- brand and navigations -->
      <div>
        <!-- brand -->
        <div class="sidebar__content-brand">
          <a href="admin-dashboard.html" class="d-flex align-items-center">
            <img src="/admin/assets/img/undip-logo-color.png" alt="logo-undip" />
            <h4>SIPMPP UNDIP</h4>
          </a>
        </div>

        <!-- navigation -->
        <div class="sidebar__content-nav">
          <ul class="sidebar-nav__list">
            <li>
              <a href="admin-dashboard.html" class="nav__list__link active">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a class="nav__list__link-dropdown" data-bs-toggle="collapse" href="#user-collapse" role="button" aria-expanded="false" aria-controls="user-collapse">
                <div class="link-dropdown__sidebar">
                  <i class="fa-solid fa-id-card-clip"></i>
                  <span>User</span>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
              </a>

              <!-- dropdown -->
              <div class="collapse collapse__dropside" id="user-collapse">
                <ul class="sidebar-nav__list-collapse">
                  <li>
                    <a href="admin-base-user.html" class="nav__list__link-collapse ellipsis__text">Base User</a>
                  </li>
                  <li>
                    <a href="admin-auditor.html" class="nav__list__link-collapse ellipsis__text">Auditor</a>
                  </li>
                  <li>
                    <a href="admin-leader.html" class="nav__list__link-collapse ellipsis__text">Leader</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="admin-unit.html" class="nav__list__link">
                <i class="fa-solid fa-building-columns"></i>
                <span>Unit</span>
              </a>
            </li>
            <li>
              <a href="admin-data-induk.html" class="nav__list__link">
                <i class="fa-solid fa-book"></i>
                <span>Data Induk</span>
              </a>
            </li>
            <li>
              <a href="admin-standar.html" class="nav__list__link">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Standar</span>
              </a>
            </li>
            <li>
              <a href="admin-report.html" class="nav__list__link">
                <i class="fa-solid fa-print"></i>
                <span>Report</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav__list__link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- footer sidebar -->
      <div class="sidebar__content-footer">
        <p class="mb-4">@admin.sipmppundip . 2019</p>
        <p>
          Sistem Informasi Penjaminan Mutu Penelitian dan Pengabdian
          Universitas Diponegoro
        </p>
      </div>
      <div class="sidebar__content-footer-icon">
        <div>
          <i class="fa-solid fa-circle-info"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- main -->
  <div class="main__content" id="main-content">
    <!-- header main -->
    <div class="header__main-color header__big"></div>
    <div class="container-fluid container__fluid">
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
            <img src="/admin/assets/img/adi-wibowo-img.png" alt="profile-picture" id="photo-dropdown" />
          </div>
          <div class="nav-profile__desc">
            <p id="profileName" class="ellipsis__text">
              Adi Wibosowo Kusumo Handayani Kusumaningrat
            </p>
            <p id="profileStatus" class="ellipsis__text">Administrator</p>
          </div>
          <div class="nav-profile__btn">
            <i class="fi-br-angle-down" id="btn-dropdown"></i>
          </div>
        </div>

        <div class="header__main-nav-dropdown" id="header-main-nav-dropdown">
          <p class="nav-dropdown__title">Pengaturan Profil</p>
          <p class="d-flex align-items-center">
            <a href="admin-profile.html" class="d-block">Lihat Profil</a>
          </p>
          <hr />
          <p class="d-flex align-items-center">
            <i class="fa-solid fa-arrow-right-from-bracket d-flex"></i>
            <a href="#" class="d-block">Log out</a>
          </p>
        </div>
      </div>

      <div class="header__main-title">
        <div class="header__main-title__pagination">Dashboard</div>
        <div class="header__main-title__subtitle">
          <div class="title__subtitle-desc">
            <h1>Dashboard Admin Overview</h1>
            <p>Halo <span>Adi</span>, selamat datang kembali!</p>
          </div>
          <div class="title__subtitle-btn">
            <a href="admin-report.html" class="report__link big__btn btn__dark">
              <img src="/admin/assets/img/icon/report-icon.svg" alt="icon-report" />
              <span>Report</span>
            </a>
          </div>
        </div>
      </div>

      <!-- body main -->
      <!-- rekap content -->
      <div class="recap__content">
        <!-- left -->
        <div class="recap__content-link">
          <div class="recap__link-card">
            <div class="recap__link-card__body">
              <img src="/admin/assets/img/penelitian-logo.svg" alt="penelitian-logo" />
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
              <img src="/admin/assets/img/pengabdian-masyarakat-logo.svg" alt="penelitian-logo" />
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
        <!-- table unit -->
        <div class="recap__content-unit">
          <div class="sipmpp__table radius__lg">
            <h5 class="card__title mb-0">Daftar Unit</h5>
            <div class="table__unit table-responsive">
              <table class="table table__unit__content sipmpp__table-content table-hover">
                <thead class="bg__light">
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

    <!-- footer -->
    <footer>
      <hr class="footer__line" />
      <div class="container-fluid container__fluid">
        <div class="footer__caption">
          <p class="mb-0">
            2022, made with <i class="fa-solid fa-heart"></i> by
            <span style="font-weight: 600">teamsipmppundip</span>
          </p>
        </div>
      </div>
    </footer>
  </div>

  <!-- scripts -->
  <!-- jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <!-- fontawesome -->
  <script defer src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" integrity="sha384-vLLEq/Un/eZFmXAu4Xxf8F00RSSMzPcI7iDiT6hpB4zFpezCEGhb5daeR8PLyrLI" crossorigin="anonymous"></script>
  <!-- custom -->
  <script src="/admin/assets/js/scripts-admin.js"></script>
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
</body>

</html>