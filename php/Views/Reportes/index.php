<?php 
include_once '../../Models/etc/controller.php';

$totalR= Cargar::reporttotal('Regional');
$totalP= Cargar::reporttotal('Provincial');
$totalD= Cargar::reporttotal('Distrital');

$ganadorR = Cargar::reportganador('Regional');
$ganadorP = Cargar::reportganador('Provincial');
$ganadorD = Cargar::reportganador('Distrital');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votación</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet"/>    
    <link rel="stylesheet" href="../../../Css/style2.css">
    <link rel="icon" href="../../../images/LogoPartido/Vote.png" type="image/png">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>
    <div class="container">
        <!-- Sidebar Start -->
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../../../images/LogoPartido/Vote.png" alt="">
                    <h2>MI <span class="danger">VOTO</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>
            <div class="sidebar" >
                <a href="../Reportes" class="active">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Reporte</h3>
                </a>
                <a href="../Partidos">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Partidos Politicos</h3>
                </a>
                <a href="../LugarVotacion">
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
            <h1>Reporte</h1>
         
            <div class="insights">
                <!-- Cards Start -->
                <div class="sales">
                    <span class="material-icons-sharp">how_to_vote</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Votos - Regional</h3>
                            <?php 
                             if(!empty($totalR))
                             {
                            foreach($totalR as $regional)
                            {
                            ?>
                            <h1><?=$regional['Cantidad']?></h1>
                            <?php 
                            }}
                            ?>
                        </div>
                  
                </div>
            </div>
            <!-- Cards Start -->
            <div class="expenses">
                    <span class="material-icons-sharp">how_to_vote</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Votos - Provincial</h3>
                            <?php 
                            if(!empty($totalP))
                            {
                            foreach($totalP as $provincial)
                            {
                            ?>
                            <h1><?=$provincial['Cantidad']?></h1>
                            <?php 
                            }}
                            ?>
                        </div>
                  
                </div>
            </div>
            <!-- Cards Start -->
            <div class="income">
                    <span class="material-icons-sharp">how_to_vote</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Votos - Distrital</h3>
                            <?php 
                             if(!empty($totalD))
                             {
                            foreach($totalD as $distrital)
                            {
                            ?>
                            <h1><?=$distrital['Cantidad']?></h1>
                            <?php 
                            }}
                            ?>
                        </div>
                    
                </div>
            </div>
            </div>
            <div class="recent-orders">
                <figure class="highcharts-figure">
                    <div id="container1" style="width=600px;"></div>
                </figure>
            </div>
            <div class="recent-orders">
                <figure class="highcharts-figure">
                    <div id="container2" style="width=600px;"></div>
                </figure>
            </div>
            <div class="recent-orders">
                <figure class="highcharts-figure">
                    <div id="container3" style="width=600px;"></div>
                </figure>
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
                    <span class="material-icons-sharp ">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
            </div>
            <div class="recent-updates">
                <h2>Top Partidos</h2>
                <div class="updates">
                    <?php 
                    if(!empty($ganadorR))
                    {
                      foreach($ganadorR as $R)
                      {
                     
                    ?>
                    <div class="update">
                        <div class="profile-pho">
                            <img src="../../../images/LogoPartido/<?=$R['Logo']?>" alt="">
                        </div>
                        <div class="message">
                            <p><b><?=$R['partido']?></b> votos totales: <b><?=$R['Cantidad']?></b></p>
                            <small class="text-muted"><b class="danger">Regional</b></small>

                        </div>
                    </div>

                    <?php 
                       
                      }
                    }

                    if(!empty($ganadorP))
                    {
                      foreach($ganadorP as $P)
                      {
                     
                    ?>
                    <div class="update">
                        <div class="profile-pho">
                            <img  src="../../../images/LogoPartido/<?=$P['Logo']?>" alt="">
                        </div>
                        <div class="message">
                            <p><b><?=$P['partido']?></b> votos totales: <b><?=$P['Cantidad']?></b></p>
                            <small class="text-muted"><b class="danger">Provincial</b></small>

                        </div>
                    </div>

                    <?php 
                       
                      }
                    }

                    if(!empty($ganadorD))
                    {
                      foreach($ganadorD as $D)
                      {
                     
                    ?>
                    <div class="update">
                        <div class="profile-pho">
                            <img  src="../../../images/LogoPartido/<?=$D['Logo']?>" alt="">
                        </div>
                        <div class="message">
                            <p><b><?=$D['partido']?></b> votos totales: <b><?=$D['Cantidad']?></b></p>
                            <small class="text-muted"><b class="danger">Distrital</b> </small>

                        </div>
                    </div>

                    <?php 
                       
                      }
                    }
                    ?>
                  
                </div>
            </div>
           
            <!-- Recent updates End -->
           
        </div>
        <!-- Section Right End -->
    </div>
    <script src="../../../JS/toggler.js"></script>
    <script>
Highcharts.chart('container1', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: 'Voto Regional - 2022'
  },
  
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Porcentaje Total de Votos'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Regional",
      colorByPoint: true,
      data: [
        <?php 
        $rpfinalr = Cargar::reporttipo('Regional');
        $total=0;
        if(!empty($rpfinalr))
        {
        foreach($totalR as $regional)
        {
            $total = $regional['Cantidad'];
        }
        
        foreach($rpfinalr as $rp)
        {
            $Porcentaje = (100*$rp['Cantidad'])/$total;
            $Formato = number_format($Porcentaje,2);
            echo "{ name:'".$rp['partido']."', y:".$Formato."},";
        }
      }
        ?>
      ]
    }
  ]
});

Highcharts.chart('container2', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: 'Voto Provincial - 2022'
  },
  
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Porcentaje Total de Votos'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Provincial",
      colorByPoint: true,
      data: [
        <?php 
        $rpfinalp = Cargar::reporttipo('Provincial');
        $total=0;
        if(!empty($rpfinalp))
        {
        foreach($totalP as $provincial)
        {
            $total = $provincial['Cantidad'];
        }
        
        foreach($rpfinalp as $rp)
        {
            $Porcentaje = (100*$rp['Cantidad'])/$total;
            $Formato = number_format($Porcentaje,2);
            echo "{ name:'".$rp['partido']."', y:".$Formato."},";
        }
      }
        ?>
      ]
    }
  ]
  
});

Highcharts.chart('container3', {
  chart: {
    type: 'column'
  },
  title: {
    align: 'left',
    text: 'Voto Distrital - 2022'
  },
  
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Porcentaje Total de Votos'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:.1f}%'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },

  series: [
    {
      name: "Distrital",
      colorByPoint: true,
      data: [
        <?php 
        $rpfinalr = Cargar::reporttipo('Distrital');
        $total=0;
        if(!empty($rpfinalr))
        {
        foreach($totalD as $distrital)
        {
            $total = $distrital['Cantidad'];
        }
        
        foreach($rpfinalr as $rp)
        {
            $Porcentaje = (100*$rp['Cantidad'])/$total;
            $Formato = number_format($Porcentaje,2);
            echo "{ name:'".$rp['partido']."', y:".$Formato."},";
        }}
        ?>
      ]
    }
  ]
});
    </script>

</body>
</html>