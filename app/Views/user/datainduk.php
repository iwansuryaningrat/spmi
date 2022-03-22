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
    <div class="header__main-title__pagination">
      <a href="/">Dashboard</a>
      / Data Induk
    </div>
    <div class="header__main-title__subtitle">
      <div class="title__subtitle-desc">
        <h1>Pengisisan Data Induk</h1>
        <p>
          Mengisikan data induk sesuai dengan kategori dan kebutuhan data.
        </p>
      </div>
    </div>
  </div>

  <!--========== body main ==========-->
  <h4 class="title__body__main">Unit: <span><?= $unit['nama_unit']; ?></span></h4>

  <!-- filter -->
  <div class="filter__datainduk">
    <div class="filter__datainduk-panel nav nav-pills" id="pills-tab" role="tablist">
      <button class="btn filter__btn me-0 me-md-4 shadow-none active nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
        Penelitian
      </button>
      <button class="btn filter__btn shadow-none nav-link ellipsis__text" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
        Pengabdian Masyarakat
      </button>
    </div>

    <!-- Belum dalam bentuk form -->
    <div class="filter__datainduk-filter">
      <label for="year-filter" class="form-label">Tahun</label>
      <select class="form-select shadow-none" aria-label="year-filter" id="year-filter">
        <option selected disabled>Pilih Tahun</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
      </select>
      <button class="btn terapkan__btn shadow-none">Terapkan</button>
    </div>
  </div>

  <!-- =====data table induk =====-->
  <div class="tab-content" id="pills-tabContent">
    <!-- penelitian -->
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
      <div class="datainduk__table">
        <div class="table-responsive">
          <table class="table table__datainduk table-hover">
            <thead>
              <tr>
                <th class="table__datainduk-number">no</th>
                <th class="table__datainduk-kode">kode</th>
                <th class="table__datainduk-kategori">kategori</th>
                <th class="table__datainduk-kebutuhandata">
                  kebutuhan data
                </th>
                <th class="table__datainduk-nilai">nilai</th>
                <th class="table__datainduk-aksi">aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="text-uppercase">MK</td>
                <td>Akademik</td>
                <td>Mata Kuliah</td>
                <td>100</td>
                <td>
                  <a role="button" data-bs-toggle="modal" data-bs-placement="top" title="Edit" href="#staticBackdrop" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td class="text-uppercase">perpus</td>
                <td>Kemahasiswaan</td>
                <td>
                  Target jumlah mahasiswa yang terlibat dalam penelitian
                  dan pengabdian kepada masyarakat
                </td>
                <td>100</td>
                <td>
                  <a role="button" data-bs-toggle="modal" data-bs-placement="top" title="Edit" href="#staticBackdrop" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- pengabdian masyarakat -->
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
      <div class="datainduk__table">
        <div class="table-responsive">
          <table class="table table__datainduk table-hover">
            <thead>
              <tr>
                <th class="table__datainduk-number">no</th>
                <th class="table__datainduk-kode">kode</th>
                <th class="table__datainduk-kategori">kategori</th>
                <th class="table__datainduk-kebutuhandata">
                  kebutuhan data
                </th>
                <th class="table__datainduk-nilai">nilai</th>
                <th class="table__datainduk-aksi">aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="text-uppercase">MK</td>
                <td>Akademik</td>
                <td>Mata Kuliah</td>
                <td>100</td>
                <td>
                  <a role="button" data-bs-toggle="modal" data-bs-placement="top" title="Edit" href="#staticBackdrop" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td class="text-uppercase">perpus</td>
                <td>Kemahasiswaan</td>
                <td>
                  Target jumlah mahasiswa yang terlibat dalam penelitian
                  dan pengabdian kepada masyarakat
                </td>
                <td>100</td>
                <td>
                  <a role="button" data-bs-toggle="modal" data-bs-placement="top" title="Edit" href="#staticBackdrop" class="edit__data__induk__icon"><i class="fa-solid fa-pen-to-square"></i></a>
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

<?= $this->section('modal'); ?>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-data-induk" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal__content">
      <div class="modal-header modal__header">
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal__body">
        <h4 class="modal-title" id="modal-data-induk">Nilai Data Induk</h4>

        <!-- form -->
        <form class="modal__form">
          <div class="modal__form-content">
            <label for="kode" class="form-label form__label">Kode</label>
            <input type="text" class="form-control shadow-none form__control text-uppercase" id="kode" value="perpus" disabled />
          </div>
          <div class="modal__form-content">
            <label for="kategori" class="form-label form__label">Kategori</label>
            <input type="text" class="form-control shadow-none form__control" id="kategori" value="Kemahasiswaan" disabled />
          </div>
          <div class="modal__form-content">
            <label for="kebutuhan-data" class="form-label form__label">Kebutuhan Data</label>
            <textarea id="kebutuhan-data" class="form-control shadow-none form__control" cols="30" rows="3" disabled>
Target jumlah mahasiswa yang terlibat dalam penelitian dan pengabdian kepada masyarakat
              </textarea>
          </div>
          <div class="modal__form-content">
            <label for="nilai" class="form-label form__label">Nilai</label>
            <input type="text" class="form-control shadow-none form__control" id="nilai" />
          </div>

          <div class="modal__form-btn">
            <button type="button" class="btn cancel__btn" data-bs-dismiss="modal">
              Batal
            </button>
            <button type="submit" class="btn small__btn">Kirim</button>
          </div>
        </form>
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