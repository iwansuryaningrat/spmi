<?= $this->extend('template/userlayout'); ?>

<?= $this->section('user'); ?>

<div class="container-fluid container__fluid pb-0">
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
        <p id="profileEmail" class="ellipsis__text"><?= $data_user['email']; ?></p>
      </div>
      <div class="nav-profile__btn">
        <i class="fi-br-angle-down" id="btn-dropdown"></i>
      </div>
    </div>

    <div class="header__main-nav-dropdown" id="header-main-nav-dropdown">
      <p class="nav-dropdown__title">Pengaturan Profil</p>
      <p class="d-flex align-items-center">
        <a href="/home/profile" class="d-block">Lihat Profil</a>
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
      <a href="/">Dashboard</a>
      / Nilai SPMI
    </div>
    <div class="header__main-title__subtitle">
      <div class="title__subtitle-desc">
        <h1>Penilaian Sistem Penjamin Mutu Internal</h1>
        <p>Menilai SPMI sesuai unit standar</p>
      </div>
    </div>
  </div>

  <!--========== body main ==========-->
  <div class="status__spmi__content">
    <div class="spmi__content-desc">
      <h4 class="title__body__main">Unit: <span>S1 Informatika</span></h4>
      <p class="status__spmi">
        Status Penliaian: <span id="status-spmi">Belum Dikirim</span>
      </p>
    </div>
    <div class="spmi__content-btn">
      <a href="#" class="btn kirim__btn">
        <i class="fa-solid fa-file-import"></i>
        Kirim Penilaian
      </a>
    </div>
  </div>

  <!-- filter -->
  <div class="filter__table">
    <div class="nav nav-pills" id="pills-tab" role="tablist">
      <button class="btn filter__btn me-0 me-md-3 shadow-none active nav-link active" id="pills-spmi-penelitian" data-bs-toggle="pill" data-bs-target="#pills-table-spmi-penelitian" type="button" role="tab" aria-controls="pills-table-spmi-penelitian" aria-selected="true">
        Penelitian
      </button>
      <button class="btn filter__btn shadow-none nav-link" id="pills-spmi-pm" data-bs-toggle="pill" data-bs-target="#pills-table-spmi-pm" type="button" role="tab" aria-controls="pills-table-spmi-pm" aria-selected="false">
        Pengabdian Masyarakat
      </button>
    </div>

    <form class="filter__table-year">
      <label for="year-filter" class="form-label">Tahun</label>
      <select class="form-select shadow-none" aria-label="year-filter" id="year-filter">
        <option selected disabled>Pilih Tahun</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
      </select>
      <button class="btn terapkan__btn shadow-none">Terapkan</button>
    </form>
  </div>

  <!-- =====data table spmi =====-->
  <div class="tab-content" id="pills-tabContent">
    <!-- penelitian -->
    <div class="tab-pane fade show active" id="pills-table-spmi-penelitian" role="tabpanel" aria-labelledby="pills-spmi-penelitian">
      <div class="sipmpp__table">
        <div class="table-responsive">
          <table class="table table__spmi__content sipmpp__table-content table-hover" id="spmi-penelitian">
            <thead class="bg__light">
              <tr>
                <th class="table__spmi-number">no</th>
                <th class="table__spmi-standar">standar</th>
                <th class="table__spmi-nama">nama</th>
                <th class="table__spmi-status">status</th>
                <th class="table__spmi-nilai">nilai akhir</th>
                <th class="table__spmi-aksi">aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="text-uppercase">S1</td>
                <td>Standar Sarana dan Prasarana Pembelajaran</td>
                <td>Badge</td>
                <td>100%</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td class="text-uppercase">S2</td>
                <td>Standar Kerjasama Pendidikan</td>
                <td>Badge</td>
                <td>0%</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>

              <tr>
                <td>2</td>
                <td class="text-uppercase">S2</td>
                <td>Standar Kerjasama Pendidikan</td>
                <td>Badge</td>
                <td>0%</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- pengabdian masyarakat -->
    <div class="tab-pane fade" id="pills-table-spmi-pm" role="tabpanel" aria-labelledby="pills-spmi-pm">
      <div class="sipmpp__table">
        <div class="table-responsive">
          <table class="table table__spmi__content sipmpp__table-content table-hover" id="spmi-pm">
            <thead class="bg__light">
              <tr>
                <th class="table__spmi-number">no</th>
                <th class="table__spmi-standar">standar</th>
                <th class="table__spmi-nama">nama</th>
                <th class="table__spmi-status">status</th>
                <th class="table__spmi-nilai">nilai akhir</th>
                <th class="table__spmi-aksi">aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="text-uppercase">S1</td>
                <td>Standar Sarana dan Prasarana Pembelajaran</td>
                <td>Badge</td>
                <td>100%</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>

              <tr>
                <td>3</td>
                <td class="text-uppercase">S3</td>
                <td>Standar Isi Pembelajaran</td>
                <td>Badge</td>
                <td>20%</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td class="text-uppercase">S2</td>
                <td>Standar Kerjasama Pendidikan</td>
                <td>Badge</td>
                <td>0%</td>
                <td>
                  <a data-bs-placement="top" title="Edit" href="indikator-spmi.html" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
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

<?= $this->endSection(); ?>