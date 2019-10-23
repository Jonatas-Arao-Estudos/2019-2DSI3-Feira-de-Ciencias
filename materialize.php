<?php
    include_once('conecta.php');
    if($_POST){
        $log = false;
        $nome = $_POST['nome'];
        $periodo = $_POST['periodo'];
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];
        $sql = "INSERT INTO visitantes (nome,periodoestudo,idade,sexo) VALUES ('$nome', '$periodo', '$idade','$sexo')";
        if(mysqli_query($conecta, $sql)){
            $log = true;
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materialize</title>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <div class="nav-wrapper nav-container">
            <img class="brand-logo" src="img/loginho.png" width="200px">
            <div class="right hide-on-med-and-down">
                <h3>Frameworks CSS - Materialize</h3>
            </div>
        </div>
    </nav>

    <section class="container formulario">
        <div class="row">
            <form action="materialize.php" class="col s12" method="post">
                <div class="input-field col s12">
                    <input name="nome" type="text" required>
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s12 m4">
                    <select name="periodo" required>
                        <option value="" disabled selected>Que período você estuda?</option>
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                        <option value="Não Estuda">Não Estuda</option>
                    </select>
                    <label>Período</label>
                </div>
                <div class="input-field col s12 m4">
                    <input name="idade" type="number" min="0" required>
                    <label for="idade">Idade</label>
                </div>
                <div class="input-field col s12 m4">
                    <p class="center-align">
                        <span class="title">Sexo :</span>
                        <label class="genero-radio">
                            <input name="sexo" value="Masculino" type="radio" required />
                            <span class="black-text">Masculino</span>
                        </label>

                        <label class="genero-radio">
                            <input name="sexo" value="Feminino" type="radio" required />
                            <span class="black-text">Feminino</span>
                        </label>
                    </p>
                </div>
                <div class="row center">
                    <button type="submit" class="waves-effect waves-light btn-large red lighten-2 pulse">Salvar</button>
                </div>
            </form>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class="card horizontal">
                    <div class="card-image">
                        <img src="img/materialize.png">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>Formulário desenvolvido na Framework Materialize, que se baseia no Material Design da
                                Google.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <ul class="collection with-header">
                    <li class="collection-header">
                        <h4>Passaram por aqui</h4>
                    </li>
                    <div id="lista">
                        <?php
                        include_once('conecta.php');
                        $sql = 'SELECT * FROM visitantes ORDER BY id DESC';
                        $consulta = $GLOBALS['conecta']->query($sql);
                        while($cadastro = $consulta->fetch_array())
                        {
                            echo '<li class="collection-item">
                            <b>Nome:</b> '.$cadastro['nome'].'<br>
                            <b>Período que Estuda:</b> '.$cadastro['periodoestudo'].'<br>
                            <b>Idade:</b> '.$cadastro['idade'].' anos<br>
                            <b>Sexo:</b> '.$cadastro['sexo'].'
                            </li>';
                        }
                    ?>
                    </div>
                </ul>
            </div>
        </div>
    </section>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script>
        $(document).ready(function () {
            $('select').formSelect();
        })
    </script>
    <?php
        if($log){
            echo "<script> M.toast({html: 'Visita cadastrada'}, 1500); </script>";
        }
    ?>
</body>

</html>