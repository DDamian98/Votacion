<?php 
include_once '../../Models/etc/controller.php';
$_GET = Consultas::limpiar($_GET);
extract($_GET);
$lspartidos= Cargar::partidos();
$mesaquery = Cargar::mesass($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"/>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> 
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
                <a href="../Partidos" >
                    <span class="material-icons-sharp">groups</span>
                    <h3>Partidos Politicos</h3>
                </a>
                <a href="../LugarVotacion" class="active">
                    <span class="material-icons-sharp">where_to_vote</span>
                    <h3>Lugar de Votacion</h3>
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
        <h1>Regitro de Voto</h1>

        <div class="activity-grid">
                    <div class="activity-card">

					<div class="card-body">
						<form action="procesar.php" method="post">
                        <?php 
                            foreach($mesaquery as $lv)
                            {
                            ?>
                        <div class="form-row">
						    <div class ="name">Distrito</div>
						        <div class="value">
						            <div class="input-group">
						                <input class="input--style-5" type="text" name="p_distrito" id="p_distrito" value="<?=$lv['Distrito']?>"   class="string" readonly />
						            </div>
						        </div>
						</div>
                        <div class="form-row">
						    <div class ="name">Nro de Mesa</div>
						        <div class="value">
						            <div class="input-group">
						                <input class="input--style-5" type="text" name="p_distrito" id="p_distrito" value="<?=$lv['Codigo']?>" class="string" readonly />
						            </div>
						        </div>
						</div>
                        <?php 
                            }
                        ?>

						<div class="form-row">
						    <div class ="name">Tipo de Voto</div>
						        <div class="value">
						            <div class="input-group">
                                        <select  class="input--style-5" name="v_tipo" required>
											<option value="Distrital">Distrital</option>
                                            <option value="Provincial">Provincial</option>
											<option value="Regional">Regional</option>

						                </select>             
						            </div>
						        </div>
                        </div>

                        <?php
					        foreach ($lspartidos as $partido){
                        ?>
                        <div class="form-row">
						    <div class ="name" style="color:#7380ec;">
                            <img class ="img-2" src="../../../images/LogoPartido/<?=$partido['logo']?>" alt="">
                            <?=$partido['nombre']?></div>
                                <div class="value">
						            <div class="input-group">
                                    <input type="hidden" name="v_partido[]" id="v_partido[]" value="<?=$partido['nombre']?>" />
						                <input class="input--style-5" type="text" name="v_cantidad[]" id="v_cantidad[]"  placeholder="Ingresar Cantidad Votos"  />
						            </div>
						        </div>
                        </div>
                        <?php						
					    }
                                            
                        ?>					
						<input type="hidden" name="tipo" value="2" />
                        <input type="hidden" name="id" value="<?=$id?>" />
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
    <script type="text/javascript" src="../../../JS/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../../JS/select2/select2.min.js"></script>
    <script type="text/javascript" src="../../../JS/ajax.js"></script>
    

    <script src="../../../JS/toggler.js"></script>
    
</body>
</html>