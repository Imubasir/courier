<?php
session_start();
if(!$_SESSION['username']) {
    header('Location:../');
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Courier | Delivery</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../favicon.png">

    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/toastr-master/build/toastr.min.css">

    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_css.css">
    <link rel="stylesheet" href="../vendors/signature/assets/jquery.signaturepad.css">

    <style type="text/css">
        .signature {
            font: normal 1.875em/50px "Journal",Georgia,Times,serif;
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

                    <li style="line-height: 30px;">
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
                                <li id="viewDetails"><i class="fa fa-list"></i>
                                    <a href="../135498/"> View Daily Parcels </a>
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
                                    <a href="../872927/">View Payment </a>
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

                        <li class="menu-item-has-children dropdown keep-open">
                            <a href="#" class="dropdown-toggle index" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="receiveHome"> <i class="menu-icon fa fa-level-down"></i>Receive Parcel</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="recViewManifest"><i class="fa fa-eye"></i>
                                    <a href="../335975/"> View Manifest </a>
                                </li>
                                <li id="receiveManifest"><i class="fa fa-handshake-o"></i>
                                    <a href="../787077/"> Receive Manifest </a>
                                </li>
                                <li id="delivery" class="_active"><i class="fa fa-truck"></i>
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
        </aside>

        <!-- /#left-panel -->

        <!-- Left Panel -->

        <!-- Right Panel -->

        <div id="right-panel" class="right-panel">

            <!-- Header-->
            <header id="header" class="header">

                <div class="header-menu">

                    <div class="col-sm-7">
                        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                        <h6>Delivery</h6>
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
                <div class="card" style="width: 70%;margin-left: 15%;">
                    <div class="card-title-inner">Delivery</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" style="border-right: 1px solid #17a2b833;">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="Parcel Code" name="code" class="form-control" placeholder="Search Parcel Code">
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-sm btn-info" onclick='search()'><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <form method="post" action="" class="sigPad">
                                      <label for="name">Print your name</label>
                                      <input type="text" name="name" id="name" class="name">
                                      <p class="typeItDesc">Review your signature</p>
                                      <p class="drawItDesc">Draw your signature</p>
                                      <ul class="sigNav">
                                        <li class="typeIt"><a href="#type-it" class="current">Type It</a></li>
                                        <li class="drawIt"><a href="#draw-it">Draw It</a></li>
                                        <li class="clearButton"><a href="#clear">Clear</a></li>
                                    </ul>
                                    <div class="sig sigWrapper">
                                        <div class="typed"></div>
                                        <canvas class="pad" width="198" height="55"></canvas>
                                        <input type="hidden" name="output" class="output">
                                    </div>
                                    <!-- <button type="submit">I accept the terms of this agreement.</button> -->
                                </form>
                            </div>
                            <button class="btn btn-sm btn-success" id="issueBtn"><i class="fa fa-check"></i> Issue</button>
                            <button class="btn btn-sm btn-danger"><i class="fa fa-redo">&#xf01e</i> Reset</button>
                        </div>
                        <div class="col-7">
                            <table class="table">
                                <tr>
                                    <th style="width: 25%;">Parcel Status</th>
                                    <td id="parcel_status">:</td>
                                </tr>

                                <tr>
                                    <th>Category</th>
                                    <td id="parcel_type">:</td>
                                </tr>

                                <tr>
                                    <th>Shipper</th>
                                    <td id="sender_name">:</td>
                                </tr>

                                <tr>
                                    <th>Consignee</th>
                                    <td id="recipient_name">:</td>
                                </tr>

                                <tr>
                                    <th>Phone</th>
                                    <td id="recipient_telephone">:</td>
                                </tr>

                                
                            </table>

                            --------------------------------------
                            <form>
                                <table class="table">
                                    <tr>
                                        <th>Proxy</th>
                                        <td><label><input type="checkbox" id="proxy_check"> Check to Collect by Proxy</label></td>
                                    </tr>
                                </table>

                                <div id="proxy_form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="proxy_name" class="form-control" placeholder="Proxy Name">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="proxy_id" class="form-control" placeholder="Proxy Ghana Card">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="proxy_address" class="form-control" placeholder="Proxy Address" style="min-height: 50px;max-height: 50px"></textarea>
                                    </div>
                                </div>
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Details Modal -->
    <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel"> Delivery Detail</h6>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <th style="width: 30%;">Pick Up Date: </th>
                        <td id="pick_date"></td>
                    </tr>

                    <tr>
                        <th>Consignee</th>
                        <td id="recipient"></td>
                    </tr>

                    <tr>
                        <th>Recipient Phone</th>
                        <td id="recipient_phone"></td>
                    </tr>

                    <tr>
                        <th>Proxy</th>
                        <td id="proxy"></td>
                    </tr>

                    <tr>
                        <th>Issued By</th>
                        <td id="issuer"></td>
                    </tr>
                    
                </table>
                <div id="proxy_info" style="display: none;">
                    <table class="table table-striped">
                        <caption style="caption-side: top;">Proxy Details</caption>
                        <tr>
                            <th style="width: 30%;">Proxy Name</th>
                            <td id="prox_name"></td>
                        </tr>

                        <tr>
                            <th>Proxy ID</th>
                            <td id="prox_id"></td>
                        </tr>

                        <tr>
                            <th>Proxy Address</th>
                            <td id="prox_add"></td>
                        </tr>
                    </table>
                </div>
                <div class="sigpad signed" style="text-align: right">
                    <div class="sigWrapper">
                        <canvas class="pad" width="200" height="55"></canvas>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
                <button id="saveResultsBtn" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</div>

<!-- .End Details Modal -->

<!-- Right Panel -->

<script src="../vendors/jquery/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vendors/toastr-master/build/toastr.min.js"></script>
<script src="../js/access.js"></script>

<script src="../vendors/chart.js/dist/Chart.bundle.min.js"></script>
<script src="../assets/js/dashboard.js"></script>

<!-- Tables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>
<script src="../js/function.js"></script>

<script src="../vendors/signature/jquery.signaturepad.js"></script>
<script src="../vendors/signature/assets/json2.min.js"></script>

<script src="function.js"></script>
<script type="text/javascript">
    keep_open("keep-open,index");
</script>
</body>

</html>
