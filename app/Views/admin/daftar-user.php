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
                <p id="profileName" class="ellipsis__text"><?= $usersession['nama']; ?> </p>
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
            / Daftar User
        </div>
        <div class="header__main-title__subtitle">
            <div class="title__subtitle-desc">
                <h1>Daftar User</h1>
                <p>Halo
                    <span>
                        <?php // uses regex that accepts any word character or hyphen in last name
                        function split_name($name)
                        {
                            $name = trim($name);
                            $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
                            $first_name = trim(preg_replace('#' . preg_quote($last_name, '#') . '#', '', $name));
                            return array($first_name, $last_name);
                        }
                        echo split_name($usersession['nama'])[0];
                        ?>
                    </span>, selamat datang di dashboard Daftar User
                </p>
            </div>
        </div>
    </div>

    <!--========== body main ==========-->
    <div class="title__table__add">
        <h4 class="title__body__user">Daftar User</h4>
        <a href="/admin/addUserForm" class="btn shadow-none btn__add btn__dark">
            <i class="fa-solid fa-plus"></i>
            Add User
        </a>
    </div>

    <!-- Menampilkan flashdata -->
    <?= session()->getFlashdata('msg'); ?>

    <!-- table auditor -->
    <div class="sipmpp__table">
        <div class="table-responsive">
            <table class="table table__daftar-user__content sipmpp__table-content table-hover">
                <thead class="bg__light">
                    <tr>
                        <th class="table__user-number">No</th>
                        <th class="table__user-fullname">Nama Lengkap</th>
                        <th class="table__user-email">Email</th>
                        <th class="table__user-telepon">Telepon</th>
                        <th class="table__user-nip">NIP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= $user['telp']; ?></td>
                            <td><?= $user['nip']; ?></td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
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

<?= $this->endSection();