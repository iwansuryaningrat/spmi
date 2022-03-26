<?= $this->extend('template/userlayout'); ?>

<?= $this->section('user'); ?>

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
        <img
          src="/profile/<?= $data_user['foto']; ?>"
          alt="profile-picture" id="photo-dropdown" />
      </div>
      <div class="nav-profile__desc">
        <p id="profileName"><?php if ($data_user['nama'] != null && $data_user['nama'] != "") {
    echo $data_user['nama'];
} else {
    echo $data_user['username'];
} ?>
        </p>
        <p id="profileEmail" class="ellipsis__text"><?= $data_user['email']; ?>
        </p>
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
      / <a href="spmi.html">Nilai SPMI</a> /
      <a href="indikator-spmi.html">Indikator</a> / Form Indikator
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
    Unit: <span><?= $unit['nama_unit']; ?></span>
  </h4>
  <h4 class="title__body__indikator-s">
    <?= $standar['kode_standar'] . '. ' . $standar['nama_standar'] ?>
  </h4>

  <!-- form indikator -->
  <div class="mb-5"></div>
  <div class="form__indikator">
    <form method="POST"
      action="/home/saveindikator/<?= $indikator['indikator_id']; ?>"
      enctype="multipart/form-data">
      <div class="row mb-3">
        <label for="indikator" class="col-sm-2 col-form-label form__label">Indikator</label>
        <div class="col-sm-10">
          <textarea class="form-control form__control" id="indikator" name="indikator" cols="30" rows="3" disabled
            required><?= $indikator['nama_indikator']; ?></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label for="target" class="col-sm-2 col-form-label form__label">Target</label>
        <div class="col-sm-10">
          <textarea class="form-control form__control" name="target" id="target" cols="30" rows="3" disabled
            required><?= $indikator['target']; ?></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label for="data-prodi" class="col-sm-2 col-form-label form__label">Data Prodi</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form__control" name="dataprodi" id="data-prodi" value="-" disabled
            required />
        </div>
      </div>
      <?php if ($indikator['tipe_hasil'] == 'Nilai') : ?>

      <div class="row mb-3">
        <label for="hasil" class="col-sm-2 col-form-label form__label">Hasil</label>
        <div class="col-sm-10">
          <input type="text" class="form-control form__control" name="hasil" id="hasil"
            value="<?= $indikator['hasil'] ?>"
            required />
        </div>
      </div>

      <?php else : ?>

      <div class="row mb-3">
        <label for="hasil" class="col-sm-2 col-form-label form__label">Hasil</label>
        <div class="col-sm-10">
          <select class="form-select form__select" name="hasil" id="hasil">
            <option selected disabled>Pilih hasil data</option>
            <option value="ADA / ESUAI">ADA / SESUAI</option>
            <option value="Tidak ADA / TIDAK SESUAI">Tidak ADA / TIDAK SESUAI</option>
          </select>
        </div>
      </div>

      <?php endif; ?>
      <div class="row mb-3">
        <label for="dokumen" class="col-sm-2 col-form-label form__label">Dokumen</label>
        <div class="col-sm-10">
          <div class="input-group">
            <input type="file" class="form-control" name="dokumen" id="dokumen" required />
            <label class="input-group-text" for="dokumen">Upload</label>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <label for="keterangan" class="col-sm-2 col-form-label form__label">Keterangan</label>
        <div class="col-sm-10">
          <textarea class="form-control form__control" id="keterangan" cols="30" rows="3"
            name="keterangan"><?= $indikator['keterangan'] ?></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label for="catatan" class="col-sm-2 col-form-label form__label">Catatan</label>
        <div class="col-sm-10">
          <textarea class="form-control form__control" name="catatan" id="catatan" cols="30" rows="3"
            disabled><?= $indikator['catatan'] ?></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
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

<?= $this->endSection();
