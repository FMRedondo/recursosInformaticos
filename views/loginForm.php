<?php

if (isset($data['errorMsg'])) {
    echo "<p style='color:red'>" . $data['errorMsg'] . "</p>";
}
if (isset($data['infoMsg'])) {
    echo "<p style='color:blue'>" . $data['infoMsg'] . "</p>";
}

echo "<link rel='stylesheet' href='/assets/estilos/login.css'>";

echo "<form action='index.php'>
        <img src='/assets/img/escudo.png' alt='escudo celia' class='logoCelia'>
        <label>
            <input type='text' name='email' placeholder='Introduce tu usuario'>
        </label>
        <label>
            <input type='password' name='pass' placeholder='Introduce tu contraseña'><br>
        </label>
        <input type='hidden' name='action' value='processLoginForm'>
        <input type='submit'>
      </form>";

