<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
		*{
			margin: 0;
			padding: 0;
			border: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #cfdbe6;
			font-family:sans-serif;
  			justify-content: center;
		}
		.container{
			text-align: center;
			margin-top: 10%;
		}
		#name, #sobrenome{
			width: 20%;
			height: 25px;
			border-radius: 9px;
			padding: 4px;
		}
		#cpf, #telefone, #data, #email{
			width: 50%;
			height: 25px;
			border-radius: 9px;
			padding: 4px;
		}
		#buto{
			width: 20%;
			height: 25px;
			border-radius: 9px;
		}
	</style>
</head>
<body>
    <div class="container">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="formulario">
		<center><h1 id="titulo">Formulario em PHP </h1></center>
		<strong><label>Nome:</label></strong>
		<input id="name" name="name" class="nome" placeholder="Digite seu nome" type="text" required/>

		<strong><label>Sobrenome:</label></strong>
		<input id="sobrenome" name="sobrenome" class="nome" placeholder="Digite seu sobrenome" type="text" required/>

		<br><br>
		<strong><label>CPF:</label></strong>
		<input id="cpf" name="cpf" class="cpf" placeholder="Digite seu CPF"size="50" type="text" required/>

		<br><br>
		<strong><label>Telefone:</label></strong>
		<input id="telefone" name="telefone" class="telefone" placeholder="Exemplo: (DDD) 0000-0000"size="50" type="text" required/>

		<br><br>
		<strong><label>Data de Nascimento:</label></strong>
		<input id="data" name="data" class="data" size="50" type="date" required/>

		<br><br>
		<strong><label>E-mail</label></strong>
		<input id="email" name="email" class="email" placeholder="Digite seu E-mail"size="50" type="email" required/>
		<br><br>

		<input type="checkbox" id="check" name="check"><strong><label  for="">Você é estudante?</label></strong>

		<center><button id="buto" name="buto" type="submit"><strong>Entrar</strong></button></center><br>
	</form>
	</div>
	<div class="oi">

	</div>
	<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["name"];
        $sobrenome = $_POST["sobrenome"];
        $cpf = $_POST["cpf"];
        $telefone = $_POST["telefone"];
        $data = $_POST["data"];
        $email = $_POST["email"];
        $status = isset($_POST["check"]) ? "sim" : "não";

        // Verificar e ajustar o formato do CPF
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) !== 11) {
            echo "Erro! CPF deve conter 11 digitor.";
            exit();
        }

        // Verificar e ajustar o formato do telefone
        $telefone = preg_replace('/[^0-9]/', '', $telefone);
        if (strlen($telefone) !== 11) {
            echo "Erro! Telefone deve conter 11 digitos.";
            exit();
        }

		$date = new DateTime($data);
                $interval = $date->diff( new DateTime(date("Y-m-d")));
                $idade = $interval->format("%Y");

        echo "Eu $nome $sobrenome, $status sou estudante. Meu número de CPF é $cpf, nasci em $data e tenho $idade anos. Meu telefone de contato é $telefone e meu e-mail é $email";
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && empty($_POST)) {
        echo "Erro! Formulário não enviado";
    }
?>
</body>
</html>