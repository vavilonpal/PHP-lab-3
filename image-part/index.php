<?php

define('PROJECT', 'Capy');
require_once './components/header.php';


$dir = './image/';
// Сканируем содержимое директории
// scandir — Получает список файлов и каталогов, расположенных по  указанному пути.
// Возвращает array, содержащий имена файлов и каталогов, расположенных по  пути, переданному в параметре
$files = scandir($dir);

// Если нет ошибок при сканировании
if ($files === false) {
   return;
}

for ($i = 0; $i < count($files); $i++) {
   // Пропускаем текущий каталог и родительский
   if (($files[$i] != ".") && ($files[$i] != "..")) {
       // Получаем путь к изображению
       $path = $dir . $files[$i]; 
        echo "<img src='$path' alt='Изображение' style='max-width:200px; margin:5px;'>";
   }
}


require_once './components/footer.php';

?>