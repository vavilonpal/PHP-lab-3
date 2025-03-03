<?php

require './components/header.php';


$dir = './i';
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
       $path = $dir . $files[$i]; ?>
       <!-- Выведите картинку на экран ->
   <?php
   }
}

require './components/footer.php';
?>