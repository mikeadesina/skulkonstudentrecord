<?php
include "../include/config.php";

// check for the login
//check if school structure is num
//amt is number
// $school='primary';
// $class='1';
// $getfees=$general->getfees($school,$class)->fetchall(pdo::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PAYMENT</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <!-- END STYLESHEETS -->
    <style>

        #labeldesign{
            width: 13%;
            margin-left: 1px;
            float: left;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            color: #000;
            opacity: 1;
        }


        .form-control,h3{
            font-size: 13px;
            opacity: 3;
            color: #000;

        }
        textarea{
            width: 280px;
            height: 60px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }


        input[type=text]:disabled  {

            border: none;
            color:black;
        }
        #approvedreq,#reason{
            display:none;
        }


    </style>
    <link type="text/css" href="../assets/jquery/themes/base/ui.base.css" rel="stylesheet" />
    <link type="text/css" href="../assets/jquery/themes/base/ui.theme.css" rel="stylesheet" />
    <script language="javascript" src="../assets/jquery/jquery.js" ></script>
    <script language="javascript" src="../assets/js/jquery.form.min.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.core.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.datepicker.js"></script>
    <script>
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#TDATE").datepicker({dateFormat: 'dd-MM-yy'});
                $("#RDATE").datepicker({dateFormat: 'dd-MM-yy'});

                
            });
        </script>
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->

<header id="header" >

    <div class="headerbar">

        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="headerbar-left">

            <ul class="header-nav header-nav-options">
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">

                        <i class="fa fa-bars"></i>

                    </a>

                </li>

            </ul>

        </div>



    </div>

</header>
<div id="base">
    <div id="content">
        <section>
            <div class="section-body contain-lg" style="max-width:200%">
                <h4 class="text-center">Enter Payments Receipts</h4>
                <div class="card">
                    <div class="card-body">
                        <form  id="form"  class="form-horizontal"  method= "POST" action=""  role="form" enctype="multipart/form-data" autocomplete="off">
                            <button id="test">button</button>
                            <p id="msg" class="text-danger">
                              Curabitur et dizzle quis nisi ghetto mollizzle. Suspendisse we gonna chung. Morbi odio. Go to hizzle neque. i'm in the shizzle. Check out this maurizzle cool, interdum a, owned sit amizzle, phat izzle, pede. Pellentesque my shizz. Vestibulum ass pot, volutpizzle izzle, check it out sizzle, fo shizzle owned, velizzle. Crizzle izzle ipsizzle. Da bomb volutpizzle felizzle vizzle orci. Pizzle stuff justo owned purizzle shiznit ornare. Doggy venenatizzle justo izzle lacus. Black nizzle. Suspendisse venenatis placerizzle pizzle. Curabitur sure ante. Fo shizzle pharetra, gangster eu check it out hendrerizzle, break it down felizzle i'm in the shizzle sizzle, izzle we gonna chung magna yo luctus pede. Pot a nisl. Dang aptent taciti crazy izzle litora torquent mofo conubia shizzle my nizzle crocodizzle, pizzle inceptizzle hymenizzle. Bow wow wow interdizzle, its fo rizzle nec dang nonummy, pimpin' orci black things, my shizz sempizzle risus arcu funky fresh yo mamma.  
                            </p>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Receipt Date
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" name="RDATE"  id="RDATE" class="form-control">
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Receipt No
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" name="RECEIPTNO"  id="RECEIPTNO" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nmlist" id="labeldesign" class="col-sm-2 control-label">Name List</label>
                                <div class="col-sm-5">
                                    <select name="NAME"  id="NAME" class="form-control" required>
                                        <option value=""> Choose Name</option>
                                         <option value="KWC1234"> Olatokun Adeshina </option>
                                        <?php
                                        
                                        $getallstudentsinalevel=$general->getallstudentsinalevel();
                                        foreach($getallstudentsinalevel as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $ADMISSIONNO;?>" ><?php echo $SURNAME. ' ' . $FIRSTNAME.'  ' . $OTHERNAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <table style="width:100%">
                                <tr>
                                    <th colspan="6" class="text-center">Student Details</th>
                                </tr>
                                <tr>
                                    <th class="text-center"
                                        width="30px">Full name</th>
                                    <th class="text-center" width="30px">Regno</th>
                                    <th class
                                        ="text-center"width="30px">Class</th>
                                </tr>

                                <tr>
                                    <td class="text-left" width="30px" id="stdfname"></td>
                                    <td class="text-center" width="30px" id="stdaddno"></td>
                                    <td class="text-center" width="30px" id="stdclass"></td>
                                </tr>
                            </table>
                            <div class="form-group">
                                <label for=" pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Amount Paid
                                </label>
                                <div class="col-sm-3">
                                    <input type="number" name="AMOUNT"  id="AMOUNT" class="form-control">
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Bank
                                </label>
                                <div class="col-sm-3">
                                    <select name=BANK  id="BANK" class="form-control" required>
                                        <option value=""> Choose Bank</option>
                                        <?php
                                        $banks=$general->banks();
                                        foreach($banks as $allbanks){
                                            extract($allbanks);
                                            ?>
                                            <option value="<?php echo $bkid;?>" ><?php echo $bankname;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Teller Date
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" name="TDATE"  id="TDATE" class="form-control">
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                 Payment Type
                                 </label>
                                <div class="col-sm-3">
                                    <select name="DOC"  id="DOC" class="form-control" required>
                                        <option value=""> Choose Payment Type</option>

                                        <?php
                                        $allpaymenttypes=$general->allpaymenttypes();
                                        foreach($allpaymenttypes as $value){
                                            extract($value);
                                            ?>
                                            <option value="<?php echo $type;?>" ><?php echo $type;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Teller No
                                </label>
                                <div class="col-sm-3">
                                    <input type="text" name="TNO"  id="TNO" class="form-control">
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Remark
                                </label>
                                <div class="col-sm-3">
                                    <textarea rows="4" cols="50" name="remark" id="remark"  placeholder="Enter Remark..."></textarea>
                                </div>
                            </div>

                            <div id="thefeestructure">

                            </div>


                            <div class="col-md-offset-11">
                                <input type="button" name="save"  id="save" value="Save">

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="msgdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">Message</h4>
            </div>
            <div class="modal-body">
                <p id="alert"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="exit" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="successdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" id="successclose" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">Message</h4>
            </div>
            <div class="modal-body">
                <p id="successalert"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="exit" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php";?>
<!-- BEGIN JAVASCRIPT -->
<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="../assets/js/libs/spin.js/spin.min.js"></script>
<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="../assets/js/core/source/App.js"></script>
<script src="../assets/js/core/source/AppNavigation.js"></script>
<script src="../assets/js/core/source/AppOffcanvas.js"></script>
<script src="../assets/js/core/source/AppCard.js"></script>
<script src="../assets/js/core/source/AppForm.js"></script>
<script src="../assets/js/core/source/AppNavSearch.js"></script>
<script src="../assets/js/core/source/AppVendor.js"></script>
<script src="../assets/js/core/demo/Demo.js"></script>
<!-- END JAVASCRIPT -->
</body>
</html>
<script src="print.js"></script>
<script type="text/javascript">

    
$("#test").click(function() {
    $(".card").printThis({
        debug: true
    });
});


</script>

