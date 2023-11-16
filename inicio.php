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

        $query = mysqli_query($conexao, "SELECT * FROM aluno");

        


        while($exibe = mysqli_fetch_array($query)){
            if($exibe[4] == "F"){
                echo "A aluna ". $exibe[1]. " portadora do RM 1, RG ". $exibe[2]. " e residente na cidade de ". $exibe[3]. ", está cursando a disciplina de PW2 do TDS <br>";

            }

            else{
                echo "O aluno ". $exibe[1]. " portador do RM 1, RG ". $exibe[2]. " e residente na cidade de ". $exibe[3]. ", está cursando a disciplina de PW2 do TDS <br>";

            }

            
        } 

        echo "<br><hr>";

        $query = mysqli_query($conexao, "SELECT * FROM matricula 
        INNER JOIN aluno 
        ON Matricula_Aluno_Codigo = Aluno_Codigo 
        INNER JOIN curso 
        ON Matricula_Curso_Codigo = Curso_Codigo 
        INNER JOIN disciplina 
        ON Curso_Codigo = Disciplina_Codigo");
        
        while($exibe = mysqli_fetch_array($query)){

            echo "<img src='imgs/".$exibe[8]."' width='150px'>";
            $vogal = ($exibe[7]=="F")?"a":"o";
            echo strtoupper($vogal) . " alun$vogal <b>" . $exibe[4] . "</b>, portando o RM <b>" . $exibe[0] . "</b>, RG <b>" . $exibe[5] . 
            "</b> e residente na cidade de <b>" . $exibe[6] . "</b> está cursando a disciplina de <b>" . $exibe[12] . "</b> do <b>" . $exibe[10] . 
            "</b> <br>";

        } 




        echo "<br><hr>";

        $query = mysqli_query($conexao, "SELECT * FROM matricula 
        INNER JOIN aluno 
        ON Matricula_Aluno_Codigo = Aluno_Codigo 
        INNER JOIN curso 
        ON Matricula_Curso_Codigo = Curso_Codigo 
        INNER JOIN disciplina 
        ON Disciplina_Curso_Codigo = Curso_Codigo
        GROUP BY Aluno_Codigo");
        
        while($exibe = mysqli_fetch_array($query)){

           
            $vogal = ($exibe[7]=="F")?"a":"o";
            echo "<img src='imgs/".$exibe[8]."' width='150px'>";
            echo strtoupper($vogal) . " alun$vogal <b>" . $exibe[4] . "</b>, portando o RM <b>" . $exibe[0] . "</b>, RG <b>" . $exibe[5] . 
            "</b> e residente na cidade de <b>" . $exibe[6] . "</b> está cursando a disciplina de <b>" . $exibe[12] . "</b> do <b>" . $exibe[10] . 
            "</b> <br>";


            $query2 = mysqli_query($conexao, "SELECT disciplina.Disciplina_Nome FROM matricula
            INNER JOIN aluno 
            ON Matricula_Aluno_Codigo = Aluno_Codigo 
            INNER JOIN curso 
            ON Matricula_Curso_Codigo = Curso_Codigo 
            INNER JOIN disciplina 
            ON Disciplina_Curso_Codigo = Curso_Codigo
            WHERE Aluno_Codigo = '$exibe[3]'
            GROUP BY Disciplina_Codigo");

            while($exibe2 = mysqli_fetch_array($query2)){
                echo $exibe2[0]. "<br>";
            }


        } 

    /*
        echo "<br><hr>";

        $query = mysqli_query($conexao, "SELECT * FROM matricula 
        INNER JOIN aluno 
        ON Matricula_Aluno_Codigo = Aluno_Codigo 
        INNER JOIN curso 
        ON Matricula_Curso_Codigo = Curso_Codigo 
        INNER JOIN disciplina 
        ON Disciplina_Curso_Codigo = Curso_Codigo
        GROUP BY Disciplina_Codigo");
        
        while($exibe = mysqli_fetch_array($query)){

            if($query = mysqli_query($conexao, "SELECT * FROM matricula where Matricula_Curso_Codigo = 1");){
                while($exibe = mysqli_fetch_array($query)){
                    echo "<img src='imgs/".$exibe[8]."' width='150px'>";

                    $disciplina = ($exibe[12]=="ETIM-TDS")?"a":"o";
                    $vogal = ($exibe[7]=="F")?"a":"o";
                    echo strtoupper($vogal) . " alun$vogal <b>" . $exibe[4] . "</b>, portando o RM <b>" . $exibe[0] . "</b>, RG <b>" . $exibe[5] . 
                    "</b> e residente na cidade de <b>" . $exibe[6] . "</b> está cursando as disciplinas de <b>" . $exibe[12] . "</b>, <b>" . $exibe[12] ."</b> e <b>" . $exibe[12]  "</b> do <b>" . $exibe[10] . 
                    "</b> <br>";
                    }
            }

            
        } 
*/
       echo "<hr>";

    ?>

</body>
</html>