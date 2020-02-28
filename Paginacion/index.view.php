  <!DOCTYPE html>
<html>
<head>
	<title>Paginación</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
	<div class="container">
		<h1>Articulos</h1>
		<section class="articulos">
			<ul>
				<?php foreach ($lst_articulos as $articulo): ?>

				<li><?php echo $articulo['ID'] . '.- ' . $articulo['ARTICULO'] ?></li>

				<?php endforeach;?>
			</ul>
		</section>

		<section class="paginacion">
			<ul>
				<?php if ($pagina == 1): ?>
					<li class="disabled">&laquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina - 1; ?>">&laquo;</a></li>
				<?php endif;?>


				<?php
for ($i = 1; $i <= $numero_de_paginas; $i++) {
    if ($pagina == $i) {
        echo "<li class='active'><a href='?pagina=" . $i . "'>$i</a></li>";
    } else {
        echo "<li><a href='?pagina=" . $i . "'>$i</a></li>";
    }

}

?>
				<?php if ($pagina == $numero_de_paginas): ?>
					<li class="disabled">&raquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina + 1; ?>">&raquo;</a></li>
				<?php endif;?>
			</ul>
		</section>
	</div>
</body>
</html>
