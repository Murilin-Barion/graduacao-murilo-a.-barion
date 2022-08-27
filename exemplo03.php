<html>
    <head>
        <title>Exemplo 3</title>
    </head>
    <body>
        <form action="exemplo03.php" name="form1" method="post">
            <fildset>
                <h3>Dados Pessoais</h3>
                    <p>Nome: </p>
                    <input type="text" name="nome" required>

                    <p><br>E-mail: </p>
                    <input type="email" name="email" required>

                    <p><br>CPF: </p>
                    <input type="text" name="cpf" maxlength="14" required>
    
                <h3>Graduação</h3>
                    <input type="radio" name="graduacao" value="cienciaDaComputacao" required="required">Ciância da Computação - R$900,00<br>
                    <input type="radio" name="graduacao" value="engenhariaCivil" required="required">Engenharia Civil - R$1200,00<br>
                    <input type="radio" name="graduacao" value="direito" required="required">Direito - R$1100,00<br>
                   
                <h3>Já possui curso superior?</h3>
                    <input type="radio" name="cursoSuperior" value="0" required="required">Sim<br>
                    <input type="radio" name="cursoSuperior" value="1" required="required">Não<br>

                <h3>Mini cursos</h3>
                    <input type="checkbox" name="javaComOracle">Java com Oracle - R$300,00<br>
                    <input type="checkbox" name="desenhoIndustrial">Desenho Industrial - R$400,00<br>
                    <input type="checkbox" name="direitoAdministrativo">Direito Administrativo - R$250,00<br>

                <h3>Disciplinas Adicionais</h3>
                    <input type="checkbox" name="estruturaDeDados">Estrutura de Dados<br>
                    <input type="checkbox" name="calculo3">Calculo 3<br>
                    <input type="checkbox" name="direitoAdministrativo">Direito Tributário<br>

                <h3>Horário</h3>
                    <input type="radio" name="horario" value="Diurno" required="required">Diurno<br>
                    <input type="radio" name="horario" value="Noturno" required="required">Noturno<br>

                <h3>Termos</h3>
                    <input type="checkbox" name="termos" value="termos" required>Concordo com os termos da inscrição<br>

                <input type="submit" name="enviar" value="Cadastrar">
                <input type="reset" value="Limpar"> 
            </fildset>
        </form>

        <?php
            require_once "conexao.php";

            if(isset($_REQUEST["enviar"]))
            {
                $nome = $_REQUEST["nome"];
                $email = $_REQUEST["email"];
                $cpf = $_REQUEST["cpf"];
                $graduacao = $_REQUEST["graduacao"];
                $cursoSuperiorYN = $_REQUEST["cursoSuperior"];
                $horario = $_REQUEST["horario"];
                $valorTotal = 0;
                $valorMiniCursos = 0;
                $valorCurso = 0;
                $javaComOracle = 0;
                $desenhoIndustrial = 0;
                $direitoAdministrativo = 0;
                $estruturaDeDados = 0;
                $calculo3 = 0;
                $direitoTributario = 0;

                switch ($graduacao) {
                    case "cienciaDaComputacao":
                        $graduacao = "Ciência da Computação";
                        $valorCurso = 900;
                        break;
                    case "engenhariaCivil":
                        $graduacao = "Engenharia Civil";
                        $valorCurso = 1200;
                        break;
                    case "direito":
                        $graduacao = "Direito";
                        $valorCurso = 1100;
                        break;
                }

                switch ($cursoSuperiorYN) {
	                case 0:
                        $cursoSuperiorYN = "Não";
                        break;
                    case 1:
                        $cursoSuperiorYN = "Sim";
                        break;
		        }


                if(isset($_REQUEST["javaComOracle"]))
                {
                    $miniCursos = "Java com Oracle";
                    $javaComOracle = "Java com Oracle";
                    $valorMiniCursos = 300;
                    $valorTotal = $valorCurso + $valorMiniCursos;
                }

                if(isset($_REQUEST["termos"])){
                    $termosYN = "Sim";
                }
                else {
	                $termosYN = "Não";
                }


                if(isset($_REQUEST["desenhoIndustrial"]))
                {
                    if(isset($miniCursos))
                    {
                        $miniCursos = $miniCursos. ", Desenho Industrial";
                        $desenhoIndustrial = "Desenho Industrial";
                        $valorMiniCursos = $valorMiniCursos + 400;
                        $valorTotal = $valorCurso + $valorMiniCursos;
                    }
                    else 
                    {
                        $miniCursos = "Desenho Industrial";
                        $desenhoIndustrial = "Desenho Industrial";
                        $valorMiniCursos = 400;
                        $valorTotal = $valorCurso + $valorMiniCursos;
                    }
                }

                if(isset($_REQUEST["direitoAdministrativo"]))
                {
                    if(isset($miniCursos))
                    {
                        $miniCursos = $miniCursos. ", Direito Administrativo";
                        $direitoAdministrativo = "Direito Administrativo";
                        $valorMiniCursos = $valorMiniCursos + 250;
                        $valorTotal = $valorCurso + $valorMiniCursos;
                    }
                    else 
                    {
                        $miniCursos = "Direito Administrativo";
                        $direitoAdministrativo = "Direito Administrativo";
                        $valorMiniCursos = 250;
                        $valorTotal = $valorCurso + $valorMiniCursos;
                    }
                }

                if(isset($_REQUEST["estruturaDeDados"]))
                {
                    $diciplinasAdicionais = "Estrutura de Dados";
                    $estruturaDeDados = "Estrutura de Dados";
                }

                if(isset($_REQUEST["calculo3"]))
                {
                    if(isset($diciplinasAdicionais))
                    {
                        $diciplinasAdicionais = $diciplinasAdicionais. ", Cálculo 3";
                        $calculo3 = "Cálculo 3";
                    }
                    else 
                    {
                        $diciplinasAdicionais = "Cálculo 3";
                        $calculo3 = "Cálculo 3";
                    }
                }

                if(isset($_REQUEST["direitoAdministrativo"]))
                {
                    if(isset($diciplinasAdicionais))
                    {
                        $diciplinasAdicionais = $diciplinasAdicionais. ", Direito Tributário";
                        $direitoAdministrativo = "Direito Tributário";
                    }
                    else 
                    {
                        $diciplinasAdicionais = "Direito Tributário";
                        $direitoAdministrativo = "Direito Tributário";
                    }

                }
        
                try{
				    $sql = $conn->prepare("INSERT INTO tb_graduacao( nome, email, cpf, graduacao, curso_superiorYN, mini_cursos, disciplinas_adicionais, horario, termosYN, vlr_total, vlr_mini_cursos, vlr_cursos, ativo)
                                            VALUES( :nome, :email, :cpf, :graduacao, :curso_superiorYN, :mini_cursos, :disciplinas_adicionais, :horario, :termosYN, :vlr_total, :vlr_mini_cursos, :vlr_cursos, :ativo)");
                                            
                    $sql->bindValue(':nome', $nome);
                    $sql->bindValue(':email', $email);
                    $sql->bindValue(':cpf', $cpf);
                    $sql->bindValue(':graduacao', $graduacao);
                    $sql->bindValue(':curso_superiorYN', $cursoSuperiorYN);
                    $sql->bindValue(':mini_cursos', $miniCursos);
                    $sql->bindValue(':disciplinas_adicionais', $diciplinasAdicionais);
                    $sql->bindValue(':horario', $horario);
                    $sql->bindValue(':termosYN', $termosYN);
                    $sql->bindValue(':vlr_total', $valorTotal);
                    $sql->bindValue(':vlr_mini_cursos', $valorMiniCursos);
                    $sql->bindValue(':vlr_cursos', $valorCurso);
                    $sql->bindValue(':ativo', 1);

                    $sql->execute();
                }
                catch (PDOException $erro){
                    echo $erro->getMessage();
                }
                
            }
                ?>

        <h1>Consulta</h1>

        <table border=1 >
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">CPF</th>
                <th scope="col">Graduação selecionada</th>
                <th scope="col">Valor da Graduação</th>
                <th scope="col">Possui curso superior?</th>
                <th scope="col">Mini curso(s)</th>
                <th scope="col">Valor total do(s) mini curso(s)</th>
                <th scope="col">Disciplina(s) adicional(is)</th>
                <th scope="col">Horário</th>
                <th scope="col">Valor Total</th>
                <th scope="col">Ações</th>
            </tr>

            <?php 

            try{
        
                //cria a variavel consulta que ira armazenar resultado sql
                $consulta = $conn->prepare("SELECT * FROM tb_graduacao WHERE ativo= 1;");
                $consulta->execute();

                //codigo para consulta 
                while ( $row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?> 

                <tr>
                    <td><?php echo $row["nome"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["cpf"]?></td>
                    <td><?php echo $row["graduacao"]?></td>
                    <td><?php echo $row["vlr_cursos"]?></td>
                    <td><?php echo $row["curso_superiorYN"]?></td>
                    <td><?php echo $row["mini_cursos"]?></td>
                    <td><?php echo $row["vlr_mini_cursos"]?></td>
                    <td><?php echo $row["disciplinas_adicionais"]?></td>
                    <td><?php echo $row["horario"]?></td>
                    <td><?php echo $row["vlr_total"]?></td>
                    <td>
                        <a href="exemplo03.php?id=<?php echo $row["cod_graduacao"]; ?>">Detalhes</a>
                        <a href="editar.php?ed=<?php echo $row["cod_graduacao"];  ?>">Editar</a>
                        <a href="exemplo03.php?ex=<?php echo $row["cod_graduacao"]; ?>">Excluir</a>
                    </td>
                <tr>
                <?php   
                } 

            }
            catch (PDOException $erro) {
            echo $erro->getMessage();
            }

            try{

                if(ISSET($_REQUEST["ex"]))
                {

                    $cod_boletim = $_REQUEST["ex"];
                    $delete = $conn->prepare("UPDATE tb_boletim SET ativo = 0 WHERE cod_boletim=:cod_boletim;");
                    $delete->bindValue(':cod_boletim', $cod_boletim);
                    $delete->execute();

                    echo"<script language=javascript>alert('O aluno foi excluído com Sucesso !!'); location.href = 'exemplo01.php';</script>
                    ";
                    header("location:exemplo01.php");
                }

            }
            catch(PDOException $erro)
            {
                echo $erro->getMessage();
            }

            ?>
        </table>
    </body>
</html>

