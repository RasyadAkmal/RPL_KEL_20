<!DOCTYPE html>
<html lang="en">
<head>
<title>Login INDRA</title>
<link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
    <div class="container">
        <img src="ditlantas.png">
        <h3>LOGIN</h3>
        <form class="form" action="./loginproses.php" method="POST">
            <input type="text" name="username" placeholder="username" id="username"/><br/>
            <input type="password" name="password" placeholder="password" id="password"/><br/>
            <input type="submit" name="submit"/>
        </form>
    </div>
</body>
</html>