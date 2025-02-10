<?php
    require_once "../../controllers/JogoController.php";
    include "../includes/autoLoad.php";
    Security::verifyAuthentication();

    $JogoController = new JogoController();

    if(isset($_POST) && count($_POST)){
        $c = new Jogo();
        $c->setId(htmlspecialchars($_POST['campoId']));
        $c->setJogo(htmlspecialchars($_POST['campoJogo']));
        $c->setNumerointegrantes(htmlspecialchars($_POST['campoIntegrantes']));

        $res = $JogoController->edit($c);

        if($res){
            header("location: ./");
            exit();
        }
    }
    else if(isset($_GET['id']) && !empty($_GET['id'])){
        $dado = $JogoController->findId($_GET['id']);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <?php include "../includes/menu.php"; ?>
            <div class="col-9">
                <h3>Cadastro de categorias</h3>
                <form action="" method="post">
                    <input type="hidden" name="campoId" value="<?= $dado->getId(); ?>">
                    <div class="mb-3">
                        <label for="idJogo" class="form-label">Jogo:</label>
                        <input type="text" class="form-control" name="campoJogo" id="idJogo" placeholder="Informe o jogo" value="<?= $dado->getjogo(); ?>">
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="idIntegrantes" class="form-label">Numero de integrantes:</label>
                        <input type="number" class="form-control" id="idIntegrantes" name="campoIntegrantes" placeholder="Insira o número de integrantes" value="<?= $dado->getNumerointegrantes(); ?>"/>
                    </div>
                    <button type="submit" class="btn btn-success">Gravar</button>
                    <a href="./" class="btn btn-primary">Voltar</a>
                </form>
            </div>
        </div>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>