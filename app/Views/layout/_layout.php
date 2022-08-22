<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Gastos</title>
    <?= link_tag("assets/Bootstrap/css/bootstrap.min.css"); ?>
    <?= link_tag("assets/css/custom.css"); ?>

    <?= script_tag("assets/Bootstrap/js/bootstrap.bundle.min.js") ?>
    <?= script_tag("assets/chart/chart.min.js"); ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light" style="clear:both">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?= img("images/blastoise.png", false, ["width" => 40]) ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?= anchor("/controle", "Controle", ["class" => "nav-link", "aria-current" => "page"]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <?= $this->renderSection("content") ?>
    </div>
    
</body>

</html>