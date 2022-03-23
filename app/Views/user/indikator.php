<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Indikator SPMI - S1 Informatika | SIPMPP UNDIP</title>

  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/solid.css" integrity="sha384-ltWlpN+Dl8XfKEnC9oW+dDRF8Z7jsYkxQ/WMRoJ2VHH5G2nQZ4if2NWwmV0ybzZ7" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/fontawesome.css" integrity="sha384-RLM8Rxp/DcBfCfSI3bGwwoMMxxy34D2e58WAqXmmdnh0WYlAQ8jeOB3A1ed5KUSm" crossorigin="anonymous" />
  <!-- uicons icon -->
  <link rel="stylesheet" href="assets/vendor/uicons-bold-rounded/css/uicons-bold-rounded.css" />
  <!-- custom -->
  <link rel="stylesheet" href="assets/css/styles-indikator-spmi.css" />
</head>

<body>
  <!-- sidebar -->
  <div class="position-relative">
    <div class="sidebar__content" id="sidebar-content">
      <!-- brand and navigations -->
      <div>
        <!-- brand -->
        <div class="sidebar__content-brand">
          <a href="dashboard.html" class="d-flex align-items-center">
            <img src="assets/img/undip-logo-color.png" alt="logo-undip" />
            <h4>SIPMPP UNDIP</h4>
          </a>
        </div>

        <!-- navigation -->
        <div class="sidebar__content-nav">
          <ul class="sidebar-nav__list">
            <li>
              <a href="dashboard.html" class="nav__list__link">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a id="sidebar-main-icon" class="nav__list__link-dropdown" data-bs-toggle="collapse" href="#data-induk-collapse" aria-expanded="false" aria-controls="data-induk-collapse">
                <div class="link-dropdown__sidebar">
                  <i class="fa-solid fa-book"></i>
                  <span>Data Induk</span>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
              </a>

              <!-- dropdown -->
              <div class="collapse collapse__dropside" id="data-induk-collapse">
                <ul class="sidebar-nav__list-collapse">
                  <li>
                    <a href="data-induk.html" class="nav__list__link-collapse ellipsis__text">S1 Informatika</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Matematika</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Statistika</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Teknik Lingkungan</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Kedokteran</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Kesehatan Masyarakat</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a class="nav__list__link-dropdown active" data-bs-toggle="collapse" href="#spmi-collapse" aria-expanded="false" aria-controls="spmi-collapse">
                <div class="link-dropdown__sidebar">
                  <i class="fa-solid fa-file-signature"></i>
                  <span>Nilai SPMI</span>
                </div>
                <i class="fa-solid fa-chevron-down"></i>
              </a>

              <!-- dropdown -->
              <div class="collapse collapse__dropside" id="spmi-collapse">
                <ul class="sidebar-nav__list-collapse">
                  <li>
                    <a href="spmi.html" class="nav__list__link-collapse ellipsis__text">S1 Informatika</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Matematika</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Statistika</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Teknik Lingkungan</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Kedokteran</a>
                  </li>
                  <li>
                    <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Kesehatan Masyarakat</a>
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a href="report.html" class="nav__list__link">
                <i class="fa-solid fa-print"></i>
                <span>Report</span>
              </a>
            </li>
            <li>
              <a href="index.html" class="nav__list__link">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- footer sidebar -->
      <div class="sidebar__content-footer">
        <p class="mb-4">@sipmppundip . 2019</p>
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
    <div class="header__main-color header__mini header__indikator"></div>
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
            <img src="assets/img/adi-wibowo-img.png" alt="profile-picture" id="photo-dropdown" />
          </div>
          <div class="nav-profile__desc">
            <p id="profileName">Adi Wibowo</p>
            <p id="profileEmail" class="ellipsis__text">
              iwansuryaningrat@students.undip.ac.id
            </p>
          </div>
          <div class="nav-profile__btn">
            <i class="fi-br-angle-down" id="btn-dropdown"></i>
          </div>
        </div>

        <div class="header__main-nav-dropdown" id="header-main-nav-dropdown">
          <p class="nav-dropdown__title">Pengaturan Profil</p>
          <p class="d-flex align-items-center">
            <a href="profile.html" class="d-block">Lihat Profil</a>
          </p>
          <hr />
          <p class="d-flex align-items-center">
            <i class="fa-solid fa-arrow-right-from-bracket d-flex"></i>
            <a href="index.html" class="d-block">Log out</a>
          </p>
        </div>
      </div>

      <div class="header__main-title">
        <div class="header__main-title__pagination">
          <a href="dashboard.html">Dashboard</a>
          / <a href="spmi.html">Nilai SPMI</a> / Indikator
        </div>
        <div class="header__main-title__subtitle">
          <div class="title__subtitle-desc">
            <h1>Penilaian Sistem Penjamin Mutu Internal</h1>
            <p>Menilai SPMI sesuai unit standar</p>
          </div>
        </div>
      </div>

      <!--========== body main ==========-->
      <h4 class="title__body__indikator-u">
        Unit: <span>S1 Informatika</span>
      </h4>
      <h4 class="title__body__indikator-s">
        S12. Standar Sarana dan Prasarana Pembelajaran
      </h4>

      <!-- table indikator -->
      <div class="sipmpp__table">
        <div class="table-responsive">
          <table class="table table__indikator__content sipmpp__table-content table-hover">
            <thead class="bg__light">
              <tr>
                <th class="table__indikator-number">No</th>
                <th class="table__indikator-indikator">Indikator</th>
                <th class="table__indikator-target">Target</th>
                <th class="table__indikator-aksi">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  Tersedianya pedoman penyusunan profil lulusan program studi
                </td>
                <td>Tersusunnya profil program studi</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="form-indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  Tersedia pedoman rumusan kualifikasi lulusan berupa Capaian
                  Pembelajaran Lulusan (CPL) mencakup aspek sikap,
                  pengetahuan, dan keterampilan
                </td>
                <td>
                  Adanya dokumen Capaian Pembelajaran Lulusan sesuai dengan
                  SKL berdasarkan jenis dan jenjang pendidikan berdasarkan
                  KKNI serta SN-DIKTI
                </td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="form-indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
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
  <script src="assets/js/scripts.js"></script>
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

    // active filer button
    $(function() {
      $(".filter__btn").click(function() {
        // remove classes from all
        $(".filter__btn").removeClass("active");
        // add class to the one we clicked
        $(this).addClass("active");
        // stop the page from jumping to the top
        return false;
      });
    });

    // tooltips
    // progress bar unit
    const tooltipsEdit = document.querySelectorAll(
      ".edit__data__induk__icon"
    );
    tooltipsEdit.forEach((t) => {
      new bootstrap.Tooltip(t);
    });
  </script>
</body>

</html>