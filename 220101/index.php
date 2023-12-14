<?php
require("../php/connect.php");
session_start();
$username = $_SESSION['username'];
$current_token = $_SESSION['login_token'];

if(!$_SESSION['username']) {
    header('Location:../');
}

$check_session = "SELECT * FROM courier_login_token WHERE username = '$username'";
$check_session_rs = mysqli_query($link, $check_session);
if($check_session_rs->num_rows > 0) {
    while($token_row = mysqli_fetch_assoc($check_session_rs)) {
        $token = $token_row['l_token'];
    }

    if($current_token != $token) {
        header('Location:../');
    }
}

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
        <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
            <!--[if gt IE 8]><!-->
                <html class="no-js" lang="en">
                <!--<![endif]-->

                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <title>Courier | Dashboard</title>
                        <meta name="description" content="Sufee Admin - HTML5 Admin Template">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        <link rel="apple-touch-icon" href="apple-icon.png">
                        <link rel="shortcut icon" href="../favicon.png">

                        <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
                        <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
                        <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
                        <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
                        <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
                        <link rel="stylesheet" href="../vendors/jqvmap/dist/jqvmap.min.css">


                        <link rel="stylesheet" href="../assets/css/style.css">
                        <link rel="stylesheet" href="../assets/css/custom_css.css">

                        <style type="text/css">
                            .stat-widget-one .stat-icon i {
                                font-size: 15px;
                            }
                        </style>

                    </head>

                    <body>


                        <!-- Left Panel -->

                        <aside id="left-panel" class="left-panel">
                            <nav class="navbar navbar-expand-sm navbar-default">
                                <div class="navbar-header">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <a class="navbar-brand" href="./"><img src="../images/awa_logo.png" alt="Logo"></a>
                                    <a class="navbar-brand hidden" href="./"><img src="../images/logo2.png" alt="Logo"></a>
                                </div>

                                <div id="main-menu" class="main-menu collapse navbar-collapse">
                                    <ul class="nav navbar-nav">

                                        <li style="line-height: 30px;" class="_active">
                                            <a href="../220101/"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a></li>

                                            <!-- PARCEL -->
                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parcelHome"> <i class="menu-icon fa fa-gift"></i>Add Parcel</a>
                                                <ul class="sub-menu children dropdown-menu">
                                                    <li id="addParcel"><i class="fa fa-plus"></i>
                                                        <a href="../254039/"> Domestic Parcel </a>
                                                    </li>
                                                    <li id="addRegionalParcel"><i class="fa fa-plus"></i>
                                                        <a href="../984631/"> Regional Parcel </a>
                                                    </li>
                                                    <li id="parcelTracking"><i class="fa fa-map-marker"></i>
                                                        <a href="../657342/">Parcel Tracking </a>
                                                    </li>
                                                    <li id="searchParcel"><i class="fa fa-search"></i>
                                                        <a href="../539430/"> Search Parcel </a>
                                                    </li>
                                                    <li id="viewDiary"><i class="fa fa-list"></i>
                                                        <a href="../594645/"> Diary </a>
                                                    </li>
                                                    <li id="viewParcelType"><i class="fa fa-list"></i>
                                                        <a href="../661341/"> Parcel Types </a>
                                                    </li>                                                    
                                                </ul>
                                            </li>

                                            <!-- PARCEL -->
                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parcelHome"> <i class="menu-icon fa fa-money"></i>Payments</a>
                                                <ul class="sub-menu children dropdown-menu">
                                                    <li id="addPayment"><i class="fa fa-exchange"></i>
                                                        <a href="../386747/"> New Payment </a>
                                                    </li>
                                                    <li id="addRegionalParcel"><i class="fa fa-plus"></i>
                                                        <a href="../964647/"> Return Parcel Payment </a>
                                                    </li>
                                                    <li id="addOverduePay"><i class="fa fa-plus"></i>
                                                        <a href="../846668/"> Overdue Payments </a>
                                                    </li>
                                                    <li id="viewPayment"><i class="fa fa-dot-circle-o"></i>
                                                        <a href="../872927/">View Payments </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="processHome"> <i class="menu-icon fa fa-tasks"></i>Internal Processing</a>
                                                <ul class="sub-menu children dropdown-menu">
                                                    <li id="processDashboard"><i class="fa fa-circle-o"></i>
                                                        <a href="../159716/"> Dashboard </a>
                                                    </li>

                                                    <li id="createManifest"><i class="fa fa-pencil"></i>
                                                        <a href="../246023/"> Create Manifest </a>
                                                    </li>
                                                    <li id="viewManifest"><i class="fa fa-tasks"></i>
                                                        <a href="../494819/"> View Manifest </a>
                                                    </li>
                                                    <li id="assignConsignment"><i class="fa fa-calendar-check-o"></i>
                                                        <a href="../672654/"> Assign Consignment </a>
                                                    </li>
                                                    <li id="dispatchConsignment"><i class="fa fa-send"></i>
                                                        <a href="../744518/"> Dispatch Consignment </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="receiveHome"> <i class="menu-icon fa fa-level-down"></i>Receive Parcel</a>
                                                <ul class="sub-menu children dropdown-menu">
                                                    <li id="recViewManifest"><i class="fa fa-eye"></i>
                                                        <a href="../335975/"> View Manifest </a>
                                                    </li>
                                                    <li id="receiveManifest"><i class="fa fa-handshake-o"></i>
                                                        <a href="../787077/"> Receive Manifest </a>
                                                    </li>
                                                    <li id="delivery"><i class="fa fa-truck"></i>
                                                        <a href="../693641/"> Delivery </a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="financeHome"> <i class="menu-icon fa fa-usd"></i>Finance</a>
                                                <ul class="sub-menu children dropdown-menu">

                                                    <li id="financeDashboard"><i class="fa fa-circle-o"></i>
                                                        <a href="../677408/">Dashboard </a>
                                                    </li>

                                                    <li id="financeViewSent"><i class="fa fa-circle-o"></i>
                                                        <a href="../497252/">Local Parcel Report </a>
                                                    </li>

                                                    <li id="financeNewPayment"><i class="fa fa-circle-o"></i>
                                                        <a href="../984961/">New Payment Report </a>
                                                    </li>

                                                    <li id="financeOverduePayment"><i class="fa fa-circle-o"></i>
                                                        <a href="../656186/">Overdue Payment Report </a>
                                                    </li>

                                                    <li id="financeReturnPayment"><i class="fa fa-circle-o"></i>
                                                        <a href="../766861/">Return Payment Report </a>
                                                    </li>

                                                    <li id="financeViewCompanySent"><i class="fa fa-circle-o"></i>
                                                        <a href="../403524/">Company Parcel Report </a>
                                                    </li>

                                                </ul>
                                            </li>

                                            <li class="menu-item-has-children dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="settingHome"> <i class="menu-icon fa fa-cogs"></i>Settings</a>
                                                <ul class="sub-menu children dropdown-menu">
                                                    <li id="users"><i class="fa fa-user"></i>
                                                        <a href="../920033/">Users </a>
                                                    </li>
                                                    <li id="userGroups"><i class="fa fa-users"></i>
                                                        <a href="../548514/">Users Groupings </a>
                                                    </li>
                                                    <li id="customers"><i class="fa fa-address-book-o"></i>
                                                        <a href="../200940/">Customers </a>
                                                    </li>
                                                    <li id="branches"><i class="fa fa-arrows-alt"></i>
                                                        <a href="../285196/">Stations </a>
                                                    </li>
                                                    <li id="flights"><i class="fa fa-plane"></i>
                                                        <a href="../875091/">Flights </a>
                                                    </li>
                                                    <li id="rates"><i class="fa fa-money"></i>
                                                        <a href="../495400/">Rates </a>
                                                    </li>
                                                    <li id="log"><i class="fa fa-history"></i>
                                                        <a href="../904018/">Log </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </nav>
                            </aside><!-- /#left-panel -->

                            <!-- Left Panel -->

                            <!-- Right Panel -->

                            <div id="right-panel" class="right-panel">

                                <!-- Header-->
                                <header id="header" class="header">

                                    <div class="header-menu">

                                        <div class="col-sm-7">
                                            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                                            <h6>Dashboard</h6>
                                        </div> 

                                        <div class="col-sm-5">
                                            <div class="user-area dropdown float-right">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img class="user-avatar rounded-circle" src="<?php echo '../uploads/'.$_SESSION['image'] ?>" style="width: 30px;height: 30px;" alt="User Avatar">
                                                </a>

                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" href="../648684/"><i class="fa fa-user"></i> My Profile</a>

                                                    <a class="nav-link" href="../"><i class="fa fa-power-off"></i> Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </header><!-- /header -->
                                <!-- Header-->

                                <div class="content mt-3">

                                    <div class="row">

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card">
                                                <div class="card-body" style="background: #035003;">
                                                    <div class="stat-widget-one">
                                                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                                                        <div class="stat-content dib">
                                                            <div class="stat-text" style="color: white">Parcels Registered</div>
                                                            <div class="stat-digit" id="total_reg" style="color: white"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card">
                                                <div class="card-body" style="background: #9f4d55;">
                                                    <div class="stat-widget-one">
                                                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                                                        <div class="stat-content dib">
                                                            <div class="stat-text" style="color: white">Parcels Delivered</div>
                                                            <div class="stat-digit" id="total_del" style="color: white"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card">
                                                <div class="card-body" style="background: #008b8b;">
                                                    <div class="stat-widget-one">
                                                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                                                        <div class="stat-content dib">
                                                            <div class="stat-text" style="color: white">Destinations</div>
                                                            <div class="stat-digit" id="total_dest" style="color: white"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6">
                                            <div class="card">
                                                <div class="card-body" style="background: #1b1b36">
                                                    <div class="stat-widget-one">
                                                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                                                        <div class="stat-content dib">
                                                            <div class="stat-text" style="color: white">Total Users</div>
                                                            <div class="stat-digit" id="total_users" style="color: white"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.row-->

                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="growth_rate" height="110px"></canvas>
                                        </div>

                                    </div>
                                </div> <!-- .content -->
                            </div><!-- /#right-panel -->

                            <!-- Right Panel -->

                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="../assets/js/main.js"></script>
                            <script src="../js/access.js"></script>

                            <script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
                            <script src="../assets/js/dashboard.js"></script>
                            <script src="../assets/js/widgets.js"></script>
                            <script src="../vendors/jqvmap/dist/jquery.vmap.min.js"></script>
                            <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
                            <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    getData ();
                                    $.ajax({
                                      url: '../php/dashChartData.php',

                                      success:function (response) {
                                          // console.log(response);
                                          var data = JSON.parse(response);
                                          var chartLabel = [];
                                          var chartValue = [];
                                          for(var i = 0; i<data.length; i++) {
                                            var label = data[i].branch_name;
                                            var value = data[i].value;

                                            chartLabel.push(label);
                                            chartValue.push(value);
                                        }

                                        var ctx = $("#growth_rate");
                                        var x = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                              labels: chartLabel,
                                              datasets: [{
                                                label: 'Parcels Sent',
                                                data: chartValue,
                                                backgroundColor: '#94b557',
                                                // backgroundColor: '#223e9c',
                                                borderColor: '#252d4a',
                                                pointStyle: 'triangle',
                                                pointRadius: '5',
                                                pointHoverRadius: '10'
                                            }]
                                          },
                                          options: {
                                              title: {
                                                display: true,
                                                text: 'Parcels Summary/monthly',
                                                fontStyle: 'bold',
                                                position: 'top',
                                                fontSize: 23
                                            },
                                            legend: {
                                                display: true,
                                                position: 'bottom'
                                            }
                                        }
                                    })
                                    }
                                });
                                })

                                function getData () {

                                    jQuery.ajax({
                                        type: 'POST',
                                        url: 'getData.php',
                                        data: {
                                            'type': 'daily'
                                        },

                                        success: function (json) {
                                            // console.log(json);
                                            jQuery("#total_users").html(new Number(json));
                                        }
                                    })

                                    jQuery.ajax({
                                        type: 'POST',
                                        url: 'getData.php',
                                        data: {
                                            'type': 'monthly'
                                        },

                                        success: function (json) {
                                            jQuery("#total_reg").html(json);
                                        }
                                    })

                                    jQuery.ajax({
                                        type: 'POST',
                                        url: 'getData.php',
                                        data: {
                                            'type': 'quarterly'
                                        },

                                        success: function (json) {
                                            jQuery("#total_del").html(json);
                                        }
                                    })

                                    jQuery.ajax({
                                        type: 'POST',
                                        url: 'getData.php',
                                        data: {
                                            'type': 'annually'
                                        },

                                        success: function (json) {
                                            jQuery("#total_dest").html(json);
                                        }
                                    })
                                }
                            </script>

                        </body>

                        </html>
