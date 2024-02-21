<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calcular a Média do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>

<style>

body{
    font-family: "Chivo", sans-serif;
}
table {
    text-align: center;
    border-radius: 10px;   
}
th{
    width : 30%;
}
td{
    border:none;
}
.container{
    display: flex;
    justify-content: center;
    text-align: center;
}
</style>

<br>
<div class="container">
    <h2> Calcule Sua Média </h2><br><br>
</div>
<br>
    <div class="container">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="number" name="prova1" min="0" max="10" class="form-control" placeholder="Prova 1" required><br>
        <input type="number" name="prova2" min="0" max="10" class="form-control" placeholder="Prova 2" required><br>
        <input type="number" name="provaint" min="0" max="2" step="any" class="form-control" placeholder="Integrativa" required><br>
        <input type="submit" name="submit" value="Calcular Media Final" class="btn btn-danger"><br>
</div>

    <?php
    // Verifica se o formulário foi submetido
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos foram preenchidos
            if (isset($_POST["prova1"]) && isset($_POST["prova2"]) && isset($_POST["provaint"])) {

                // Obtém os notas do formulário
                $prova1 = $_POST["prova1"];
                $prova2 = $_POST["prova2"];
                $provaint = $_POST["provaint"];

                //calcular o peso da p1
                $prova1med40 = $prova1 * 0.4;
                //calcula o peso da p2
                $prova2med40 = $prova2 * 0.4;
                //calcula o peso da p2 + int
                $prova2med60 = ($prova2med40) + ($provaint);
                //calcula a média
                $mediafinal = $prova1med40 + $prova2med60;


                //verifica se o aluno esta aprovado o não
                if ($mediafinal >= 6) {
                    $result = 'APROVADO!';
                }
                else{
                    $result = 'REPROVADO :(';
                }
                echo "<br>";
                echo "<div class='container'>";
                echo "<table class = 'table table-hover'>";
                echo "<tr>";
                echo "<th>Prova</th>";
                echo"<th>Nota Sem Peso</th>";
                echo"<th>Nota Com Peso</th>";
                echo"</tr>";

                echo "<tr>";
                echo "<th>P1</th>";
                echo"<th>$prova1</th>";
                echo"<th>$prova1med40</th>";
                echo"</tr>";

                echo "<tr>";
                echo "<th>P2</th>";
                echo"<th>$prova2</th>";
                echo"<th>$prova2med40 + $provaint (int)</th>";
                echo"</tr>";
                echo "</table>";
                echo "</div>";

                    echo "<div class='container'>";
                    echo "<table class='table table-hover'>";
                    echo "<tr>";
                    echo "<th>Media Final</th>";
                    echo"<th>$mediafinal</th>";
                    echo"<th>$result</th>";
                    echo"</tr>";
                    echo "</table>";
                    echo "</div><br>";
            
            } else {
                echo "<p>Por favor, preencha ambos os campos.</p>";
            }
        }    
    ?>
    <br>
    <div class="container">
    <p>Ref: P1 = 40% | P2 = 40% | INT = 20% | Média de corte = 6</p>
    </div>
</body>
</html>