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
    <title>Courier | Add Parcel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="../favicon.png">

    <!-- <link rel="stylesheet" href="../vendors/bootstrap5/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../vendors/toastr-master/build/toastr.min.css">
    <link rel="stylesheet" href="../vendors/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="../vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom_css.css">

    <style type="text/css">
        .label {
            font-weight: bold;
        }

        #countdown {
            display: block;
            border: 2px #ccc solid;
            color: #fff;
            font-size: 20px;
            border-radius: 50%;
            line-height: 80px;
            height: 80px;
            width: 80px;
            text-align: center;
            background-color: #ed0d0dd6;
        }

        .wrapper{
            position: absolute;
            top: 80%;
            left: 50%;
            width: 200px;
            height: 200px;
            margin-left: -100px;
            margin-top: -100px;
            height: 100%;
            width: 100%;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        article p {
            font-size: 11px;
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
                        <li class="menu-item-has-children dropdown keep-open">
                            <a href="#" class="dropdown-toggle index" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="parcelHome"> <i class="menu-icon fa fa-gift"></i>Add Parcel</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li id="addParcel" class="_active"><i class="fa fa-plus"></i>
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
                        <h6>New Domestic Parcel</h6>
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
                <div class="card">
                    <!-- <div class="card-title"></div> -->
                    <div class="card-body" style="background: #1ff1050d">
                        <div class="row" style="margin-left: 9%;">
                            <div class="col-3">
                                <span style="display: flex;">
                                    <input type="text" class="form-control" style="border: none;border-bottom: 1px solid;background-color: aliceblue;" placeholder="Search Code to Edit" name="edit_code">

                                    <div class='dropdown'>
                                        <button class='btn btn-info btn-md dropdown-toggle' type='button' data-toggle='dropdown' style="padding: 3px;">
                                            Action <span class='caret'></span>
                                        </button>
                                        <ul class='dropdown-menu' style="left: 90px; top: 0px">
                                            <li><a class='dropdown-item' href='#' onclick="edit()">Edit</a></li>

                                            <li><a class='dropdown-item' href='#' onclick="showBill()">Way Bill</a></li>

                                            <li><a class='dropdown-item' href='#' onclick="showPaymentBill()">Payment Bill</a></li>

                                            <li><a class="dropdown-item" href="#!" onclick="showParcelLabel()">Parcel Label</a></li>

                                            <hr>

                                            <li><a class="dropdown-item" href="#!" onclick="fetch_daily_parcel()">Daily Parcels</a></li>
                                        </ul>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <br>
                        <form id="addParcelForm" style="margin-top: 0%;">
                            <div class="row" style="margin-left: 9%;">
                                <div class="col-4" >
                                    <div class="card-title">Shipper (Sender)</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <select class="form-control custom-select" id="sender_type" name="sender_type">
                                                <option selected value=''>Sender Type</option>
                                                <option value="LOCAL">Domestic</option>
                                                <option value="COMPANY">Company</option>
                                                <option value="FORIEGN">Foreigner</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="indv_name">
                                            <input type="text" id="sender_name" name="sender_name" class="form-control" placeholder="Enter Sender's Name" onkeydown="return /[a-z ]/i.test(event.key)" autocomplete="off" required>
                                        </div>

                                        <div class="form-group" id="company_name" style="display: none;">
                                            <select class="form-control custom-select" name="sender_name_select" id="sender_name_select">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="sender_address" class="form-control" placeholder="Sender's Ghana Card Number" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="GHA-">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="sender_email" class="form-control" placeholder="Sender's Email">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="sender_location" class="form-control" placeholder="Sender's Location Address" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <input type="number" name="sender_phone" class="form-control" maxlength="10" placeholder="Sender's Telephone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control custom-select" name="sender_origin">
                                                <option selected disabled>Origin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-4" style="margin-left: 10%;">
                                    <div class="card-title">Consignee (Recipient)</div>
                                    <div class="card-body">
                                        <div class="form-group" id="recipient_name">
                                            <input type="text" id="recipient_name" name="recipient_name" class="form-control" onkeydown="return /[a-z ]/i.test(event.key)" placeholder="Enter Recipient's Name">
                                        </div>

                                        <div class="form-group" id="recipient_company_name" style="display: none;">
                                            <select class="form-control custom-select" name="recipient_sender_name_select" id="recipient_sender_name_select">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="recipient_address" class="form-control" placeholder="Recipient's Ghana Card Number" maxlength="15" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="GHA-">
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="recipient_email" class="form-control" placeholder="Recipient's Email">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="recipient_location" class="form-control" placeholder="Recipient's Location Address">
                                        </div>

                                        <div class="form-group">
                                            <input type="number" name="recipient_phone" class="form-control" placeholder="Recipient's Telephone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control custom-select" name="recipient_destination">
                                                <option selected disabled>Destination</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: 9%;">
                                <div class="col-11">
                                    <div class="card-title" style="width: 85%;">Local Parcel Consignment Details</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <select name="flight" class="form-control form-control-sm">
                                                                <option>Select Flight</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                <div class="form-group">
                                                    <label class="label">Service Type</label><br>

                                                    <label class="radioStyle"><input type="radio" name="service_type" value="airport-airport" id="air_air" checked>&nbsp;Airport - Airport</label>&nbsp;&nbsp;

                                                    <label class="radioStyle"><input type="radio" name="service_type" value="airport-door" id="air_door">&nbsp;Airport - Door</label>&nbsp;&nbsp;

                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <input type="number" name="parcel_quantity" class="form-control" placeholder="Number of Items" min="1" oninput="javascript: if (/^0/.test(this.value)) this.value = this.value.replace(/^0/, '1')">
                                                        </div>

                                                        <div class="form-group">
                                                            <label><input type="checkbox" id="checkLargeParcel"> Large Parcel</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="number" id="parcel_weight" name="parcel_weight" class="form-control" placeholder="Weight" >
                                                        </div>


                                                        <div class="form-group" id="largeParcelDiv" style="display: none;">
                                                            <input type="number" name="length" class="form" style="width: 25%;" placeholder="L">&nbsp;
                                                            <input type="number" name="width" style="width: 25%;" placeholder="W">&nbsp;
                                                            <input type="number" name="height" style="width: 25%;" placeholder="H">&nbsp;
                                                            <span style="padding: 5px;background: #73c173;cursor: pointer;color: white;" id="calcBtn">Calc</span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label style="font-weight: bold;color: #11c911;">GH&#8373; <span id="display_amount">0.00</span></label>
                                                        </div>

                                                    </div>

                                                    <div class="col-6">
                                                        <div class="wrapper">
                                                            <div id="countdown">0.00 Kg</div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="label">Parcel Group</label><br>
                                                    <label class="radioStyle"><input type="radio" name="parcel_group" value="0" id="newParcel" checked>&nbsp;New Parcel</label>&nbsp;&nbsp;

                                                    <label class="radioStyle"><input type="radio" name="parcel_group" value="1" id="returnParcel">&nbsp;Return Parcel</label>&nbsp;&nbsp;
                                                </div>

                                                <div class="form-group">
                                                    <label class="label">Parcel Type</label><br>
                                                    <select name="parcel_type" class="form-control select2">

                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <textarea type="text" name="parcel_description" class="form-control" placeholder="Content Description" style="min-height: 37px;max-height: 40px;"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label class="label">Insurance: &nbsp;</label>
                                                    <label class="radioStyle"><input type="radio" id="insurance_no" name="insurance" value="no">&nbsp;No</label>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <label class="radioStyle"><input type="radio" id="insurance_yes" name="insurance" value="yes">&nbsp;Yes</label>
                                                </div>

                                                <div class="form-group" id="parcel_value_div" style="display: none;">
                                                    <input type="number" name="parcel_value" class="form-control" placeholder="Value of Item">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row" style="margin-left: 18%;">
                            <div class="col-8" style="text-align: center;">
                                <span id="btn_type">
                                    <button id="genBtn" class="btn btn-sm btn-info" onclick="addParcel()"><i class="fa fa-save"></i> Create Consignment</button>
                                </span>
                                <button class="btn btn-sm btn-danger" onclick="resetForm('addParcelForm')"><i class="fa fa-redo">&#xf01e</i> Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.row-->
            </div> <!-- .content -->

            <!-- Details Modal -->
            <div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div id="wayPrintout">
                        <div class="row">
                            <div class="col-6">
                                <div style="padding: 10px;">
                                    <img src="../images/awa.png" style="width: 50%;height: 40px;">
                                </div>
                            </div>
                            <div class="col-6" style="text-align: center;">
                                <br>
                                <span style="font-weight: bold;font-size: 30px;font-family: 'arial black';">Way Bill</span>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div class="row" style="border: none;">
                                <div class="col-11">
                                    <!-- <img src="../images/awa.png" width="200px" style="background-color: #bbb7b1"> -->
                                </div>
                            </div>
                            <div class="row" id="shipper_row">
                                <div class="col-6">
                                    <div class="head_title">Shipper (Sender)</div>
                                    <table class="table">
                                        <tr>
                                           <td style="width: 40%">Name</td>
                                           <td class="sender_name_2">:</td>
                                       </tr>

                                       <tr>
                                           <td>Digital Address</td>
                                           <td class="sender_address">:</td>
                                       </tr>

                                       <tr>
                                           <td>Email</td>
                                           <td class="senders_email" style="text-transform: lowercase;"></td>
                                       </tr>

                                       <tr>
                                           <td>Location Address</td>
                                           <td class="sender_location">:</td>
                                       </tr>

                             <!-- <tr>
                                 <td>City/Town</td>
                                 <td id="sender_city">:</td>
                             </tr> -->

                             <tr>
                               <td>Telephone</td>
                               <td class="sender_telephone">:</td>
                           </tr>

                           <tr>
                               <td>Origin</td>
                               <td class="sender_origin">:</td>
                           </tr>
                       </table>
                   </div>
                   <div class="col-6">
                    <div class="head_title">Consignee (Receiver)</div>
                    <table class="table">
                        <tr>
                           <td style="width: 40%">Name</td>
                           <td class="recipient_name_">:</td>
                       </tr>

                       <tr>
                           <td>Digital Address</td>
                           <td class="recipient_address">:</td>
                       </tr>

                       <tr>
                           <td>Email</td>
                           <td class="recipients_email" style="text-transform: lowercase;"></td>
                       </tr>

                       <tr>
                           <td>Location Address</td>
                           <td class="recipient_location">:</td>
                       </tr>

                         <!-- <tr>
                             <td>City/Town</td>
                             <td id="recipient_city">:</td>
                         </tr> -->

                         <tr>
                           <td>Telephone</td>
                           <td class="recipient_telephone">:</td>
                       </tr>

                       <tr>
                           <td>Destination</td>
                           <td class="recipient_destination">:</td>
                       </tr>
                   </table>
               </div>
           </div>
           <div class="row">
            <div class="col-12">
                <div class="head_title"><span style="float: right;" id="date_created"></span>Parcel Detail</div>
                <div class="row">
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <td style="width: 40%">Flight</td>
                                <td class="flight">:</td>
                            </tr>

                            <tr>
                                <td style="width: 40%">Service</td>
                                <td class="service_type">:</td>
                            </tr>

                            <tr>
                               <td>Parcel Type</td>
                               <td class="parcel_type">:</td>
                           </tr>

                           <tr>
                               <td>No of Items</td>
                               <td class="no_items">:</td>
                           </tr>

                           <tr>
                               <td>Weight</td>
                               <td class="weight">:</td>
                           </tr>

                       </table>
                   </div>
                   <div class="col-6">
                    <table class="table">

                        <tr>
                            <td style="width: 30%">Parcel Group</td>
                            <td class="parcel_group">:</td>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td class="content_descr">:</td>
                        </tr>

                        <tr>
                           <td>Item Insured</td>
                           <td class="insurance">:</td>
                       </tr>

                       <tr>
                           <td>Value of Item</td>
                           <td class="value_of_item"></td>
                       </tr>

                       <tr>
                           <td>Created By</td>
                           <td class="created_by">:</td>
                       </tr>
                   </table>
               </div>
           </div>
       </div>
   </div>
   <div class="row" id="price_row">
    <div class="col-6">
        <table class="table">
            <tr>
                <td style="width: 10%">Price</td>
                <td style="width: 30%" class="amount">:</td>

                <td style="width: 10%">INS</td>
                <td class="ins_amount">:</td>
            </tr>

            <tr>
                <td style="width: 10%">Total</td>
                <td class="total_amount">:</td>
            </tr>
        </table>
    </div>
    <div class="col-6">
        <table style="text-align: center;">
            <tr>
                <td>
                    <div class='qrcode' style="text-align: center;letter-spacing: 8px;">

                    </div>
                </td>
            </tr>
            <tr>
                <td><h6>ORIGINAL</h6></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-11" style="font-size: 10px;">
        <article style="color: black;text-align: justify;">
            <p style="color: black;">
                <b>SHIPPER'S DECLARATION:</b> Shipper certifies that the particulars on the face hereof, is the correct and properly described and is in the proper condition for carriage by air. In respect of Customs information the shipper further declares tht the information entered is complete and correct in respect of all the goods to which the declaration refers. Shipper agrees that the carriage is subject to the conditions of contract on the service hereof. Shipper's attention is drawn to the notice concerning limitation of liability and restrictions.
                <br>
                <b>DANGEROUS DECLARATION:</b> The Shipper declares that the contents carried under this consignment number contain no DANGEROUS GOODS. The declaration under DANGEROUS GOODS REGULATIONS.
            </p>
        </article>
    </div>

</div>
<br>
<br>
<div class="row">
    <div class="col-6" style="text-align: center;">
        <span>------------------------------</span><br>
        Customer's Signature
    </div>
    <div class="col-6" style="text-align: center;">
        <span>------------------------------</span><br>
        Officer's Signature
    </div>

</div>
<br>
<div style="text-align: center;"><i class="fa fa-cut"></i>-----------------------------------------------------------------------------------------------------------------
    <i class="fa fa-cut" style="rotate: 180deg"></i></div>
    <br> <br>
    <div class="row">
        <div class="col-6">
            <div style="padding: 10px;">
                <img src="../images/awa.png" style="width: 50%;height: 40px;">
            </div>
        </div>
        <div class="col-6" style="text-align: center;">
            <br>
            <span style="font-weight: bold;font-size: 30px;font-family: 'arial black';">Way Bill</span>
        </div>
    </div>
    <div class="row" id="shipper_row">
        <div class="col-6">
            <div class="head_title">Shipper (Sender)</div>
            <table class="table">
                <tr>
                   <td style="width: 40%">Name</td>
                   <td class="sender_name_2">:</td>
               </tr>

               <tr>
                   <td>Digital Address</td>
                   <td class="sender_address">:</td>
               </tr>

               <tr>
                   <td>Email</td>
                   <td class="senders_email" style="text-transform: lowercase;"></td>
               </tr>

               <tr>
                   <td>Location Address</td>
                   <td class="sender_location">:</td>
               </tr>

               <tr>
                   <td>Telephone</td>
                   <td class="sender_telephone">:</td>
               </tr>

               <tr>
                   <td>Origin</td>
                   <td class="sender_origin">:</td>
               </tr>
           </table>
       </div>
       <div class="col-6">
        <div class="head_title">Consignee (Receiver)</div>
        <table class="table">
            <tr>
               <td style="width: 40%">Name</td>
               <td class="recipient_name_">:</td>
           </tr>

           <tr>
               <td>Digital Address</td>
               <td class="recipient_address">:</td>
           </tr>

           <tr>
               <td>Email</td>
               <td class="recipients_email" style="text-transform: lowercase;"></td>
           </tr>

           <tr>
               <td>Location Address</td>
               <td class="recipient_location">:</td>
           </tr>

           <tr>
               <td>Telephone</td>
               <td class="recipient_telephone">:</td>
           </tr>

           <tr>
               <td>Destination</td>
               <td class="recipient_destination">:</td>
           </tr>
       </table>
   </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="head_title"><span style="float: right;" id="date_created"></span>Parcel Detail</div>
        <div class="row">
            <div class="col-6">
                <table class="table">
                    <tr>
                        <td style="width: 40%">Flight</td>
                        <td class="flight">:</td>
                    </tr>

                    <tr>
                        <td style="width: 40%">Service</td>
                        <td class="service_type">:</td>
                    </tr>

                    <tr>
                       <td>Parcel Type</td>
                       <td class="parcel_type">:</td>
                   </tr>

                   <tr>
                       <td>No of Items</td>
                       <td class="no_items">:</td>
                   </tr>

                   <tr>
                       <td>Weight</td>
                       <td class="weight">:</td>
                   </tr>

               </table>
           </div>
           <div class="col-6">
            <table class="table">

                <tr>
                    <td style="width: 30%">Parcel Group</td>
                    <td class="parcel_group">:</td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td class="content_descr">:</td>
                </tr>

                <tr>
                   <td>Item Insured</td>
                   <td class="insurance">:</td>
               </tr>

               <tr>
                   <td>Value of Item</td>
                   <td class="value_of_item"></td>
               </tr>

               <tr>
                   <td>Created By</td>
                   <td class="created_by">:</td>
               </tr>
           </table>
       </div>
   </div>
</div>
</div>
<div class="row" id="price_row">
    <div class="col-6">
        <table class="table">
            <tr>
                <td style="width: 10%">Price</td>
                <td style="width: 30%" class="amount">:</td>

                <td style="width: 10%">INS</td>
                <td class="ins_amount">:</td>
            </tr>

            <tr>
                <td style="width: 10%">Total</td>
                <td class="total_amount">:</td>
            </tr>
        </table>
    </div>
    <div class="col-6">
        <table style="text-align: center;">
            <tr>
                <td>
                    <div class='qrcode' style="text-align: center;letter-spacing: 8px;">

                    </div>
                </td>
            </tr>
            <tr>
                <td><h6>DUPLICATE</h6></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-11" style="font-size: 10px;">
        <article style="color: black;text-align: justify;">
            <p style="color: black;">
                <b>SHIPPER'S DECLARATION:</b> Shipper certifies that the particulars on the face hereof, is the correct and properly described and is in the proper condition for carriage by air. In respect of Customs information the shipper further declares tht the information entered is complete and correct in respect of all the goods to which the declaration refers. Shipper agrees that the carriage is subject to the conditions of contract on the service hereof. Shipper's attention is drawn to the notice concerning limitation of liability and restrictions.
                <br>
                <b>DANGEROUS DECLARATION:</b> The Shipper declares that the contents carried under this consignment number contain no DANGEROUS GOODS. The declaration under DANGEROUS GOODS REGULATIONS.
            </p>
        </article>
    </div>

</div>
<br>
<br>
<div class="row">
    <div class="col-6" style="text-align: center;">
        <span>------------------------------</span><br>
        Customer's Signature
    </div>
    <div class="col-6" style="text-align: center;">
        <span>------------------------------</span><br>
        Officer's Signature
    </div>

</div>
</div>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
    <button class="btn btn-primary btn-sm" onclick="printout('wayPrintout')"><i class="fa fa-print"></i> Print</button>
</div>

</div>
</div>
</div>

<!-- .End Details Modal -->

<!-- Details Modal -->
<div class="modal fade" id="paymentdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body" id="payPrint">
            <div style="background: #d0d3d0;">
                <img src="../images/awa_logo.png" style="width: 50%;height: 40px;"><span style="font-weight: bold;">Payment Bill</span>
            </div>
            <table class="table table-striped">
                <tr>
                    <td colspan="2" style="text-align: right;" id="bill_date"></td>
                </tr>

                <tr>
                    <th style="width: 40%;">Shipper: </th>
                    <td id="bill_shipper"></td>
                </tr>

                <tr>
                    <th>Consignee: </th>
                    <td id="bill_recipient"></td>
                </tr>

                <tr>
                    <th>Route</th>
                    <td id="bill_route"></td>
                </tr>

                <tr>
                    <th>Service Type</th>
                    <td id="bill_serviceType"></td>
                </tr>

                <tr>
                    <th>Parcel Type</th>
                    <td id="bill_parcelType"></td>
                </tr>

                <tr>
                    <th>Insurance</th>
                    <td id="bill_insurance"></td>
                </tr>

                <tr>
                    <th>Insurance Rate</th>
                    <td id="bill_insurance_rate"></td>
                </tr>

                <tr>
                    <th>Weight</th>
                    <td id="bill_weight"></td>
                </tr>

                <tr>
                    <th>Amount</th>
                    <td id="bill_amount"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div id="code" style="text-align: center;letter-spacing: 3px;">

                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Generated By</th>
                    <td id="bill_issuer"></td>
                </tr>

            </table>

        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            <button onclick="printout('payPrint')" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>
</div>

<!-- .End Details Modal -->

<!-- Label Modal -->
<div class="modal fade" id="labelDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body" id="printLabel">
            <div class="row">
                <div class="col-8">
                    <h5 style="text-decoration: underline;">Sender:</h5>
                    <div id="sender_info">
                        Sender Info Here
                    </div>
                </div>
                <div class="col-4" >
                    <img src="../images/awa.jpg" style="width: 100%;height: 50px;" style="float: right;">
                </div>
                
            </div>
            <hr>

            <h5 style="text-decoration: underline;">Recipient:</h5>
            <div id="recipient_info">
                Recipient Info Here
            </div>

            <hr>

            <div id="parcel_info">
                <div class="row">
                    <div class="col-12">
                        <h5>Parcel Code:</h5>
                        <p id="parcel_id"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12" style="text-align: center;">
                        <div id="parcel_code">

                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            <button onclick="printout('printLabel')" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>
</div>

<!-- .End label Modal -->

<!-- Daily Modal -->
<div class="modal fade" id="daily_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Payment Bill</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div> -->
        <div class="modal-body" id="payPrint">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="daily_table">
                    <thead>
                        <th>#</th>
                        <th>Date</th>                    
                        <th>Code</th>                    
                        <th>Shipper</th>                    
                        <th>Consignee</th>                    
                        <th>Origin</th>                    
                        <th>Destination</th>                  
                    </thead>
                    <tbody id="daily_body">

                    </tbody>
                </table>                
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Cancel</button>
            <button onclick="printout('payPrint')" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
</div>
</div>

<!-- .End Daily Modal -->
</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../vendors/toastr-master/build/toastr.min.js"></script>
<script src="../js/access.js"></script>
<script src="../vendors/select2/dist/js/select2.full.min.js"></script>

<script src="../vendors/jquery-validation-1.19.5/dist/jquery.validate.js"></script>
<script src="../vendors/jquery/jquery-barcode.min.js"></script>
<script src="../vendors/countup/jquery.countupcircle.js"></script>

<script src="../assets/js/dashboard.js"></script>

<!-- Tables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<script src="../js/function.js?version=1.0.0"></script>
<script src="function.js?version=1.0.0"></script>

<script src="../assets/js/jszip.min.js"></script>
<script src="../assets/js/pdfmake.min.js"></script>
<script src="../assets/js/vfs_fonts.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/buttons.colVis.min.js"></script>
<script src="../assets/js/print.js"></script>
<script type="text/javascript">
    keep_open("keep-open,index");
</script>
</body>

</html>
