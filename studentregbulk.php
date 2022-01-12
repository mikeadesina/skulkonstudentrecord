<?php
include "../include/config.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>STUDENT||PROFILE</title>

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
            width: 10%;
            margin-left: 1px;
            float: left;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            color: #000;
            opacity: 1;
        }
        #classlabeldesign{
            width: 7%;
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
            $("#YOE").datepicker({dateFormat: 'dd-MM-yy'});
            $("#DOB").datepicker({dateFormat: 'dd-MM-yy'});
        });
    </script>
</head>
<body class="menubar-hoverable header-fixed ">
<!-- BEGIN HEADER-->

<div id="base">
    <div id="content">
        <section>
            <div class="section-body contain-md">
                <h4 class="text-center">Register New Student </h4>
                <div class="card">
                    <div class="card-body">
                        <form  id="form"  class="form-horizontal"  method= "POST" action=""  role="form" enctype="multipart/form-data" autocomplete="off">

                            <p id="msg" class="text-danger"></p>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Surname:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="SNAME"  id="SNAME" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    First Name:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="FNAME"  id="FNAME" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Middle Name:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="MNAME"  id="MNAME" class="form-control" required >
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Date Of Birth :
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="DOB"  id="DOB" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Gender:
                                </label>
                                <div class="col-sm-2">
                                    <select name="SEX"  id="SEX" class="form-control" required>
                                        <option value=""> Choose Sex</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Country:
                                </label>
                                <div class="col-sm-2">
                                    <select name="COUNTRY"  id="COUNTRY" class="form-control" required>
                                        <option value=""> Choose Country</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    State :
                                </label>
                                <div class="col-sm-2">
                                    <select name="STATE"  id="STATE" class="form-control" required>
                                        <option value=""> Choose State</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Lga:
                                </label>
                                <div class="col-sm-2">
                                    <select name="LGA"  id="LGA" class="form-control" required>
                                        <option value=""> Choose lga</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Home Town:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="HTOWN"  id="HTOWN" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Parent/Guardian:
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Title:
                                </label>
                                <div class="col-sm-2">
                                    <select name="TITLE"  id="TITLE" class="form-control" required>
                                        <option value=""> Choose Title</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Surname:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="PSURNAME"  id="PSURNAME" class="form-control"required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label" >
                                    Other names:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="POTHERNAME"  id="PSURNAME" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Address:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="PADDRESS"  id="PADDRESS" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Town :
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="PTOWN"  id="PTOWN" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    State:
                                </label>
                                <div class="col-sm-2">
                                    <select name="PSTATE"  id="PSTATE" class="form-control" required>
                                        <option value=""> Choose state</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Phone no:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="PPHONENO"  id="PPHONENO" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Email :
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="PEMAIL"  id="PEMAIL" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Relationship:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="RELATIONSHIP"  id="RELATIONSHIP" class="form-control" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Entry Year:
                                </label>
                                <div class="col-sm-2">
                                    <input type="text" name="YOE"  id="YOE" class="form-control" required>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Term :
                                </label>
                                <div class="col-sm-2">
                                    <select name="TERM"  id="TERM" class="form-control" required>
                                        <option value=""> Choose Term</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    School:
                                </label>
                                <div class="col-sm-2">
                                    <select name="SCHOOL"  id="SCHOOL" class="form-control" required>
                                        <option value=""> Choose School</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Class:
                                </label>
                                <div class="col-sm-2">
                                    <select name="CLASS"  id="CLASS" class="form-control" required>
                                        <option value=""> Choose class</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                    Arm:
                                </label>
                                <div class="col-sm-2">
                                    <select name="Arm"  id="Arm" class="form-control" required>
                                        <option value=""> Choose Arm</option>
                                        <?php
                                        $getallstudents=$general->getallstudents();
                                        foreach($getallstudents as $allstudents){
                                            extract($allstudents);
                                            ?>
                                            <option value="<?php echo $REGNO;?>" ><?php echo $NAME;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>

                                </div>

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
<!-- END JAVASCRIPT -->
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#save').on('click', function(e){
            event.preventDefault();
            var SNAME=$.trim($("#SNAME").val());
            var MNAME=$.trim($("#MNAME").val());
            var FNAME=$.trim($("#FNAME").val());
            var DOB=$.trim($("#DOB").val());
            var GENDER=$.trim($("#GENDER"). val());
            var COUNTRY=$.trim($("#COUNTRY").val());
            var STATE=$.trim($("#STATE").val());
            var LGA=$.trim($("#LGA").val());
            var HTOWN=$.trim($("#HTOWN").val());
            var TITLE=$.trim($("#TITLE").val());
            var PSURNAME=$.trim($("#PSURNAME"). val());
            var POTHERNAME=$.trim($("#POTHERNAME").val());
            var PADDRESS=$.trim($("#PADDRESS").val());
            var PTOWN=$.trim($("#PTOWN").val());
            var PSTATE=$.trim($("#PSTATE").val());
            var PPHONENO=$.trim($("#PPHONENO").val());
            var PEMAIL=$.trim($("#PEMAIL"). val());
            var RELATIONSHIP=$.trim($("#RELATIONSHIP").val());
            var YOE=$.trim($("#YOE").val());
            var TERM=$.trim($("#TERM").val());
            var SCHOOL=$.trim($("#SCHOOL").val());
            var CLASS=$.trim($("#CLASS").val());
            var ARM=$.trim($("#GENDER"). val());
            var SEX=$.trim($("#SEX"). val());
            $.ajax({
                url:"billingcontrol.php",
                method:"POST",
                data:{SNAME:SNAME,FNAME:FNAME,MNAME:MNAME,DOB:DOB,GENDER:GENDER,COUNTRY:COUNTRY,STATE:STATE,LGA:LGA,HTOWN:HTOWN,TITLE:TITLE,PSURNAME:PSURNAME,POTHERNAME:POTHERNAME,PADDRESS:PADDRESS,PTOWN:PTOWN,PSTATE:PSTATE,PPHONENO:PPHONENO,PEMAIL:PEMAIL,YOE:YOE,TERM:TERM,SCHOOL:SCHOOL,
                    CLASS:CLASS,ARM:ARM,RELATIONSHIP:RELATIONSHIP,SEX:SEX,dataname:'insertnewstudentreg'},
                success:function(data){
                    alert(data);
                    // $('#msgcurrentcol').modal('toggle');
                    // $('#alert').html('<div class="alert alert-success">' + data + '</div>');
                    // $('#msgdetails').modal();
                }
            });
        });








    });
</script>

