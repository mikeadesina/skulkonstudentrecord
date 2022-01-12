<?php
include "../include/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>EDIT||PROFILE</title>

    <!-- BEGIN META -->

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
       @media (min-width: 769px) {
           #classlabeldesign {
               width: 14%;
               margin-left: 1px;
               float: left;
               text-align: left;
               font-weight: bold;
               font-size: 11px;
               color: #000;
               opacity: 1;
           }
           #labeldesign {
               width: 6%;
               margin-left: 1px;
               float: left;
               text-align: left;
               font-weight: bold;
               font-size: 11px;
               color: #000;
               opacity: 1;
           }
           #contactlabel {
               width: 18%;
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
           #classlabeldesign {
               width: 100%;
               margin-left: 1px;
               float: left;
               text-align: left;
               font-weight: bold;
               font-size: 11px;
               color: #000;
               opacity: 1;
           }
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

           #contactlabel {
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
               /*
               * aria-label has no advantage, it won't be read inside a table
               content: attr(aria-label);
               */
               content: attr(data-label);
               float: left;
               font-weight: bold;
               text-transform: uppercase;
           }

           table td:last-child {
               border-bottom: 0;
           }
       }


       .form-control,h3{
           font-size: 13px;
           opacity: 3;
           color: #000;

       }

       #allbiodata,#allstudentstatus,#allcontact,#allnextofkin,#allupload{
           display:none;
       }
       .selectedsidemenu{
           background-color: #04AA6D;
       }
       .closeform {
           cursor: pointer;

       }
       h3,h4,h5,h6,h1,h2{
           margin-top:0px;
           margin-bottom:0px;
       }

       #base{
           padding-left:0px;
       }

       body {
           margin: 0;
           font-family: "Lato", sans-serif;
       }
       .sidebar {
           margin: 0;
           padding: 0;
           width: 200px;
           background-color: #f1f1f1;
           position: fixed;
           max-height: 500px;
           overflow: auto;
       }

       .sidebar a {
           display: block;
           color: black;
           padding: 16px;
           text-decoration: none;
       }

       .sidebar a.active {
           background-color: #04AA6D;
           color: white;
       }

       .sidebar a:hover:not(.active) {
           background-color: #555;
           color: white;
       }

       div.content {
           margin-left: 200px;
           padding: 1px 16px;
           height: 1000px;
       }

       @media screen and (max-width: 700px) {
           .sidebar {
               width: 100%;
               height: auto;
               position: relative;
           }
           .sidebar a {float: left;}
           div.content {margin-left: 0;}
       }

       @media screen and (max-width: 400px) {
           .sidebar a {
               text-align: center;
               float: none;
           }
       }
       select {
           -webkit-appearance: none;
           -moz-appearance: none;
           text-indent: 1px;
           text-overflow: '';
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
    </style>
    <link type="text/css" href="../assets/jquery/themes/base/ui.base.css" rel="stylesheet" />
    <link type="text/css" href="../assets/jquery/themes/base/ui.theme.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script  src="../assets/jquery/jquery.js" ></script>
    <script  src="../assets/js/jquery.form.min.js"></script>
    <script  src="../assets/jquery/ui/ui.core.js"></script>
    <script  src="../assets/jquery/ui/ui.datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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

<div id="base" >
    <div id="content">
        <section>
            <div class="section-body contain-md">
                <h4 class="text-center titleofform">View Student Profile</h4>
                <h3 style="margin-left:100%"><span class="text-left closeform"><i class="fa fa-window-close" aria-hidden="true"></i></span></h3>
                <div class="card">
                    <div class="card-body" style="max-height: 500px;overflow-y: scroll;">
                        <form  id="form"  class="form-horizontal"  method= "POST" action=""  role="form" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                    <label for="nmlist" id="labeldesign" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-5">
                                       <select name="addno"  id="addno" class="form-control" required>
                                            <option value="">Select Student </option>
                                           <?php
                                           $getallstudentsinalevel=$setup->getallstudentsinalevel();
                                           foreach($getallstudentsinalevel as $allstudents){
                                               extract($allstudents);
                                               ?>
                                               <option value="<?php echo $ADDNO;?>" ><?php echo $allstudents["SURNAME"].'   ' . $allstudents["FIRSTNAME"].'   ' . $allstudents["OTHERNAME"];?></option>
                                               <?php
                                           }
                                           ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2" style="margin-left:0px;" >
                                        <button type="button" name="save"  id="save" onclick="Search()">Search</button>
                                    </div>
                                </div>
                            <div class="sidebar">
                              <a  class="mynav" href="#home" id="biodata" onclick="BioData()">Biodata</a>
                              <a class="mynav" href="#about" id="studentship" onclick="StudentShip()">Studentship</a>
                              <a class="mynav" href="#contact" id="contact" onclick="Contact()">Contact</a>
                              <a class="mynav" href="#finance" id="finance" onclick="Finance()">Finance</a>
                              <a class="mynav" href="#upload" id="upload" onclick="Upload()">Uploads</a>
                            </div>
                            <div class="content">
                                <div id="allbiodata" ></div>
                                <div id="allstudentstatus"></div>
                                <div id="allcontact"></div>
                                <div id="allnextofkin"></div>
                                <div id="allupload"></div>
                                <div id="allfinance"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="modal fade" id="msgdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" role="document">
            <div class="col-sm-12" id="theresponse">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="theexit" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="successdetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" role="document">
            <div class="modal-header">
                <button type="button" id="successclose" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" id="myModalLabel">Finance</h4>
            </div>
            <div class="modal-body">
                <p id="successalert"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="successexit" data-dismiss="modal">Ok</button>
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
    $('#addno,#COUNTRY').select2();
    $(".closeform").click(function(){
        $('body').hide();
    });
    $("#allbiodata,#allstudentstatus,#allcontact,#allnextofkin,#allupload,#allfinance").hide();
    const AllFinance= () => {
        var addno=$.trim($("#addno").val());
        var stdtermid = $('.stdfinance').attr("id");
        $.ajax({
            url:"studentprofilecontrol.php",
            type:'POST',
            dataType:'text',
            data:{addno:addno,stdtermid:stdtermid,dataname:'getstudentactbalance'},
            success:function(response){
                $('#successalert').html(response);
                $('#successdetails').modal();
            }
        });
    }
    const Finance= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $("#finance").addClass("selectedsidemenu");
        $("#allfinance").slideToggle();
        $("#allstudentstatus,#allcontact,#allnextofkin,#allupload,#allbiodata").hide();
    }
    const BioData= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $("#biodata").addClass("selectedsidemenu");
        $("#allbiodata").slideToggle();
        $("#allstudentstatus,#allcontact,#allnextofkin,#allupload,#allfinance").hide();
    }
    const StudentShip= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $("#studentship").addClass("selectedsidemenu");
        $("#allstudentstatus").slideToggle();
        $("#allbiodata,#allcontact,#allnextofkin,#allupload,#allfinance").hide();
    }
    const Contact= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $("#contact").addClass("selectedsidemenu");
        $("#allcontact").slideToggle();
        $("#allbiodata,#allstudentstatus,#allnextofkin,#allupload,#allfinance").hide();
    }
    const Nok= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $("#nok").addClass("selectedsidemenu");
        $("#allnextofkin").slideToggle();
        $("#allstudentstatus,#allcontact,#allbiodata,#allupload,#allfinance").hide();
    }
    const Upload= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $("#upload").addClass("selectedsidemenu");
        $("#allupload").slideToggle();
        $("#allstudentstatus,#allcontact,#allbiodata,#allnextofkin,#allfinance").hide();
    }
    const Search= () => {
        var addno=$.trim($("#addno").val());
        //alert(addno);
        $.ajax({
            url:"studentprofilecontrol.php",
            type:'POST',
            dataType:'JSON',
            data:{addno:addno,dataname:'geteditprofile'},
            success:function(studentprofile){
                $(".mynav").removeClass("selectedsidemenu");
                $("#biodata").addClass("selectedsidemenu");
                $("#allupload").html(studentprofile.stdupload);
                $("#allbiodata").html(studentprofile.stdbio);
                $("#allcontact").html(studentprofile.stdcontact);
                $("#allstudentstatus").html(studentprofile.studentstatus);
                $("#allfinance").html(studentprofile.finance);
                $("#allstudentstatus,#allcontact,#allnextofkin,#allupload,#file,#blah,#allfinance").hide();
                $("input,#COUNTRY,#STATE,#LGA,#PSTATE,#REGSTATUS,#RESIDENTIAL,#STUDSTATUS,#LEVEL,#CLASS").attr('disabled','disabled');
                $("#allbiodata").show();
            }
        });
    }
</script>

