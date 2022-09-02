<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Gastos</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
    <link rel="manifest" href="/ico/site.webmanifest">
    <link rel="mask-icon" href="/ico/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?= link_tag("assets/Bootstrap/css/bootstrap.min.css"); ?>
    <?= link_tag("assets/bootstrap-icons/bootstrap-icons.css"); ?>
    <?= link_tag("assets/css/custom.css"); ?>

    <?= script_tag("assets/Bootstrap/js/bootstrap.bundle.min.js") ?>
    <?= script_tag("assets/chart/chart.min.js"); ?>
    <?= script_tag("assets/axios/axios.min.js"); ?>
</head>

<body class="page">
    <section>
        <header class="navbar navbar-expand-lg bd-navbar">
            <nav class="container-fluid bd-gutter flex-wrap flex-lg-nowrap">
                <a href="#" class="navbar-brand p-0 me-0 me-lg-2">
                    <?= img("images/blastoise.png", false, ["width" => 40]) ?>
                </a>

                <button type="button" class="navbar-toggler d-flex d-lg-none order-3 p-2 text-dark" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar">
                    <i class="bi bi-three-dots"></i>
                </button>

                <div class="offcanvas-lg offcanvas-end flex-grow-1 bd-navbar-mobile" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" data-bs-scroll="true">
                    <div class="offcanvas-header px-4 pb-0">
                        <h5 class="offcanvas-title text-dark" id="bdNavbarOffcanvasLabel">Controle de Gastos</h5>
                        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
                    </div>
                    <div class="offcanvas-body p-4 pt-0 p-lg-0">
                        <hr class="d-lg-none text-white-50">
                        <ul class="navbar-nav flex-row flex-wrap bd-navbar-nav">
                            <li class="nav-item col-6 col-lg-auto">
                                <?= anchor("/controle", "Controle", ["class" => "nav-link py-2 px-0 px-lg-2 text-dark", "aria-current" => "true"]) ?>
                            </li>
                            <li class="nav-item col-6 col-lg-auto dropdown">
                                <button type="button" class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">Cadastro</button>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static">
                                    <li>
                                        <a href="/dados-bancarios" class="dropdown-item" aria-current="true">Dados Bancários</a>
                                    </li>
                                    <li>
                                        <a href="/tipo-gasto" class="dropdown-item" aria-current="true">Tipo Gasto</a>
                                    </li>
                                    <li>
                                        <a href="/forma-pagamento" class="dropdown-item" aria-current="true">Forma Pagamento</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <hr class="d-lg-none text-white-50">
                        <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
                            <li class="nav-item dropdown">
                                <button type="button" class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle text-dark" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                    <span class="d-lg-none text-dark" aria-hidden="true">Usuário</span>
                                    <span class="visually-hidden text-dark">Usuário&nbsp;</span>
                                    <?= img("images/user.png", false, ["width" => 30, "class" => "rounded-circle bg-white"]) ?>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="static">
                                    <li>
                                        <h6 class="dropdown-header">Opções</h6>
                                    </li>
                                    <li>
                                        <a href="/logout" class="dropdown-item" aria-current="true">Sair</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>

    <section>
        <div class="container-fluid">
            <?= $this->renderSection("content") ?>
        </div>
    </section>

    <section>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script> © Deividson
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">Sobre</a>
                            <a href="javascript: void(0);">Suporte</a>
                            <a href="javascript: void(0);">Contato</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </section>

</body>

</html>