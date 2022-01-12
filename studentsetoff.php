 <?php
include "../include/config.php";
//include('../include/config.php');
extract($_POST);
$maxsessiondetails=$setup->maxsessiondetails()->fetch(PDO::FETCH_ASSOC);
$maxsemdetails=$setup->maxsemdetails()->fetch(PDO::FETCH_ASSOC);
$SESSION=$maxsessiondetails['session'];
$sessionid=$maxsessiondetails['sessionid'];
$TERM=$maxsemdetails['termname'];
$shortterm=$maxsemdetails['shortterm'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>STUDENT||SETOFF</title>

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
            width: 7%;
            margin-left:1px;
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


      


    </style>
    <link type="text/css" href="../assets/jquery/themes/base/ui.base.css" rel="stylesheet" />
    <link type="text/css" href="../assets/jquery/themes/base/ui.theme.css" rel="stylesheet" />
    <script language="javascript" src="../assets/jquery/jquery.js" ></script>
    <script language="javascript" src="../assets/js/jquery.form.min.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.core.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.datepicker.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
     <script>
        $.noConflict();
        jQuery(document).ready(function ($) {
            $("#dateout").datepicker({dateFormat: 'dd-MM-yy'});


        });
    </script>
    
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->

<div id="base">
    <div id="content">
        <section>
            <div class="section-body contain-md">
                <h4 class="text-center">Student Set Off</h4>
                <div class="card">
                    <div class="card-body">
                        <form  id="form"  class="form-horizontal"  method= "POST" action=""  role="form" enctype="multipart/form-data" autocomplete="off">
                            
                            <p id="msg" class="text-danger"></p>

                            
                            <div class="form-group">
                                <label for="nmlist" id="labeldesign" class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-3">
                                    <select name="thestdclass"  id="thestdclass" class="form-control" required>
                                        <option value=""> Choose Class</option>
                                        <?php
                                        $allclasses=$general->allclasses();
                                        foreach($allclasses as $alltheclasses){
                                            extract($alltheclasses);
                                            ?>
                                            <option value="<?php echo $class;?>" ><?php echo $class;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for="nmlist" id="labeldesign" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-3">
                                    <select name="addno"  id="addno" class="form-control" required>
                                        <option value=""> Choose Name</option>

                                    </select>
                                </div>
                                <!-- <div class="col-sm-2"style="margin-left:60%;">
                                    <font size="2" style="color:blue" id="newstdaddno" ></font>
                                </div>
                                <div class="col-sm-2">
                                    <font size="2" style="color:blue" id="newstdclass" ></font>
                                </div> -->
                                <label for="nmlist" id="labeldesign" class="col-sm-2 control-label">Class</label>
                                <div class="col-sm-3">
                                    <select name="severancetype"  id="severancetype" class="form-control" required>
                                        <option value=""> Choose severance type </option>
                                        <?php
                                        $getseverancetype=$general->getseverancetype();
                                        foreach($getseverancetype as $allseverancetype){
                                            extract($allseverancetype);
                                            ?>
                                            <option value="<?php echo $severancetype;?>" ><?php echo ucfirst($severancetype);?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="theresult">
                                <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                    Date Out
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" name="dateout"  id="dateout" class="form-control">
                                </div>
                                      <div class="col-sm-2">
                                    <font size="2" style="color:blue" id="newstdaddno" ></font>
                                   </div>
                                <div class="col-sm-2">
                                    <font size="2" style="color:blue" id="newstdclass" ></font>
                                </div>
                                <div class="col-md-offset-10">
                                    <input type="button" name="save"  id="save" value="Search">
                                </div> 
                            </div>

                            <div id="theresult"></div>
                             <input type="hidden" name="level"  id="level">
                             <input type="hidden" name="class"  id="class">
                             <input type="hidden" name="status"  id="status">
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
                <button type="button" class="btn btn-default" id="exit" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- END JAVASCRIPT -->
</body>
</html>
<script type="text/javascript">
    $('#addno').select2();
    $('#severancetype').select2();
    $('#thestdclass').select2();
    $('#feetype').select2();
    $(document).ready(function() {
        $("#thestdclass").change(function(){
            var thestdclass=$.trim($("#thestdclass").val());
            $.ajax({
                url:"schoolcontrol.php",
                type:'POST',
                dataType:'text',
                data:{thestdclass:thestdclass,dataname:'getstdbylevel'},
                success:function(response){
                    $('#addno').html(response);
                }
            });
        });
        $("#addno").change(function(){
            var addno=$("#addno").val();
            $.ajax({
                url:"schoolcontrol.php",
                type:'POST',
                dataType:'JSON',
                data:{addno:addno,dataname:'getstddetails'},
                success:function(stddata){
                    $('#level').val(stddata.level);
                    $('#class').val(stddata.class);
                    $('#status').val(stddata.status);
                    $('#newstdaddno').html('Admissionno:'+ stddata.ADDNO);
                    $('#newstdclass').html(stddata.class);
                }
            });
        });
           $("#save").click(function(){
            var level=$("#level").val();
            var theclass=$("#class").val();
            //var thestdclass=$("#thestdclass").val();
            var status=$("#status").val();

            $.ajax({
                url:"schoolcontrol.php",
                type:'POST',
                dataType:'text',
                data:{level:level,status:status,theclass:theclass,dataname:'getthestdfeestructure'},
                success:function(response){
                    //alert(response);
                    $('#theresult').html(response);
                    
                }
            });
        });
      
        $('#exit').on("click", function () {
                setTimeout(function () {
                    location.href = "singlebill.php", 60000
                });
        });
        $('#close').on("click", function () {
                setTimeout(function () {
                    location.href = "singlebill.php", 60000
                });
        });
    });
</script>

