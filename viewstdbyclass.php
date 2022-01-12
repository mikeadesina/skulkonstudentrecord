<?php
include "../include/config.php";
$maxsessiondetails=$setup->maxsessiondetails()->fetch(PDO::FETCH_ASSOC);
$maxsemdetails=$setup->maxsemdetails()->fetch(PDO::FETCH_ASSOC);
//echo $SESSION=$maxsessiondetails['session'];
//echo$sessionid=$maxsessiondetails['sessionid'];
//echo $TERM=$maxsemdetails['termname'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>STUDENT||LIST</title>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- END STYLESHEETS -->
    <style>
        @media (min-width: 769px) {
            #labeldesign {
                width: 10%;
                margin-left: 1px;
                float: left;
                text-align: left;
                font-weight: bold;
                font-size: 11px;
                color: #000;
                opacity: 1;
            }
            #content {
                position: relative;
                width: 100%;
                left: 0px;
                padding-top: 1px;
                margin-top:0px;
                margin-left:-90px;
            }
        }
        @media screen and (max-width: 600px) {
            #labeldesign {
                width: 100%;
                margin-left: 1px;
                float: left;
                text-align: left;
                font-weight: bold;
                font-size: 11px;
                color: #000;
                opacity: 1;
            }
            #content {
                position: relative;
                width: 100%;
                left: 0px;
                padding-top: 1px;
                margin-top:0px;
                margin-left:-0px;
            }
            table caption {
                font-size: 1.3em;
            }

            table thead {
                border: none;
                clip: rect(0 0 0 0);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }

            table tr {
                border-bottom: 3px solid #ddd;
                display: block;
                margin-bottom: .625em;
            }

            table td {
                border-bottom: 1px solid #ddd;
                display: block;
                font-size: .8em;
                text-align: right;
            }

            table td::before {
                content: attr(data-label);
                float: left;
                font-weight: bold;
                text-transform: uppercase;
            }

            table td:last-child {
                border-bottom: 0;
            }
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td { cursor: pointer;}
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }

        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }


        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        table td {

            white-space: normal !important;
            word-wrap: break-word;
        }

        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
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
        #base{
            padding-left:0px;
        }
        .closeform {
            cursor: pointer;

        }
         h3,h4,h5,h6,h1,h2{
            margin-top:0px;
            margin-bottom:0px;
        }

    </style>
    <link type="text/css" href="../assets/jquery/themes/base/ui.base.css" rel="stylesheet" />
    <link type="text/css" href="../assets/jquery/themes/base/ui.theme.css" rel="stylesheet" />
         <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script language="javascript" src="../assets/jquery/jquery.js" ></script>
    <script language="javascript" src="../assets/js/jquery.form.min.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.core.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.datepicker.js"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script language="javascript" src="../assets/jquery/jquery.js" ></script>
    <script language="javascript" src="../assets/js/jquery.form.min.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.core.js"></script>
    <script language="javascript" src="../assets/jquery/ui/ui.datepicker.js"></script>
    <script>
            $.noConflict();
            jQuery(document).ready(function ($) {
                $("#CDATE").datepicker({dateFormat: 'dd-MM-yy'});
                
            });
        </script>
</head>
<body class="menubar-hoverable header-fixed ">

<!-- BEGIN HEADER-->
<div id="base">
    <div id="content">
        <section>
            <div class="section-body contain-md">
                <h4 class="text-center">View Student List </h4>
                <h3 style="margin-left:100%"><span class="text-left closeform"><i class="fa fa-window-close" aria-hidden="true"></i></span></h3>
                
                <div class="card" style="max-height: 500px;overflow-y: scroll;">
                    <div class="card-body">
                        <form  id="form"  class="form-horizontal"  method= "POST" action=""  role="form" enctype="multipart/form-data" autocomplete="off">
    
                            <p id="msg" class="text-danger"></p>
                              <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                    Study Level:
                                </label>
                                <div class="col-sm-3">
                                     <select name="studylevel"  id="studylevel" class="form-control" required>
                                      <option value="">choose study level</option>
                                        <?php
                                        $alllevels=$general->alllevels();
                                        foreach($alllevels as $thelevels){
                                            extract($thelevels);
                                            ?>
                                            <option value="<?php echo $levelid;?>" ><?php echo $studylevel;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                    Class:
                                </label>
                                <div class="col-sm-3">
                                      <select name="thelevelclass"  id="thelevelclass" class="form-control" required>
                                          <option value="">Select Class</option>
                                    </select>
                                </div>
                                <div class="col-md-offset-8">
                                <input type="button" name="search"  id="search" value="search">

                            </div>   
                            </div>
                              <i class="fa fa-spinner fa-spin loader" style="font-size:44px;margin-left:35%;display:none"></i>
                            <div id="result"></div>
                                 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- END JAVASCRIPT -->
</body>
</html>
<script type="text/javascript">
    $('#thelevelclass').select2();
    $('#studylevel').select2();
    $(".closeform").click(function(){
        $('#base').hide();
        $('.closeform').hide();
        $('.titleofform').hide();
    });
    $(document).ready(function() {
        $("#studylevel").change(function(){
            var studylevel=$.trim($("#studylevel").val());
            if(studylevel !==''){
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{studylevel:studylevel,dataname:'getallclassbylevel'},
                success:function(response){
                 $('#thelevelclass').html(response);
                 //alert(response);  

                }
            });
            }else{
               $('#alert').html('<div class="alert alert-danger">Form input must not be empty</div>');
                $('#msgdetails').modal();
            }

        });
          $("#search").click(function(){
            var studylevel=$.trim($("#studylevel").val());
            var thelevel=$("#studylevel option:selected").text()
            var thelevelclass=$("#thelevelclass option:selected").text()
            var thelevelclassvalue=$("#thelevelclass").text()
            //alert(thelevel + thelevelclass);
            if(studylevel !=='' && thelevelclassvalue!==''){
                $('.loader').show();
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{thelevel:thelevel,studylevel:studylevel,thelevelclass:thelevelclass,dataname:'getallstddetails'},
                success:function(response){
                  //alert(response);
                  $("#result").html(response);
                  $('.loader').hide();
                   

                }
            });
            }else{
               $('#alert').html('<div class="alert alert-danger">Form input must not be empty</div>');
                $('#msgdetails').modal();
            }

        });
         

    });
</script>

