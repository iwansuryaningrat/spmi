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
        <img src="/assets/img/adi-wibowo-img.png" alt="profile-picture" id="photo-dropdown" />
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
        <a href="#" class="d-block">Lihat Profil</a>
      </p>
      <hr />
      <p class="d-flex align-items-center">
        <i class="fa-solid fa-arrow-right-from-bracket d-flex"></i>
        <a href="#" class="d-block">Log out</a>
      </p>
    </div>
  </div>

  <div class="header__main-title">
    <div class="header__main-title__pagination">
      <a id="unit-user" href="#" style="font-weight: 600;">S1 Informatika</a>
      / Profile
    </div>
    <div class="header__main-title__subtitle">
      <div class="title__subtitle-desc">
        <h1>Profile</h1>
        <p>Halo <span>Adi</span>, selamat datang di profil Anda</p>
      </div>
    </div>
  </div>

  <!--========== body main ==========-->
  <div class="profile__section">
    <!-- left -->
    <div class="profile__section-profile">
      <h5>Profile Pengguna</h5>
      <hr class="head__hr" />
      <form class="form__profile" action="" method="POST">
        <!-- foto -->
        <div class="mb-3">
          <label for="photo-profile" class="form-label form__label">Foto Profil</label>
          <div class="input-group input-group__photo">
            <div class="img__input-photo">
              <div class="img__photo-field">
                <img src="/assets/img/dummy-profile.png" alt="photo-profile" class="img__input" id="img-input-preview" />
              </div>
            </div>
            <div class="img__input-field">
              <input type="file" class="form-control form__control__photo" id="photo-profile" aria-labelledby="photo-notice" onchange="previewImage(this)" name="photo-profile" />
              <label class="form__label__photo btn btn__dark" for="photo-profile">Ubah Profile</label>
              <label id="photo-notice" class="form-text form__text">
                Gambar profil Anda sebaiknya memiliki raiso 1:1 dan
                berukuran tidak lebih dari 2 MB.</label>
            </div>
          </div>
          <div id="alert-wrong-photo"></div>
        </div>
        <!-- Nama lengkap -->
        <div class="mb-3">
          <label for="fullname" class="form-label form__label">Nama Lengkap</label>
          <input type="text" class="form-control form__control shadow-none" id="fullname" value="Adi Wibowo" name="fullname" required />
        </div>
        <!-- email -->
        <div class="mb-3">
          <label for="email" class="form-label form__label">Email</label>
          <input type="text" class="form-control form__control shadow-none" id="email" name="email" disabled value="adiwibowo@lecturer.undip.ac.id" required />
        </div>
        <!-- nip -->
        <div class="mb-3">
          <label for="nip" class="form-label form__label">NIP</label>
          <input type="text" class="form-control form__control shadow-none" id="nip" name="nip" value="198203092006041002" required />
        </div>
        <!-- nomor telepon -->
        <div class="mb-3 mb__big">
          <label for="no-telp" class="form-label form__label">Nomor telepon</label>
          <input type="text" class="form-control form__control shadow-none" id="no-telp" name="no-telp" value="082314497854" required />
        </div>
        <!-- button -->
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn__dark">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>

    <!-- right -->
    <div class="profile__section-password">
      <div class="section-password__border">
        <h5>Ubah Password</h5>
        <hr />
        <form class="form__change__password" action="" method="POST">
          <!-- password lama -->
          <div class="mb-3">
            <label for="old-password" class="form-label form__label">Password Lama <span class="color__danger">*</span></label>
            <input type="password" class="form-control form__control shadow-none" id="old-password" name="old-password" required />
          </div>
          <!-- password baru -->
          <div class="mb-3">
            <label for="new-password" class="form-label form__label">Password Baru <span class="color__danger">*</span></label>
            <input type="password" class="form-control form__control shadow-none" id="new-password" name="new-password" required aria-labelledby="new-password-notice" required />
            <div id="new-password-notice" class="form-text form__text">
              Gunakan minimal 8 karakter dengan kombinasi huruf dan angka.
            </div>
          </div>
          <!-- konfirmasi password baru -->
          <div class="mb-3 mb__big">
            <label for="new-password-confirm" class="form-label form__label">Konfirmasi Password Baru
              <span class="color__danger">*</span></label>
            <input type="password" class="form-control form__control shadow-none" id="new-password-confirm" name="new-password-confirm" required />
          </div>
          <!-- button -->
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn__light">
              Ubah Password
            </button>
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

  // preview image and validation
  previewImage = (input) => {
    const fi = document.getElementById("photo-profile");
    // Check if any file is selected.
    if (fi.files.length > 0) {
      for (const i = 0; i <= fi.files.length - 1; i++) {
        const fsize = fi.files.item(i).size;
        const file = Math.round(fsize / 1024);
        // The size of the file.
        if (file >= 2048) {
          const ukuranAsli = file / 1000;
          document.getElementById("alert-wrong-photo").innerHTML =
            "<p class='mt-2 color__danger'><i class='fa-solid fa-triangle-exclamation'></i> Ukuran file terlalu besar (<strong>" +
            ukuranAsli.toFixed(2) +
            " MB</strong>), pilih foto dengan ukuran dibawah 2 MB</p>";
        } else {
          var fileFhoto = $("#photo-profile[type=file]").get(0).files[0];

          if (fileFhoto) {
            var reader = new FileReader();

            reader.onload = function() {
              $("#img-input-preview").attr("src", reader.result);
            };

            reader.readAsDataURL(fileFhoto);
          }
        }
      }
    }
  };
</script>

<?= $this->endSection(); ?>