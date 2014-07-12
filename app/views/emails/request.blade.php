<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Recuperação de Senha</h1>
		Para recuperar sua senha, preencha este formulário:
		{{ URL::route("user_reset") . "?token=" . $token }}
	</body>
</html>