<?php
    function signIn($conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && strlen($_POST['password']) >= 4) {
            $nom     = $_POST['nom'];
            $cognoms = $_POST['cognoms'];
            $pass    = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $email   = $_POST['correu'];
            $cp      = $_POST['number'];
            $carrer  = $_POST['adresa'];

            $filtros = filter_input_array(
                INPUT_POST, array($nom     => FILTER_SANITIZE_STRING,
                                $cognoms => FILTER_SANITIZE_STRING,
                                $pass    => FILTER_DEFAULT,
                                $email   => FILTER_VALIDATE_EMAIL,
                                $cp      => FILTER_VALIDATE_INT,
                                $carrer  => FILTER_SANITIZE_STRING)
            );

            if (in_array(false, $filtros, true)) {
                echo "Comprueba los datos antes de volver a enviar el formulario";
                return -1;
            }

            $query = $conn->prepare("SELECT email FROM usuari WHERE email=:email");

            if (!$query->execute(array(":email" => $email))) {
                echo "Error ejecutando la consulta";
                return -1;
            }
            
            if ($query->rowCount() > 0) {
                echo "El correo electronico ya esta en la base de datos";
                return -1;
            }

            $query = $conn->prepare("INSERT INTO usuari (nom, cognoms, password, email, cp, carrer) VALUES (:nom, :cognoms, :password, :email, :cp, :carrer)");

            if (!$query->execute(array(":nom"=> $nom, ":cognoms"=> $cognoms, ":password"=> $pass, ":email"=> $email, ":cp"=> $cp, ":carrer"=> $carrer))) {
                echo "Error ejecutando la consulta";
                return -1;
            }

            $query = $conn->prepare("SELECT usuari_id FROM usuari WHERE email=:email");

            if (!$query->execute(array(":email" => $email))) {
                echo "Error ejecutando la consulta";
                return -1;
            }

            $user = $query->fetchAll(PDO::FETCH_ASSOC);

            return $user[0]['usuari_id'];
        }
        return -1;
    }
?>