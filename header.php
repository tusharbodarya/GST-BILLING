<?php 
session_start();
include "dbconnect.php";
if(isset($_SESSION['loggedin'])){
  $loguser = $_SESSION['logid'];
  $headsql = "SELECT * FROM users  WHERE  sno='".$loguser."'";
$headresult = mysqli_query($conn,$headsql) or die("SQL Query Failed.");
$headrow = mysqli_fetch_assoc($headresult);
$headheadname = $headrow['name'];
}else{
  header("location:login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <link rel="icon" type="image/png" href="assets/img/favicon.html">
  <title><?php echo $headheadname; ?></title>
  <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
  <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
  <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">
  <link href="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">
  <link href="assets/vendor/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet">
  <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <link href="assets/vendor/icheck/skins/all.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
<!--   <link href="assets/vendor/select2/css/select2.css" rel="stylesheet">
 -->  <link href="assets/vendor/jquery-steps/jquery.steps.css" rel="stylesheet">
  <link href="assets/vendor/datatables/jquery.dataTables.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/datatables/buttons.dataTables.css" rel="stylesheet">
  <link href="assets/vendor/datetime-picker/css/datetimepicker.css" rel="stylesheet">
  <link href="assets/vendor/date-picker/css/bootstrap-datepicker.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

</head>
<body class="fixed-nav top-nav">
  <!-- top nav -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">
    <div class="box-container">
      <!--brand name for responsive-->
      <a class="navbar-brand navbar-brand-responsive" href="">
        <img class="pr-3 float-left" src="assets/img/logo-icon.png" srcset="assets/img/logo-icon@2x.png 2x"  alt=""/>
        <div class="float-left">
          <div><?php echo $headheadname; ?></div>
        </div>
      </a>
      <!--/brand name for responsive-->
      <!--responsive navigation list toggle-->

      <!--/responsive navigation list toggle-->
      <!--responsive nav notification toggle-->
      <button class="navbar-toggler nav-notification-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span> <i class="vl_ellipsis-fill-v f16"></i></span>
      </button>
      <!--/responsive nav notification toggle-->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <!--brand name-->
        <a class="navbar-brand navbar-hide-responsive" href="">
          <img class="pr-3 float-left" src="assets/img/logo-icon.png" srcset="assets/img/logo-icon@2x.png 2x"  alt=""/>
          <div class="float-left">
            <div><?php echo $headheadname; ?></div>
          </div>
        </a>
        <!--/brand name-->
        <!--header rightside links-->
        <ul class="navbar-nav header-links ml-auto hide-arrow">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-3" id="messagesDropdown" href="" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="vl_chat-bubble"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">9 New</span>
            </span>
            <div class="notification-alarm">
              <span class="wave wave-danger"></span>
              <span class="dot"></span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right header-right-dropdown-width pb-0" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header weight500 ">Messages</h6>
            <div class="dropdown-divider mb-0"></div>
            <a class="dropdown-item border-bottom msg-unread" href="">
              <div class="float-left notificaton-thumb">
                <img class="rounded-circle" src="assets/img/avatar/avatar4.jpg" alt=""/>
              </div>
              <span class="weight500">Andrew Flinton</span>
              <span class="small float-right text-muted">08:30 AM</span>
              <div class="dropdown-message">
                I hope that you will be there in time. See you then
              </div>
            </a>
            <a class="dropdown-item border-bottom msg-unread" href="">
              <div class="float-left notificaton-thumb">
                <img class="rounded-circle" src="assets/img/avatar/avatar2.jpg" alt=""/>
              </div>
              <span class="weight500">John Doe</span>
              <span class="small float-right text-muted">10:28 AM</span>
              <div class="dropdown-message">
                Hello this is an example message. Just want to show how it looks
              </div>
            </a>
            <a class="dropdown-item border-bottom" href="">
              <div class="float-left notificaton-thumb">
                <img class="rounded-circle" src="assets/img/avatar/avatar3.jpg" alt=""/>
              </div>
              <span class="weight500">Dash Don</span>
              <span class="small float-right text-muted">07:12 PM</span>
              <div class="dropdown-message">
                Hi, This is Dash Don form usa. I'm looking for someone who really good at design and frontend like mosaddek
              </div>
            </a>
            <a class="dropdown-item border-bottom" href="">
              <div class="float-left notificaton-thumb">
                <img class="rounded-circle" src="assets/img/avatar/avatar1.jpg" alt=""/>
              </div>
              <span class="weight500">dkmosa</span>
              <span class="small float-right text-muted">12:10 PM</span>
              <div class="dropdown-message">
                We build a beautiful dashboard admin panel for professional
              </div>
            </a>
            <a class="dropdown-item small" href="">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-3" id="alertsDropdown" href="" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="vl_bell"></i>
          <span class="d-lg-none">Notification
            <span class="badge badge-pill badge-warning">5 New</span>
          </span>
          <div class="notification-alarm">
            <span class="wave wave-warning"></span>
            <span class="dot bg-warning"></span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right header-right-dropdown-width pb-0" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header weight500">Notification</h6>
          <div class="dropdown-divider mb-0"></div>
          <a class="dropdown-item border-bottom" href="">
            <span class="text-primary">
              <span class="weight500">
                <i class="vl_bell weight600 pr-2"></i>Weekly Update</span>
              </span>
              <span class="small float-right text-muted">03:14 AM</span>
              <div class="dropdown-message f12">
                This week project update report generated. All team members are requested to check the updates
              </div>
            </a>
            <a class="dropdown-item border-bottom" href="">
              <span class="text-danger">
                <span class="weight500">
                  <i class="vl_Download-circle weight600 pr-2"></i>Server Error</span>
                </span>
                <span class="small float-right text-muted">10:34 AM</span>
                <div class="dropdown-message f12">
                  Unexpectedly server response stop. Responsible members are requested to fix it soon
                </div>
              </a>
              <a class="dropdown-item border-bottom" href="">
                <span class="text-success">
                  <span class="weight500">
                    <i class="vl_screen weight600 pr-2"></i>Monthly Meeting</span>
                  </span>
                  <span class="small float-right text-muted">12:30 AM</span>
                  <div class="dropdown-message f12">
                    Our monthly meeting will be held on tomorrow sharp 12:30. All members are requested to attend this meeting.
                  </div>
                </a>
                <a class="dropdown-item small" href="">View all notification</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mr-lg-3" id="userNav" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-thumb">
                  <img class="rounded-circle" src="assets/img/avatar/avatar1.jpg" alt=""/>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                <a class="dropdown-item" href="">My Profile</a>
                <a class="dropdown-item" href="">Account Settings</a>
                <?php
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                 $loggedin = true;
               }else{
                $loggedin = false;
              }                        
              if(!$loggedin){
                echo '<a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="singup.php">singup</a>';
              }
              if($loggedin){
               echo '<div class="dropdown-divider"></div>
               <a class="dropdown-item" href="logout.php">Logout</a>';
             }          
             ?>
           </div>
         </li>
         <li class="nav-item">
          <a href="javascript:;" class="nav-link right_side_toggle">
            <i class="icon-options-vertical"> </i>
          </a>
        </li>
      </ul>
      <!--/header rightside links-->
    </div>
  </div>
</nav>
<!-- top nav -->
<nav class="navbar fixed-top-2 navbar-expand-lg navbar-light bg-light">
  <div class="box-container">
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item active"> <a class="nav-link" href="index.php"><i class="icon-speedometer"></i> Home</a> </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-basket-loaded"></i> Sales</a>
          <ul class="dropdown-menu">

            <li><a class="dropdown-item" href=""><i class="icon-basket"></i> Sales &raquo </a>
             <ul class="submenu dropdown-menu">
              <li><a class="dropdown-item" href="add-saleinvoice.php">New Invoice</a></li>
              <li><a class="dropdown-item" href="tbl-saleinvoice.php">Manage Invoices</a></li>
            </ul>
          </li>
          <li><a class="dropdown-item" href=""><i class="icon-call-out"></i>Sales Challans &raquo</a>
           <ul class="submenu dropdown-menu">
            <li><a class="dropdown-item" href="add-salechallan.php">New sales Challan</a></li>
            <li><a class="dropdown-item" href="tbl-salechallan.php">Manage Sales Challans</a></li>
          </ul>
        </li>
        <li><a class="dropdown-item" href="tbl-customercredit.php"><i class="icon-screen-tablet"></i> Credit Notes</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-handbag"></i> Purchase</a>
      <ul class="dropdown-menu">

        <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-handbag"></i> Purchase Order &raquo</a>
          <ul class="submenu dropdown-menu">
            <li><a class="dropdown-item" href="add-purchaseorder.php">New Purchase Order</a></li>
            <li><a class="dropdown-item" href="tbl-purchaseorder.php">Manage Purchase Orders</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-puzzle"></i> Stock Return &raquo</a>
          <ul class="submenu dropdown-menu">
            <li><a class="dropdown-item" href="tbl-Salesstockreturn.php">Sales Records</a></li>
            <li><a class="dropdown-item" href="tbl-Purchasestockreturn.php">Purchase Records</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-target"></i> Suppliers &raquo</a>
          <ul class="submenu dropdown-menu">
            <li><a class="dropdown-item" href="add-suppliers.php">New Supplier</a></li>
            <li><a class="dropdown-item" href="tbl-suppliers.php">Manage Suppliers</a></li>
          </ul>
        </li>
      </ul>
    </li>

    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-diamond"></i> Clients</a>
      <ul class="dropdown-menu">
       <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-people"></i> Clients &raquo</a>
        <ul class="submenu dropdown-menu">
          <li><a class="dropdown-item" href="add-clients.php">New Client</a></li>
          <li><a class="dropdown-item" href="tbl-clients.php">Manage Clients</a></li>
        </ul>
      </li>
      <li><a class="dropdown-item" href="tbl-clientgroup.php"><i class="icon-grid"></i> Client Groups</a></li>
  <!-- <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="fa fa-ticket"></i> Support Tickets &raquo</a>
    <ul class="submenu dropdown-menu">
      <li><a class="dropdown-item" href="">UnSolved</a></li>
      <li><a class="dropdown-item" href="">Manage Tickets</a></li>
    </ul>
  </li> -->
</ul>
</li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="fa fa-shopping-basket"></i> Products</a>
  <ul class="dropdown-menu">
   <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-list"></i> Items Manager &raquo</a>
    <ul class="submenu dropdown-menu">
      <li><a class="dropdown-item" href="add-product.php">New Product</a></li>
      <li><a class="dropdown-item" href="tbl-product.php">Manage Products</a></li>
    </ul>
  </li>
  <li><a class="dropdown-item" href="tbl-productcategory.php"><i class="icon-umbrella"></i> Product Categories</a></li>
  <li><a class="dropdown-item" href="tbl-productgroup.php"><i class="icon-equalizer"></i> Product Group</a></li>
</ul>
</li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="icon-calculator"></i> Accounts</a>
  <ul class="dropdown-menu">
   <li class="nav-item dropdown"><a class="dropdown-item"><i class="icon-book-open"></i> Accounts Book &raquo</a>
    <ul class="submenu dropdown-menu">
      <!-- <li><a class="dropdown-item" href="add-accounts.php">Add Account</a></li> -->
      <li><a class="dropdown-item" href="tbl-accounts.php">Accounts</a></li>
      <li><a class="dropdown-item" href="tbl-accountsgroup.php">Account Group</a></li>
      <li><a class="dropdown-item" href="accounts-statement.php">Account Statements</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown"><a class="dropdown-item"><i class="icon-wallet"></i> Transactions &raquo</a>
    <ul class="submenu dropdown-menu">
      <li><a class="dropdown-item" href="tbl-transaction.php">View Transactions</a></li>
      <li><a class="dropdown-item" href="add-transaction.php">New Transaction</a></li>
      <li><a class="dropdown-item" href="">New Transfer</a></li>
      <li><a class="dropdown-item" href="tbl-income.php">Income</a></li>
      <li><a class="dropdown-item" href="tbl-expense.php">Expense</a></li>
      <li><a class="dropdown-item" href="">Clients Transactions</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown"><a class="dropdown-item"><i class="icon-chart"></i> Balance Sheet &raquo</a>
    <ul class="submenu dropdown-menu">
      <li><a class="dropdown-item" href="view-trading.php">View Trading</a></li>
      <li><a class="dropdown-item" href="view-p&l.php">View Profit & Loss</a></li>
      <li><a class="dropdown-item" href="view-balancesheet.php">View Balance sheet</a></li>
    </ul>
  </li>
  <!-- <li><a class="dropdown-item" href=""><i class="icon-share-alt"></i> Expense</a></li> -->
</ul>
</li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-pie-chart"></i> Data &amp; Reports</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href=""><i class="ti-flickr"></i> Business Registers</a></li>
    <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-doc"></i> Statements &raquo</a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="">Account Statements</a></li>
        <li><a class="dropdown-item" href="">Customer Account Statements</a></li>
        <li><a class="dropdown-item" href="">Supplier Account Statements</a></li>
        <li><a class="dropdown-item" href="">TAX Statements</a></li>
        <li><a class="dropdown-item" href="">Product Sales Reports</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-chart"></i> Graphical Reports &raquo</a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="">Product Categories</a></li>
        <li><a class="dropdown-item" href="">Trending Products</a></li>
        <li><a class="dropdown-item" href="">Profit</a></li>
        <li><a class="dropdown-item" href="">Top_Customers</a></li>
        <li><a class="dropdown-item" href="">Income vs Expenses</a></li>
        <li><a class="dropdown-item" href="">Income</a></li>
        <li><a class="dropdown-item" href="">Expenses</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-bulb"></i> Summary &amp; Report &raquo</a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="">Statistics</a></li>
        <li><a class="dropdown-item" href="">Profit</a></li>
        <li><a class="dropdown-item" href="">Calculate Income</a></li>
        <li><a class="dropdown-item" href="">Calculate Expenses</a></li>
        <li><a class="dropdown-item" href="">Sales</a></li>
        <li><a class="dropdown-item" href="">Products</a></li>
        <li><a class="dropdown-item" href="">Employee Commission</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-note"></i>Miscellaneous</a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="tbl-notes.php"><i class="icon-note"></i> Notes</a></li>
    <li><a class="dropdown-item" href="calendar.php"><i class="icon-calendar"></i> Calendar</a></li>
    <!-- <li><a class="dropdown-item" href=""><i class="icon-doc"></i> Documents</a></li> -->
  </ul>
</li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-docs"></i> HRM</a>
  <ul class="dropdown-menu">
    <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="icon-people"></i> Employees &raquo</a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="">Employees</a></li>
        <li><a class="dropdown-item" href="">Permissions</a></li>
        <li><a class="dropdown-item" href="">Salaries</a></li>
        <li><a class="dropdown-item" href="">Attendance</a></li>
        <li><a class="dropdown-item" href="">Holidays</a></li>
      </ul>
    </li>
    <li><a class="dropdown-item" href=""><i class="icon-folder"></i> Departments</a></li>
    <li><a class="dropdown-item" href=""><i class="icon-notebook"></i> Payroll</a></li>
  </ul>
</li>
<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="" data-toggle="dropdown"><i class="icon-chart"></i> Data Export Import</a>
  <ul class="dropdown-menu">
    <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="ti-export"></i> Export &raquo</a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="">Export People Data</a></li>
        <li><a class="dropdown-item" href="">Export Transactions</a></li>
        <li><a class="dropdown-item" href="">Export Products</a></li>
        <li><a class="dropdown-item" href="">TAX Export</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown"><a class="dropdown-item" href=""><i class="ti-import"></i> Import &raquo</a>
      <ul class="submenu dropdown-menu">
        <li><a class="dropdown-item" href="">Import Products</a></li>
        <li><a class="dropdown-item" href="">Import Customers</a></li>
      </ul>
    </li>
    <li><a class="dropdown-item" href=""><i class="ti-menu"></i> Account Statements</a></li>
    <li><a class="dropdown-item" href=""><i class="ti-server"></i> Database Backup</a></li>
    <li><a class="dropdown-item" href=""><i class="ti-stats-up"></i> Products Account Statements</a></li>
  </ul>
</li> 

</ul>
</div>
</div> <!-- navbar-collapse.// -->
</nav>