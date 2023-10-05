<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página PHP</title>
</head>
<body>
    
    <h2>Resultado: </h2>
    <hr>

    <?php 

        $servidor = "127.0.0.1";
        $usuario = "root";
        $senha = "";
        $banco = "escola";

         //conexao com o servidor, seleciona o servidor utilizado, usuário e a senha
        $conexao = mysqli_connect($servidor, $usuario, $senha);

        //if($conexao){echo "Conectado!";} else{echo "Erro na conexão!";}

        //conexao com o banco, seleciona o banco
        mysqli_select_db($conexao, $banco);

        //ex: coloca um ç e não da erro de caracter
        mysqli_set_charset($conexao, "UTF8");

        //roda a query
        $query = mysqli_query($conexao, "SELECT * FROM aluno where Aluno_Cidade = 'Registro'");

        //organiza a query como uma matriz
        while($exibe = mysqli_fetch_array($query)){
            echo $exibe[1] . "<br>";
        } 


        echo "<hr>";

        $query = mysqli_query($conexao, "SELECT * FROM aluno where Aluno_Cidade = 'Registro';");

        while($exibe = mysqli_fetch_array($query)){
            if($exibe[4] == "F"){
                echo "A aluna ". $exibe[1]. " portadora do RM 1, RG ". $exibe[2]. " e residente na cidade de ". $exibe[3]. ", está cursando a disciplina de PW2 do TDS <br>";

            }

            else{
                echo "O aluno ". $exibe[1]. " portador do RM 1, RG ". $exibe[2]. " e residente na cidade de ". $exibe[3]. ", está cursando a disciplina de PW2 do TDS";

            }

        } 

    
       /* echo "<hr>";

        $query = mysqli_query($conexao, "SELECT Aluno_Nome, aluno_rg, aluno_cidade from aluno where aluno_codigo = 1;");
        $exibe = mysqli_fetch_array($query);
        echo "A aluna ". $exibe[0]. " portadorado do RM 1, RG ". $exibe[1]. " e residente na cidade de ". $exibe[2]. ", está cursando a disciplina de PW2 do TDS";
       */ 


        

    ?>

</body>
</html>