<?php 
include_once '../../Models/etc/controller.php';

$lspartidos= Cargar::partidos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"/>    
    <link rel="stylesheet" href="../../../Css/style.css">
    <link rel="icon" href="../../../images/LogoPartido/Vote.png" type="image/png">

</head>
<body>
    <div class="container">
        <!-- Sidebar Start -->
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../../../images/logo.png" alt="">
                    <h2>MI <span class="danger">VOTO</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar" >
                <a href="../Reportes" >
                    <span class="material-icons-sharp">insights</span>
                    <h3>Reporte</h3>
                </a>
                <a href="../Partidos" class="active">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Partidos Politicos</h3>
                </a>
                <a href="../LugarVotacion">
                    <span class="material-icons-sharp">where_to_vote</span>
                    <h3>Lugar de Votacion</h3>
                </a>
                <a href="../Mesas">
                    <span class="material-icons-sharp">how_to_vote</span>
                    <h3>Mesas de Sufragio</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp"></span>
                    <h3></h3>
                </a>
                
            </div>
        </aside>
        <!-- Sidebar End -->
        <!-- Main Start -->
        <main>
        <h1>Registro de Categorias</h1>

        <div class="activity-grid">
                    <div class="activity-card">

					<div class="card-body">
						<form action="procesar.php" method="post" enctype="multipart/form-data">

						<div class="form-row">
						<div class ="name">Nombre del Partido</div>
						<div class="value">
						<div class="input-group">
						<input class="input--style-5" type="text" name="p_nombre" id="p_nombre" placeholder=" " required maxlength="50" autocomplete="off" class="string" autofocus />
						</div>
						</div>
						</div>
						<div class="form-row">
							<div class ="name">Subir Logo</div>
							<div class="value">
							<div class="input-group">
								<input type="file" name="logo" id="logo" accept="image/*" />
								<output id="salida"></output>
							</div>
							</div>
						</div>				
						<input type="hidden" name="tipo" value="1" />
						<button class="btn btn--LightGreen" style="text-align:center;" type="submit">Guardar</button>

					</form>
						
                    </div> 
					</div>
                    
                </div>

            
        </main>

        <!-- Main End -->
        <!-- Section Right Start -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
            </div>   
        </div>
        <!-- Section Right End -->
    </div>
    <script type="text/javascript" src="../../../JS/ajax.js"></script>
    <script src="../../../JS/toggler.js"></script>
    
</body>
</html>