<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/solid.css" integrity="sha384-ltWlpN+Dl8XfKEnC9oW+dDRF8Z7jsYkxQ/WMRoJ2VHH5G2nQZ4if2NWwmV0ybzZ7" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.0/css/fontawesome.css" integrity="sha384-RLM8Rxp/DcBfCfSI3bGwwoMMxxy34D2e58WAqXmmdnh0WYlAQ8jeOB3A1ed5KUSm" crossorigin="anonymous" />
    <!-- akar icon -->
    <link rel="stylesheet" href="/assets/vendor/uicons-bold-rounded/css/uicons-bold-rounded.css" />
    <!-- custom -->
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <!-- Custom Page Style -->
    <link rel="stylesheet" href="/assets/css/<?= $css; ?>" />
</head>

<body>
    <!-- sidebar -->
    <div class="position-relative">
        <div class="sidebar__content" id="sidebar-content">
            <!-- brand and navigations -->
            <div>
                <!-- brand -->
                <div class="sidebar__content-brand">
                    <a href="#" class="d-flex align-items-center">
                        <img src="/assets/img/undip-logo-color.png" alt="logo-undip" />
                        <h4>SIPMPP UNDIP</h4>
                    </a>
                </div>

                <!-- navigation -->
                <div class="sidebar__content-nav">
                    <ul class="sidebar-nav__list">
                        <li>
                            <a href="/" class="nav__list__link <?php if ($tab == "home") : echo 'active';
                                                                endif; ?>">
                                <i class="fa-solid fa-house"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav__list__link-dropdown  <?php if ($tab == "datainduk") : echo 'active';
                                                                endif; ?>" data-bs-toggle="collapse" href="#data-induk-collapse" role="button" aria-expanded="false" aria-controls="data-induk-collapse">
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
                                        <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Informatika</a>
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
                            <a class="nav__list__link-dropdown<?php if ($tab == "spmi") : echo 'active';
                                                                endif; ?>" data-bs-toggle="collapse" href="#spmi-collapse" role="button" aria-expanded="false" aria-controls="spmi-collapse">
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
                                        <a href="#" class="nav__list__link-collapse ellipsis__text">S1 Informatika</a>
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
                            <a href="#" class="nav__list__link <?php if ($tab == "report") : echo 'active';
                                                                endif; ?>">
                                <i class="fa-solid fa-print"></i>
                                <span>Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="/logout" class="nav__list__link">
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
        <div class="header__main-color"></div>

        <?= $this->renderSection('user'); ?>

        <!-- footer -->
        <footer>
            <hr class="footer__line" />
            <div class="container-fluid container__fluid">
                <div class="footer__caption">
                    <p class="mb-0">
                        2019, made with <i class="fa-solid fa-heart"></i> by
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
    <script src="/assets/js/scripts.js"></script>

    <?= $this->renderSection('userscript'); ?>

</body>

</html>