<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../controllers/UsuarioController.php?action=1" method="POST">
            <label>Nome:</label><input type="text" name="dados[]"><br>
            <label>Email:</label><input type="text" name="dados[]"><br>
            <label>Senha:</label><input type="text" name="dados[]"><br>
            <label>Data Nascimento:</label><input type="text" name="dados[]"><br>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
