<?php

echo "<link rel='stylesheet' href='/recursosInformaticos/assets/estilos/login.css'>";

echo "<form action='index.php'>";
echo "<select name='idRol'>";
foreach ($data['roles'] as $rol) {
     $id = $rol -> id;
     $descripcion = $rol -> description;
     echo "<option value='$id'>$descripcion</option>";
}
echo "</select>";
echo "<input type='hidden' name='action' value='processSelectUserRolForm'>";
echo "<input type='submit' value='Entrar'>";
echo "</form>";

