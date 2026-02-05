<?php
$folder = './uploads';

echo "<h2>Diagnóstico de Permisos</h2>";
echo "Usuario actual de PHP (quién soy): <b>" . exec('whoami') . "</b><br>";
echo "Carpeta destino: <b>" . $folder . "</b><br>";

if (file_exists($folder)) {
    echo "Estado: ✅ La carpeta existe.<br>";
    
    if (is_writable($folder)) {
        echo "Permisos: ✅ <b>SÍ</b> tengo permiso para escribir. (El problema está en tu código PHP de main.php)";
    } else {
        echo "Permisos: ❌ <b>NO</b> tengo permiso de escritura. (Necesitas usar chown/chmod)";
    }
} else {
    echo "Estado: ❌ La carpeta NO existe.";
}
?>