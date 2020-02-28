<?php
try {

    $conexion = new PDO('mysql: host=localhost;dbname=paginacion', 'root', '');

} catch (PDOException $e) {

    echo "ERROR " . $e->getMessage();

    die();
}

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

$post_x_pagina = 5;

$inicio = ($pagina > 1) ? ($pagina * $post_x_pagina - $post_x_pagina) : 0;

$lst_articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulo LIMIT $inicio, $post_x_pagina");

$lst_articulos->execute();
$lst_articulos = $lst_articulos->fetchAll();

if (!$lst_articulos) {
    header('Location: index.view.php');
}

$total_de_Articulos = $conexion->query('SELECT FOUND_ROWS() as total');
$total_de_Articulos = $total_de_Articulos->fetch()['total'];

$numero_de_paginas = ceil($total_de_Articulos / $post_x_pagina);

require 'index.view.php';
