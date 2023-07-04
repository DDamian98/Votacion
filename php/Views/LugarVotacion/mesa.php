<?php 
include_once '../../Models/etc/controller.php';

$_GET = Consultas::limpiar($_GET);
extract($_GET);

$lsmesas= Cargar::mesas($id);

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
                <a href="../Partidos" >
                    <span class="material-icons-sharp">groups</span>
                    <h3>Partidos Politicos</h3>
                </a>
                <a href="../LugarVotacion">
                <span class="material-icons-sharp">where_to_vote</span>
                    <h3>Partidos Politicos</h3>
                </a>
                <a href="" class="active">
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
            <h1>Mesa de Sufragio</h1>
            <div class="recent-orders">
                <table id="example">
                    <thead>
                        <tr>
                            <th>Lugar de Votacion</th>
                            <th>Codigo</th>
                            <th>Registrar Voto</th>
                            <th>Ver Votos</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(!empty($lsmesas))
                    {
                        foreach($lsmesas as $mesa)
                        {
                        ?>
                        <tr>
                            <td><?=$mesa['Distrito']?></td>
                            <td><?=$mesa['Codigo']?></td>
                            <td ><a href="crearvoto.php?id=<?=$mesa['m_id']?>" class="">Registrar</a></td>
                            <td ><a href="listavotos.php?id=<?=$mesa['m_id']?>" class="">Ver</a></td>
                        </tr>

                        <?php 
                        }
                    }?>
                        
                    </tbody>
                </table>
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
        <a href="crearmesa.php?id=<?=$id?>" title="Crear Mesa" class="crear">+</a>

        <!-- Section Right End -->
    </div>
    <script src="../../../JS/toggler.js"></script>
    <script src="../../../jquery/jquery-3.3.1.min.js"></script>
    <script src="../../../popper/popper.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../../../js/datatables/datatables.min.js"></script>    
     
    <script type="text/javascript" src="../../../js/main.js"></script>  
</body>
</html>