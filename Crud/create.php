<?php
    include "config.php";

    if(isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST ['email'];
        $senha = $_POST ['senha'];
        $genero = $_POST ['genero'];
    }
     
    $sql = "INSERT INTO 'users' ('nome', 'sobrenome', 'email', 'senha', genero') VALUES ('$nome', '$sobrenome', '$email', '$senha', '$genero')";

    $result = $conn->query($sql);

    if($result == TRUE) {
        echo "New record created succesfully";
    }
    else {
        echo "Error:" . $sql . "<br>". $conn->error;
    }

    $conn->close();

?> 

<!DOCTYPE html>
<html>
<body>
    
<h1> Signup Form</h1>

<form action="" method="POST">
    <fieldset>
        <legend> Informação Pessoal:</legend>
        Nome:<br>
        <input type="text" name="nome">
        <br>
        Sobrenome: <br>
        <input type="text" name="sobrenome">
        <br>
        Senha: <br>
        <input type="password" name="senha">
        <br>
        Gênero: <br>
        <input type="radio" name="gênero" value="Masculino">Masculino
        <input type="radio" name="gênero" value="Feminino">Feminino
        <br><br>
        <input type="submit" name="submit" value="submit">
    </fieldset>
</form>

</body>
</html>