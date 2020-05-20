<?php session_start() ?>

<?php

    if (!isset($_SESSION['id']))
        die("<meta charset='utf-8'><title></title><script>window.location=('login.php')</script>");
?>

<!DOCTYPE html>
<html class='has-navbar-fixed-top'>

<?php

    $page_title = "Dashboard";
    require_once 'inclusoes/head.php';

?>
<link rel="stylesheet" href="css/croppie.css">
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/Chart.min.css">

<body>
    <!-- Navbar -->
    <nav class="navbar is-fixed-top box-shadow-y">
        <div class="navbar-brand">
            <a href="#" class='navbar-burger toggler'>
                <span></span>
                <span></span>
                <span></span>
            </a>
            <a href="#" class='navbar-item has-text-weight-bold has-text-black'>
                <img src="img/bic-logo-1.png" alt="logo" width = '112' height = '28'>
            </a>
            <a href="#" class='navbar-burger nav-toggler'>
                <span></span>
                <span></span>
                <span></span>
            </a>
        </div>
        <div class="navbar-menu has-background-white">
            <div class="navbar-start">
                <!-- <a href="#" class='navbar-item'>
                    <i class="fas fa-home is-icon"></i> Home
                </a>
                <a href="#" class='navbar-item'>#</a>
                <a href="#" class='navbar-item'>#</a>
                <a href="#" class='navbar-item'>#</a> -->
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <p>Olá, <strong><?php echo $_SESSION['username'] ?></strong></p>
                </div>
                <div class="navbar-item">
                    <figure class="image is-48x48">
                        <img src=<?php echo $_SESSION['perfil'] ?> alt="user-picture" class="is-rounded">
                    </figure>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="columns is-variable is-0">
        <div>
            <div class="menu-container px-1 has-background-white">
                <div class="menu-wrapper py-1">
                    <aside class="menu">
                        <p class="menu-label">Geral</p>
                        <ul class="menu-list">
                            <li><a class = 'is-active has-background-primary'><i class="fas fa-tachometer-alt is-icon"></i> Dashboard</a></li>
                        </ul>
                        <p class="menu-label">Administração</p>
                        <ul class="menu-list">
                            <li>
                                <a>Gerenciar Cadastros</a>
                                <ul>
                                    <li><a><i class="fas fa-user-check is-icon"></i> Modificar Cadastro</a></li>
                                    <li><a><i class="fas fa-user-plus is-icon"></i> Inserir Cadastro</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p class="menu-label">Relatórios</p>
                        <ul class="menu-list">
                            <li><a><i class="far fa-calendar-alt is-icon"></i> Modificados em Data</a></li>
                            <li><a><i class="far fa-calendar-alt is-icon"></i> Modificados Entre as Datas</a></li>
                            <li><a><i class="fas fa-address-card is-icon"></i> Modificados por Você</a></li>
                            <li><a><i class="fas fa-file-csv is-icon"></i> Relatório Completo</a></li>
                            <li><a><i class="fas fa-user-cog is-icon"></i> Relatório Personalizado</a></li>
                        </ul>
                        <p class="menu-label">Usuário</p>
                        <ul class="menu-list">
                            <li><a>Perfil</a></li>
                            <li><a><i class="fas fa-cog is-icon"></i> Configurações</a></li>
                            <li><a><i class="fas fa-sign-out-alt is-icon"></i> Logout</a></li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
        <!-- Sidebar -->

        <div class="column is-10-desktop is-offset-2-desktop is-9-tablet is-offset-3-tablet is-12-mobile">
            <div class="p-1">
                <div class="columns is-variable is-desktop">
                    <div class="column">
                        <h1 class="title">Dashboard</h1>
                    </div>
                </div>
                <div class="columns is-variable is-desktop">
                    <div class="column">
                        <div class="card has-background-light has-text-white">
                            <div class="card-header">
                                <div class="card-content">
                                    <canvas id="myChart" width="350" height="256"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card has-background-warning has-text-black">
                            <div class="card-header">
                                <div class="card-header-title">
                                    Total de Colaboradores
                                </div>
                                <div class="card-content">
                                    <p class='is-size-3'>728</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card has-background-light has-text-black">
                            <div class="card-header">
                                <!-- <div class="card-header-title">
                                    Alguma Estatística
                                </div> -->
                                <div class="card-content">
                                    <canvas id='vacation_chart' width="350" height="256"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="columns is-variable">
                    <div class="column is-4-desktop is-6-tablet">
                        <article class="message is-info">
                            <div class="message-header">
                                <p>Info</p>
                                <button class="delete" ariaa-label='delete'></button>
                            </div>
                            <div class="message-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </article>
                    </div>
                    <div class="column is-4-desktop is-6-tablet">
                        <article class="message is-info">
                            <div class="message-header">
                                <p>Info</p>
                                <button class="delete" ariaa-label='delete'></button>
                            </div>
                            <div class="message-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </article>
                    </div>
                    <div class="column is-4-desktop is-6-tablet">
                        <article class="message is-info">
                            <div class="message-header">
                                <p>Info</p>
                                <button class="delete" ariaa-label='delete'></button>
                            </div>
                            <div class="message-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </div>
                        </article>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/exif.js"></script>
    <script src="js/croppie.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="plugins/fontawesome/js/fontawesome.min.js"></script>
    <script src="plugins/fontawesome/js/solid.min.js"></script>
    <script src="plugins/fontawesome/js/regular.min.js"></script>
    <script src="js/dashboard-page.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Férias Normais', 'Férias Antecipadas', 'Férias Não Programadas'],
                datasets: [{
                    data: [269, 412, 47],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options :{
                title: {
                    display: true,
                    text: 'Tipos de Férias',
                    fontColor: '#000000'
                }
            }
            
        });
    </script>
    <script>
        var ctx = document.getElementById('vacation_chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Férias', 'Trabalhando'],
                datasets: [{
                    data: [681, 47],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Força de Trabalho',
                    fontColor: '#000000'
                },
                tooltips: {
                    callbacks :{
                        label: function(tooltipItem, data){
                            var label = data.labels[tooltipItem.index] || '';
                            var value = data.datasets[0].data[tooltipItem.index];
                            if (label)
                                label += ': ';
                                
                            label += (Math.round(value * 100) / 728).toFixed(2);
                            return label + '%';
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>