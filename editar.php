<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    <?php
        
            include "conexao.php";
            if(isset($_REQUEST["ed"])){
                try{

                    $cod_graduacao = $_REQUEST['ed'];
                    $consulta = $conn->prepare("SELECT * FROM tb_graduacao WHERE cod_graduacao = :cod_graduacao ;");
                    $consulta->bindValue('cod_graduacao', $cod_graduacao);
                    $consulta->execute();
                    $row= $consulta->fetch(PDO::FETCH_ASSOC);
                

                }catch (PDOException $erro){
                    echo $erro->getMessage();
                }
            }
        if(isset($_REQUEST["btn_alterar"])){
            try{
                require "conexao.php";


                

                $cod_graduacao = $_REQUEST["cod_graduacao"];
                $nome = $_REQUEST["nome"];
                $email = $_REQUEST["email"];
                $cpf = $_REQUEST["cpf"];
                $graduacao = $_REQUEST["graduacao"];
                $curso_superior = $_REQUEST["curso_superior"];
                $horario = $_REQUEST["horario"];
                $termos = (!empty($_REQUEST["termos"])) ?  $_REQUEST["termos"] : "Não";
                $valorCurso = 0;

                switch ($graduacao) {
                    case "Ciência da Computacao":
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

                if(isset($_REQUEST["direitoTributario"]))
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

                $UPDATE = $conn->prepare("UPDATE tb_graduacao SET nome= :nome, email= :email, cpf= :cpf, graduacao= :graduacao, curso_superiorYN= :curso_superior, mini_cursos= :mini_cursos, disciplinas_adicionais= :disciplinas_adicionais, horario= :horario, termosYN= :termos, vlr_mini_cursos= :vlr_mini_cursos, vlr_cursos= :vlr_cursos, vlr_total= :vlr_total WHERE cod_graduacao= :cod_graduacao");

                $UPDATE->bindValue(":nome", $nome);
                $UPDATE->bindValue(":email", $email);
                $UPDATE->bindValue(":cpf", $cpf);
                $UPDATE->bindValue(":graduacao", $graduacao);
                $UPDATE->bindValue(":curso_superior", $curso_superior);
                $UPDATE->bindValue(":mini_cursos", $miniCursos);
                $UPDATE->bindValue(":disciplinas_adicionais", $diciplinasAdicionais);
                $UPDATE->bindValue(":horario", $horario);
                $UPDATE->bindValue(":termos", $termos);
                $UPDATE->bindValue(":vlr_mini_cursos", $valorMiniCursos);
                $UPDATE->bindValue(":vlr_cursos", $valorCurso);
                $UPDATE->bindValue(":vlr_total", $valorTotal);
                $UPDATE->bindValue(":cod_graduacao", $cod_graduacao);

                $UPDATE->execute();

                echo"<script language=javascript>
                alert('Dados gravados com sucesso');
                location.href='exemplo03.php'</script>";

                $conn = null;
            }
            catch (PDOException $erro){
                echo $erro->getMessage();
            }
        }
    ?>
</body>
</html>

<div align="center">
<fildset>
    <legend>Formulário de Inscrição</legend>

    <form name="frm" method="POST" action="editar.php">
        <h2> Dados Pessoais - Alterar</h2>
            <p>Id: <input type="text" name="cod_graduacao" value = "<?php echo $row["cod_graduacao"] ?>" maxlength="50" size="25" required>
            <p>Nome: <input type="text" name="nome" value = "<?php echo $row["nome"] ?>" maxlength="50" size="25" required>
            <p>E-mail: <input type="text" name="email" value = "<?php echo $row["email"] ?>" maxlength="50" size="25" required>
            <p>CPF: <input type="text" name="cpf" value = "<?php echo $row["cpf"] ?>" maxlength="50" size="25" required>
        
        <h2>Graduação</h2>
        <?php
            $cp = $row["graduacao"] == "Ciência da Computação" ? "checked='checked'": "";
            $ec = $row["graduacao"] == "Engenharia Civil" ? "checked='checked'": "";
            $d = $row["graduacao"] == "Direito" ? "checked='checked'": "";
        ?>
            <p><input type="radio" name="graduacao" value="Ciência da Computação" <?php echo $cp ?> > Ciência da Computação - R$900,00 </p>
            <p><input type="radio" name="graduacao" value="Engenharia Civil" <?php echo $ec ?> > Engenharia Civil - R$1200,00 </p>
            <p><input type="radio" name="graduacao" value="Direito" <?php echo $d ?> > Direito - R$1100,00 </p>
        <h2>Possui Curso Superior?</h2>
        <?php
            $s = $row["curso_superiorYN"] == "Sim" ? "checked='checked'": "";
            $n = $row["curso_superiorYN"] == "Não" ? "checked='checked'": "";
        ?>
            <p><input type="radio" name="curso_superior" value = "Sim" <?php echo $s ?> > Sim</p>
            <p><input type="radio" name="curso_superior" value = "Não" <?php echo $n ?> > Não</p>
        <h2>Mini Cursos</h2>
        <?php
            $mini_curso = explode(', ',$row["mini_cursos"]);

            $m1 = $mini_curso[0] == "Java com Oracle" ? "checked='checked'" : 0;

            if($mini_curso[0] == "Desenho Industrial"){
                $m2 = "Desenho Industrial";
            }elseif($mini_curso[1] == "Desenho Industrial"){
                $m2 = "Desenho Industrial";
            }else{
                $m2 = 0;
            }

            if($mini_curso[0] == "Direito Administrativo"){
                $m3 = "Direito Administrativo";
            }elseif($mini_curso[1] == "Direito Administrativo"){
                $m3 = "Direito Administrativo";
            }elseif($mini_curso[2]){
                $m3 = "Direito Administrativo";
            }else{
                $m3 = 0;
            }
        ?>
            <p><input type="checkbox" name="javaComOracle" value="Java com Oracle - R$300,00"<?php echo $m1 ?>>Java com Oracle - R$300,00</p>
            <p><input type="checkbox" name="desenhoIndustrial" value="Desenho Industrial - R$400,00" <?php echo $m2 ?>>Desenho Industrial - R$400,00</p>
            <p><input type="checkbox" name="direitoAdministrativo" value="Direito Administrativo - R$250,00" <?php echo $m3 ?>>Direito Administrativo - R$250,00</p>

        <h2>Disciplinas Adicionais</h2>
        <?php
            $disciplinas_adicionais = explode(', ',$row["disciplinas_adicionais"]);

            $d1 = $disciplinas_adicionais[0] == "Estrutura de Dados" ? "checked='checked'" : 0;

            if($disciplinas_adicionais[0] == "Cálculo 3"){
                $d2 = "Cálculo 3";
            }elseif($disciplinas_adicionais[1] == "Cálculo 3"){
                $d2 = "Cálculo 3";
            }else{
                $d2 = 0;
            }
            

            if($disciplinas_adicionais[0] == "Direito Tributário"){
                $d3 = "Direito Tributário";
            }elseif($disciplinas_adicionais[1] == "Direito Tributário"){
                $d3 = "Direito Tributário";
            }elseif($disciplinas_adicionais[2]){
                $d3 = "Direito Tributário";
            }else{
                $d3 = 0;
            }



        ?>
            <p><input type="checkbox" name="estruturaDeDados" value="Estrutura de Dados" <?php echo $d1 ?> >Estrutura de Dados</p>
            <p><input type="checkbox" name="calculo3" value="Cálculo 3" <?php echo $d2 ?> >Cálculo 3</p>
            <p><input type="checkbox" name="direitoTributario" value="Direito Tributário"<?php echo $d3 ?>>Direito Tributário</p>

        <h2>Horário</h2>
        <?php
            $h1 = $row["horario"] == "Diurno" ? "checked='checked'" : 0;
            $h2 = $row["horario"] == "Noturno" ? "checked='checked'" : 0;
        ?>
            <p><input type="radio" name="horario" value="Diurno" <?php echo $h1 ?>>Diurno</p>
            <p><input type="radio" name="horario" value="Noturno" <?php echo $h2 ?>>Noturno</p>
        
        <h2>Termos</h2>
        <?php
            $t = $row["termosYN"] == "Sim" ? "checked='checked'" : 0;
        ?>
            <p><input type="radio" name="termos" value="Sim" <?php echo $t ?>> Concordo com os Termos de Inscrição</p>

        <input type="submit" name="btn_alterar" valeu="Alterar">
        <input type="reset" name="Btnlimpar" valeu="Limpar">
    </form>
</fildset>