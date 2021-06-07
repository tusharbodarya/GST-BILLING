<?php
include 'header.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $orderid = $_POST['orderid'];
    $accountype = $_POST['accountype'];
    $accountid = $_POST['accountid'];
    $productgroup = $_POST['productgroup'];
    $billtype = 'Sale Invoice';
    $refer = $_POST['refer'];
    $orderdate = $_POST['orderdate'];
    $orderduedate = $_POST['orderduedate'];
    $taxformat = $_POST['taxformat'];
    $discountFormat = $_POST['discountFormat'];
    $notes = $_POST['notes'];
    $product_name = $_POST['product_name'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $product_tax = $_POST['product_tax'];
    $texttaxa = $_POST['texttaxa'];
    $product_discount = $_POST['product_discount'];
    $ammount = $_POST['ammount'];
    $size = sizeof($_POST['product_name']);
    $abc  = array();
    for ($i=0; $i < $size; $i++) { 
        $abc[] = array(
            'product_name'=>$product_name[$i],
            'product_qty'=>$product_qty[$i],
            'product_price'=>$product_price[$i],
            'product_tax'=>$product_tax[$i],
            'texttaxa'=>$texttaxa[$i],
            'product_discount'=>$product_discount[$i],
            'ammount'=>$ammount[$i]
        );
    }
    $cartarray = serialize($abc); 
    $totaltax = $_POST['totaltax'];
    $totaldiscount = $_POST['totaldiscount'];
    $total = $_POST['total'];
    if(isset($taxformat) && isset($totaltax)){
        if($taxformat == 'gst'){
        $totaltax=str_replace(',','',$totaltax);
        $totaltax = $totaltax/2;
         $ac = "SELECT * FROM tbl_accounts  WHERE id='21'";
        $acresult = mysqli_query($conn,$ac) or die("SQL Query Failed.");
        $acrow = mysqli_fetch_assoc($acresult);
        $acopeningbalance = $acrow['openingbalance'];
        $Sum = $acopeningbalance+$totaltax;
        $acupdatesql = "UPDATE tbl_accounts SET openingbalance='".$Sum."' WHERE id='21'";
        $acresult = mysqli_query($conn,$acupdatesql) or die("SQL Query Failed.");

        $ac1 = "SELECT * FROM tbl_accounts  WHERE id='57'";
        $acresult1 = mysqli_query($conn,$ac1) or die("SQL Query Failed.");
        $acrow1 = mysqli_fetch_assoc($acresult1);
        $acopeningbalance1 = $acrow1['openingbalance'];
        $Sum1 = $acopeningbalance1+$totaltax;
        $acupdatesql1 = "UPDATE tbl_accounts SET openingbalance='".$Sum1."' WHERE id='57'";
        $acresult1 = mysqli_query($conn,$acupdatesql1) or die("SQL Query Failed.");
    }else if($taxformat == 'igst'){
        $ac = "SELECT * FROM tbl_accounts  WHERE id='59'";
        $acresult = mysqli_query($conn,$ac) or die("SQL Query Failed.");
        $acrow = mysqli_fetch_assoc($acresult);
        $acopeningbalance = $acrow['openingbalance'];
        $totaltax=str_replace(',','',$totaltax);
        $sum = $acopeningbalance+$totaltax;
        $acupdatesql = "UPDATE tbl_accounts SET openingbalance='".$sum."' WHERE id='59'";
        $acresult = mysqli_query($conn,$acupdatesql) or die("SQL Query Failed.");
    }
}
    if(!empty($accountype) && !empty($accountid) && !empty($total)){
        $ac = "SELECT * FROM tbl_accounts  WHERE id='".$accountid."'";
        $acresult = mysqli_query($conn,$ac) or die("SQL Query Failed.");
        $acrow = mysqli_fetch_assoc($acresult);
        $acopeningbalance = $acrow['openingbalance'];
        $total=str_replace(',','',$total);
        $sum = $acopeningbalance+$total;
        $acupdatesql = "UPDATE tbl_accounts SET openingbalance='".$sum."' WHERE id='".$accountid."'";
        $acresult = mysqli_query($conn,$acupdatesql) or die("SQL Query Failed.");
    }
    $showalert = false;
    $showerror = false;
    if(isset($orderid) && isset($accountid)){
        $existsql = "SELECT * FROM tbl_salesinvoice WHERE orderid='".$orderid."' AND is_deleted='0' AND is_user='".$loguser."'";
        $result = mysqli_query($conn,$existsql) or die("SQL Query Failed.");
        $existnumrows = mysqli_num_rows($result);
        if($existnumrows > 0){
            $showerror = "Suppliers Stock Return already Exist.";
        }else{
            $sql = "INSERT INTO `tbl_salesinvoice` ( `orderid`, `accountid`,`billtype`,`refer`,`orderdate`,`orderduedate`,`taxformat`,`discountFormat`,`notes`,`cartarray`,`totaltax`,`totaldiscount`,`total`,`is_user`) VALUES ('".$orderid."', '".$accountid."', '".$billtype."', '".$refer."','".$orderdate."', '".$orderduedate."', '".$taxformat."', '".$discountFormat."', '".$notes."','".$cartarray."', '".$totaltax."', '".$totaldiscount."', '".$total."','".$loguser."')";
            $result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
            if($result){
                $showalert = true;
                echo "<script>location.href='tbl-saleinvoice.php';</script>";
            }else{
                $showerror = "Please Enter Correct Details";
            }
        }
    }
}else{
    $showerror = "";
    $showalert = "";
}
?>
<?php 
if($showalert){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong>  Purchase Order Added Successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
}
if($showerror){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error ! </strong> '.$showerror.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>'; 
}
?>
<script src="assets/js/accounting.js"></script>
<script type='text/javascript'>
    accounting.settings = {number: {precision :2,thousand: ',',decimal : '.'}};
    var two_fixed=2; 
