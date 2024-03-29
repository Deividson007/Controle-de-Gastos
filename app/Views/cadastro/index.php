<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?= link_tag("assets/Bootstrap/css/bootstrap.min.css") ?>

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <?php echo \Config\Services::validation()->listErrors("c_list") ?>
        <?php if(isset($mensagem)) echo '<div class="alert alert-danger" role="alert">' . $mensagem . "</div>" ?>
        <br />
        <?= form_open("cadastro/create") ?>
            <?= img("images/charmander.png", false, ["class" => "mb-4", "width" => 72]) ?>
            <h1 class="h3 mb-3 fw-normal">Cadastro</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="nome" placeholder="nome">
                <label for="floatingInput">Nome</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>
           
            <button class="w-100 btn btn-lg btn-secondary" type="submit">Gravar</button>
            <p class="mt-5 mb-3 text-muted">&copy; <?= date("Y") ?> - Deividson</p>
        </form>
    </main>
</body>

</html>