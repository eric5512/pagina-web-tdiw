<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="..\css\css.css">
    </head>

    <header>
        <h1>Formulari de registre</h1>
    </header>
    <body>
        <form id="formulario" method="post" action="/pagina_onde_haga_falta.php">
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom"><br>
            <label for="cognoms">Cognoms: </label><br>
            <input type="text" id="cognoms" name="cognoms"><br>
            <label for="email">Correu Electronic: </label><br>
            <input type="email" id="correu" name="correu"><br>
            <label for="password">Contrasenya: </label><br>
            <input type="password" id="password" name="password"><br>
            <label for="adresa">Adresa: </label><br>
            <input type="text" id="adresa" name="adresa"><br>
            <label for="poblacio">Poblacio: </label><br>
            <input type="text" id="poblacio" name="poblacio"><br>
            <label for="CP">Codi Postal: </label><br>
            <input type="number" id="number" name="number"><br><br>
            <input type="submit" value="Enviar!">
        </form>
    </body>
</html>