</script>
<style type="text/css">
    .row {
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .td{
        padding: 10px;
    }
    label{
        margin-top: 15px;
    }
</style>
<span id="hdata" data-df="dd-mm-yyyy" data-curr="$"></span>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-shadow mb-4">
                <form method="post" id="data_form">
                    <div class="row">
                        <div class="col-sm-6 cmp-pnl">
                            <div id="customerpanel" class="inner-cmp-pnl">
                            <div class="form-row">
                                    <div class="col-sm-12">
                                        <h3 class="title">
                                            Bill To 
                                            <a href='add-accounts.php' class="btn btn-info">Add Account</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <select name="accountype" class="selectpicker form-control" onchange="findaccounts(this.value,<?php echo $loguser; ?>)">
                                        <option value="cash">Cash</option>
                                        <option value="debit">Debit</option>
                                    </select>
                                    <div class="frmSearch col-sm-12"><label for="accountid" class="caption">Search Account </label>
                                        <input list="accountid" class="form-control" name="accountid" onchange="getaccounts(this.value)" id="supplier-box" autocomplete="off">
                                        <datalist id="accountid" class="productsname">

                                        </datalist>
                                    </div>
                                </div>
                                <div id="supplier">
                                    <div class="clientinfo">
                                        Supplier Details<hr>
                                        <input type="hidden" name="supplier_id" id="supplier_id" value="0">
                                        <div id="accounter_name"></div>
                                    </div>
                                    <hr>Product Group 
                                    <select id="productgroup" name="productgroup" class="selectpicker form-control">
                                        <option value='' hidden>Select Product Group</option>
                                        <?php
                                        $result1 = mysqli_query($conn,"select * from tbl_productgroup WHERE is_deleted='0' AND is_user='".$loguser."'");
                                        while($row1 = mysqli_fetch_array($result1)) {
                                            ?>
                                            <option value="<?php echo $row1['id'];?>"><?php echo $row1['name'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 cmp-pnl">
                            <div class="inner-cmp-pnl">
                                <div class="form-row">
                                    <div class="col-sm-12"><h4 class="title">Sales Invoice</h4></div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6"><label for="orderid" class="caption">Bill No </label>
                                    <?php
                                      $existsql1 = "SELECT max(orderid) FROM tbl_salesinvoice WHERE is_user='".$loguser."'";
                                      $result1 = mysqli_query($conn,$existsql1) or die("SQL Query Failed.");
                                      $existnumrows1 = mysqli_num_rows($result1);
                                      if($existnumrows1 > 0){
                                        $row = mysqli_fetch_assoc($result1);
                                        $id = $row['max(orderid)'];
                                        $oid =$id + 1;
                                    }else{
                                        $oid = 001;   
                                    }
                                    ?>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="icon-file-text-o" aria-hidden="true"></span></div>
                                        <input class="form-control" name="orderid" value="<?php echo $oid; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6"><label for="refer" class="caption">Challan No </label>
                                   <div class="input-group">
                                    <div class="input-group-addon"><span class="icon-bookmark-o" aria-hidden="true"></span></div>
                                    <input type="text" class="form-control" placeholder="Challan No #" name="refer">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6"><label for="invociedate" class="caption">Order Date </label>
                               <div class="input-group">
                                <div class="input-group"  data-date-format="dd/mm/yyyy"><span class="icon-calendar4" aria-hidden="true"></span></div>
                                <input type="text" class="form-control rounded dpd1" value="<?php echo date('d/m/Y'); ?>"  name="orderdate"   autocomplete="false">
                            </div>
                        </div>
                        <div class="col-sm-6"><label for="invocieduedate" class="caption">Order Due Date </label>
                           <div class="input-group">
                            <div class="input-group-addon"><span class="icon-calendar-o" aria-hidden="true"></span></div>
                            <input type="text" class="form-control rounded dpd2" id="tsn_due" name="orderduedate" placeholder="Due Date" autocomplete="false">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6">
                        <label for="taxformat" class="caption">Tax </label>
                        <select class="form-control round" onchange="changeTaxFormat(this.value)" name="taxformat" id="taxformat">

                            <option value="gst" data-tformat="cgst">CGST + SGST</option>
                            <option value="igst" data-tformat="igst">IGST</option>
                            <option value="other">other</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="discountFormat" class="caption"> Discount</label>
                            <select class="form-control" onchange="changeDiscountFormat(this.value)" name="discountFormat" id="discountFormat">
                                <option value="b_p"> % Discount Before TAX</option>
                                <option value="bflat">Flat Discount Before TAX</option>      
                                <option value="%"> % Discount After TAX</option>
                                <option value="flat">Flat Discount After TAX</option>      
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <label for="toAddInfo" class="caption"> </label>
                        <textarea class="form-control" name="notes" rows="2"></textarea></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="saman-row">
            <table class="table-responsive tfr my_stripe">
                <thead>
                    <tr class="item_header bg-primary white">
                        <th width="30%" class="text-center">Item Name</th>
                        <th width="8%" class="text-center"> Quantity</th>
                        <th width="10%" class="text-center">Rate</th>
                        <th width="10%" class="text-center">Tax(%)</th>
                        <th width="10%" class="text-center">Tax</th>
                        <th width="7%" class="text-center"> Discount</th>
                        <th width="10%" class="text-center">Amount($)</th>
                        <th width="5%" class="text-center"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-active">
                        <td class="td"><input list="products" class="form-control" name="product_name[]" onchange="getproduct(this.value,'0')" id="productname-0" autocomplete="off">
                          <datalist id="products" class="productsname">

                          </datalist></td>
                          <td class="td">
                            <input type="text" class="form-control req amnt" name="product_qty[]" id="amount-0" onkeypress="return isNumber(event)" onkeyup="rowTotal('0'), billUpyog()" autocomplete="off" value="1">
                        </td>
                        <td class="td">
                            <input type="text" class="form-control req prc" name="product_price[]" id="price-0" onkeypress="return isNumber(event)" onkeyup="rowTotal('0'), billUpyog()" autocomplete="off">
                        </td>
                        <td class="td">
                            <input type="text" class="form-control vat " name="product_tax[]" id="vat-0" onkeypress="return isNumber(event)" onkeyup="rowTotal('0'), billUpyog()" autocomplete="off">
                        </td>
                        <td class="td"><input name="texttaxa[]" class="text-center form-control" value="0" id="texttaxa-0" readonly>
                        </td>
                        <td class="td">
                            <input type="text" class="form-control discount" name="product_discount[]" onkeypress="return isNumber(event)" id="discount-0"  onkeyup="rowTotal('0'), billUpyog()" autocomplete="off">
                        </td>
                        <td class="td">
                            <strong><input class='form-control ttlText' id="result-0" name="ammount[]" value="0" readonly></strong>
                        </td>
                        <td class="text-center">
                        </td>
                        <input type="hidden" name="taxa[]" id="taxa-0" value="0">
                        <input type="hidden" name="disca[]" id="disca-0" value="0">
                        <input type="hidden" class="ttInput" name="product_subtotal[]" id="total-0" value="0">
                        <input type="hidden" class="pdIn" name="pid[]" id="pid-0" value="0">
                        <input type="hidden" name="unit[]" id="unit-0" value="">
                        <input type="hidden" name="hsn[]" id="hsn-0" value="">
                    </tr>
                    <tr class="last-item-row">
                        <td class="add-row row">
                            <button type="button" class="btn btn-success" id="addproduct">
                                <i class="fa fa-plus-square"></i> Add Row </button>
                            </td>
                            <td colspan="7"></td>
                        </tr>
                        <tr style="display: table-row;">
                            <td class="td" colspan="6" align="right"><input type="hidden" value="0" id="subttlform" name="subtotal"><strong> Total Tax(<span class="currenty lightMode">$</span>)</strong>
                            </td>
                            <td class="td" align="left" colspan="2">
                                <input id="taxr" name='totaltax' class="form-control" value="0" readonly></td>
                            </tr>
                            <tr style="display: table-row;">
                                <td class="td" colspan="6" align="right">
                                    <strong> Total Discount(<span class="currenty lightMode">$</span>)</strong></td>
                                    <td class="td" align="left" colspan="2">
                                        <input id="discs" name="totaldiscount" value="0" class="form-control" readonly></td>
                                    </tr>
                                    <tr style="display: table-row;">
                                        <td class="td" colspan="6" align="right">
                                            <strong> Grand Total(<span class="currenty lightMode">$</span>)</strong>
                                        </td>
                                        <td class="td" align="left" colspan="2"><input type="text" name="total" class="form-control"  id="invoiceyoghtml" readonly="">
                                        </td>
                                    </tr>
                                    <tr style="width: 100%;" class="row">
                                        <td style="padding-left: 250%;"><input type="submit" class="btn btn-success sub-btn" value="Generate Order" id="submit-data" data-loading-text="Creating...">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" value="stockreturn/action" id="action-url">
                        <input type="hidden" value="0" name="person_type">
                        <input type="hidden" value="puchase_search" id="billtype">
                        <input type="hidden" value="0" name="counter" id="ganak">
                        <input type="hidden" value="$" name="currency">
                        <input type="hidden" value="%" name="tax_format" id="tax_format">
                        <input type="hidden" value="yes" name="tax_handle" id="tax_status">
                        <input type="hidden" value="yes" name="applyDiscount" id="discount_handle">
                        <input type="hidden" value="%" name="discount_Format" id="discount_format">
                        <input type="hidden" value="10.00" name="shipRate" id="ship_rate">
                        <input type="hidden" value="incl" name="ship_taxtype" id="ship_taxtype">
                        <input type="hidden" value="0" name="ship_tax" id="ship_tax">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
            findaccounts('cash',<?php echo $loguser; ?>);
        });
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 44 || charCode > 57)) {
                return false;
            }
            return true;
        }
        var dtformat = $('#hdata').attr('data-df');
        var currency = $('#hdata').attr('data-curr');
    </script>
    <script src="assets/js/invoice.js"></script>
    <script src="assets/js/invoice1.js"></script>
    <?php include 'footer.php'; ?>
