<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?>
    </title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/solid.css"
        integrity="sha384-ltWlpN+Dl8XfKEnC9oW+dDRF8Z7jsYkxQ/WMRoJ2VHH5G2nQZ4if2NWwmV0ybzZ7" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/fontawesome.css"
        integrity="sha384-RLM8Rxp/DcBfCfSI3bGwwoMMxxy34D2e58WAqXmmdnh0WYlAQ8jeOB3A1ed5KUSm" crossorigin="anonymous" />
    <!-- custom -->
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <link rel="stylesheet" href="/assets/css/styles-login.css" />
</head>

<body>
    <div class="container__login">
        <div class="login__content">
            <!-- left -->
            <div class="login__content-left"></div>

            <!-- right -->
            <div class="login__content-right">
                <div class="login__content-right__body">
                    <h2 class="login__title">Pilih Unit</h2>
                    <p class="mb-1">
                        Selamat datang <span class="fw-bold">
                            <?php
                            // function split_name($name)
                            // {
                            //     $name = trim($name);
                            //     $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
                            //     $first_name = trim(preg_replace('#'.preg_quote($last_name, '#').'#', '', $name));
                            //     return array($first_name, $last_name);
                            // }
                            //     echo split_name($usersession['nama'])[0];
                                ?>
                        </span>!
                    </p>
                    <p class="login__desc__unit mb-4">Silahkan pilih unit yang ingin
                        Anda
                        kunjungi. Harap masukkan unit sesuai dengan unit Anda!</p>

                    <!-- Mengecek apakah ada flash data -->
                    <?php if (session()->getFlashdata('gagal')) : ?>
                    <!-- alert danger -->
                    <div class="alert alert-danger d-flex alert-dismissible" role="alert" style="padding-right: 2.5rem">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            style="padding: 1.25rem"></button>
                        <i class="bi bi-exclamation-triangle-fill d-block pe-3" style="font-size: 1.25rem"></i>
                        <div>
                            <!-- Menampilkan flashdata gagal -->
                            <?= session()->getFlashdata('gagal'); ?>
                        </div>
                    </div>
                    <!-- end alert danger -->
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')) : ?>
                    <!-- alert success -->
                    <div class="alert alert-success d-flex alert-dismissible" role="alert"
                        style="padding-right: 2.5rem">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            style="padding: 1.25rem"></button>
                        <i class="bi bi-check-circle-fill d-block pe-3" style="font-size: 1.25rem"></i>
                        <div>
                            <!-- Menampilkan flashdata success -->
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                    <!-- end alert success -->
                    <?php endif; ?>


                    <form class="form__login" method="POST" action="/auth/loginprocess">
                        <div class="mb-4 position-relative">
                            <label for="role" class="form-label form__label">Role</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="base-user" checked>
                                <label class="form-check-label" for="base-user">
                                    Base user
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="role" id="auditor">
                                <label class="form-check-label" for="auditor">
                                    Auditor
                                </label>
                            </div>
                        </div>
                        <div class="mb-4 position-relative">
                            <label for="unit" class="form-label form__label">Unit</label>
                            <select class="form-select form__select shadow-none" name="unit">
                                <option selected disabled>Pilih Unit</option>
                                <option>S1 Informatika</option>
                                <option>S2 Informatika</option>
                                <option>S3 Informatika</option>
                            </select>
                        </div>
                        <button type="submit" class="btn login__btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
        integrity="sha384-vLLEq/Un/eZFmXAu4Xxf8F00RSSMzPcI7iDiT6hpB4zFpezCEGhb5daeR8PLyrLI" crossorigin="anonymous">
    </script>
</body>

</html>