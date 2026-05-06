<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Juego - Ranking de Videojuegos</title>
    <!-- Importar fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header class="navbar">
        <div class="container">
            <h1>🎮 RankGames</h1>
            <nav>
                <a href="index.php" class="nav-link">Inicio</a>
                <a href="nuevo.php" class="nav-link active">Añadir Juego</a>
            </nav>
        </div>
    </header>
    
    <main class="container form-wrapper">
        <div class="card">
            <h2 class="page-title">Registrar Nuevo Juego</h2>
            
            <?php if (isset($error_conexion)): ?>
                <div class="alert alert-error"><?php echo htmlspecialchars($error_conexion); ?></div>
            <?php endif; ?>

            <!-- Al enviar el formulario podríamos llamar a guadar.php u otro archivo -->
            <form action="index.php" method="POST" class="game-form">
                <div class="form-group">
                    <label for="titulo">Título del Juego</label>
                    <input type="text" id="titulo" name="titulo" required placeholder="Ej: Super Mario Odyssey">
                </div>
                
                <div class="form-group">
                    <label for="genero">Género</label>
                    <input type="text" id="genero" name="genero" required placeholder="Ej: Plataformas en 3D">
                </div>

                <div class="form-row">
                    <div class="form-group half">
                        <label for="puntuacion">Puntuación (0-10)</label>
                        <input type="number" id="puntuacion" name="puntuacion" min="0" max="10" step="0.1" required placeholder="9.5">
                    </div>
                    
                    <div class="form-group half">
                        <label for="id_plataforma">Plataforma</label>
                        <select id="id_plataforma" name="id_plataforma" required>
                            <option value="" disabled selected>-- Selecciona plataforma --</option>
                            <?php foreach ($plataformas as $p): ?>
                                <option value="<?php echo $p['id']; ?>">
                                    <?php echo htmlspecialchars($p['nombre'] . ' (' . $p['fabricante'] . ')'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Guardar Registro</button>
                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
