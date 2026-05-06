<?php
require 'config.php';

try {
    // Esta consulta trae los juegos y el nombre de su plataforma
    $stmt = $pdo->query("SELECT juegos.*, plataformas.nombre as plataforma 
                         FROM juegos 
                         JOIN plataformas ON juegos.id_plataforma = plataformas.id");
    $juegos = $stmt->fetchAll();
}
catch (Exception $e) {
    $error_conexion = "Error al conectar con la base de datos: " . $e->getMessage();
    $juegos = [];
}
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking de Videojuegos</title>
    <!-- Importar fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header class="navbar">
        <div class="container">
            <h1>🎮 RankGames</h1>
            <nav>
                <a href="index.php" class="nav-link active">Inicio</a>
                <a href="nuevo.php" class="nav-link">Añadir Juego</a>
            </nav>
        </div>
    </header>
    
    <main class="container">
        <div class="header-actions">
            <h2 class="page-title">Top Videojuegos</h2>
            <a href="nuevo.php" class="btn btn-primary">+ Nuevo Registro</a>
        </div>
        
        <?php if (isset($error_conexion)): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error_conexion); ?></div>
        <?php
endif; ?>

        <div class="table-container">
            <table class="games-table">
                <thead>
                    <tr>
                        <th>Título / Género</th>
                        <th>Plataforma</th>
                        <th>Puntuación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($juegos) && !isset($error_conexion)): ?>
                        <tr>
                            <td colspan="4" style="text-align: center; padding: 3rem;">No hay juegos registrados en la base de datos.</td>
                        </tr>
                    <?php
else: ?>
                        <?php foreach ($juegos as $juego): ?>
                            <tr>
                                <td>
                                    <div class="game-title"><?php echo htmlspecialchars($juego['titulo']); ?></div>
                                    <div class="game-genre"><?php echo htmlspecialchars($juego['genero']); ?></div>
                                </td>
                                <td>
                                    <span class="platform-tag">
                                        <?php echo htmlspecialchars($juego['plataforma'] ?? 'Desconocida'); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php
        $scoreClass = 'low';
        if ($juego['puntuacion'] >= 8.5)
            $scoreClass = 'high';
        elseif ($juego['puntuacion'] >= 6.0)
            $scoreClass = 'mid';
?>
                                    <span class="score <?php echo $scoreClass; ?>">
                                        <?php echo number_format($juego['puntuacion'], 1); ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="#" class="btn-link">Editar</a>
                                </td>
                            </tr>
                        <?php
    endforeach; ?>
                    <?php
endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>