<?php
    include "config.php";

    if(isset($_POST['update'])) {
        $firstname = $_POST['nome'];
        $user_id = $_POST['id'];
        $lastname = $_POST['sobrenome'];
        $email = $_POST['email'];
        $gender = $_POST['gênero'];
        $passowrd = $_POST['senha'];
        
        $sql = "UPDATE 'users' SET 'nome' = '$firstname', 'sobrenome' = '$lastname', 'email' = '$email', 'senha' = '$password', 'gender' = '$gender' WHERE 'id' = '$user_id'";

        $result = $conn->query($sql);

        if($result == TRUE) {
            echo "Record Updated Succesfully";
        }
        else {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }

    if(isset($_GET['id'])) {
        $user_id = $_GET['id'];

        $sql = "SELECT *FROM 'users' WHERE 'id'='$user_id'";

        $result = $cann->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $first_name = $row['nome'];
                $lastname = $row['sobrenome'];
                $email = $row['email'];
                $passowrd = $row['senha'];
                $gender = $row['gênero'];
                $id = $row['id'];
            }
        ?>
            <h2> User Update Form</h2>
            <form action="" method="post"> 
            <fieldset> 
            <legend> Informação Pessoal: </legend>
            Nome: <br>
            <input type="text" name="nome" value="<?php echo $first_name; ?>">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <br>
            Sobrenome: <br>
            <input type="text" name="sobrenome" value="<?php echo $lastname; ?>">
            <br>
            Email:<br>
            <input type="email" name="email" value="<?php echo $email; ?>">
            <br>
            Gênero: <br>
            <input type="radio" name="gênero" value="Masculino" <?php if ($gender == 'Masculino'){ echo "checked";} ?> >Masculino
            <input type="radio" name="gênero" value="Feminino"  <?php if ($gender == 'Feminino'){echo "checked";} ?> >Feminino
            <br><br>
            <input type="submit" value="Uptade" name="uptade">
            </fieldset>
            </form>

        </body>
        </html>

        <?php
        } else{
            header('Location: view.php');
        }
    }
    ?>