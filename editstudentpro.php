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
           #classlabeldesign{
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
       }


        .form-control,h3{
            font-size: 13px;
            opacity: 3;
            color: #000;

        }


        /*ul#nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            border: 0px solid #e7e7e7;
            background-color: #f3f3f3;

        }

        li#thenav {
            float: left;

        }

        li#thenav a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 10px;
            text-decoration: none;
            font-weight: bold;


        }

        

        li#thenav a.active {
            color: white;
            background-color: #4CAF50;
        }*/
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
                <h4 class="text-center titleofform">Edit Student Record</h4>
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
                                        <input type="button" name="save"  id="save" value="Search" onclick="Search()">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="button" name="saveupload"  id="saveupload" value="Save Update" onclick="SaveNewEdit()">
                                    </div>
                                </div>
                            <div class="sidebar">
                              <a  class="mynav" href="#home" id="biodata" onclick="BioData()">Biodata</a>
                              <a class="mynav" href="#about" id="studentship" onclick="StudentShip()">Studentship</a>
                              <a class="mynav" href="#contact" id="contact" onclick="Contact()">Contact</a>
                              <a class="mynav" href="#upload" id="upload" onclick="Upload()">Uploads</a>
                              <!--<a class="mynav" href="#about" id="nok" onclick="Nok()">Next of Kin</a>
                              <a class="mynav" href="#upload" id="upload" onclick="Upload()">Uploads</a>-->
                            </div>
                            <div class="content">
                                <div id="allbiodata" ></div>
                                <div id="allstudentstatus"></div>
                                <div id="allcontact"></div>
                                <div id="allnextofkin"></div>
                                <div id="allupload"></div>
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
    $("#allbiodata,#allstudentstatus,#allcontact,#allnextofkin,#allupload").hide();
    const BioData= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $('#biodata').addClass("selectedsidemenu");
        $("#allbiodata").slideToggle();
        $("#allstudentstatus,#allcontact,#allnextofkin,#allupload").hide();

    }
    const StudentShip= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $('#studentship').addClass("selectedsidemenu");
        $("#allstudentstatus").slideToggle();
        $("#allbiodata,#allcontact,#allnextofkin,#allupload").hide();
    }
    const Contact= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $('#contact').addClass("selectedsidemenu");
        $("#allcontact").slideToggle();
        $("#allbiodata,#allstudentstatus,#allnextofkin,#allupload").hide();
    }
    const Nok= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $('#nok').addClass("selectedsidemenu");
        $("#allnextofkin").slideToggle();
        $("#allstudentstatus,#allcontact,#allbiodata,#allupload").hide();
    }
    const Upload= () => {
        $(".mynav").removeClass("selectedsidemenu");
        $('#upload').addClass("selectedsidemenu");
        $("#allupload").slideToggle();
        $("#allstudentstatus,#allcontact,#allbiodata,#allnextofkin").hide();
    }
    const Pcountrychange =() => {
        var COUNTRY=$("#PCOUNTRY").val();
        if($("#PCOUNTRY option:selected").text()!=='Nigeria'){
            $("#PSTATE,#PLGA").empty();
            //$("#STATE,#LGA").attr('disabled','disabled');
        }else{
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{COUNTRY:COUNTRY,dataname:'getcountrystate'},
                success:function(studentprofile){
                    /*$("#allupload").html(studentprofile.stdupload);*/
                    $("#PSTATE").html(studentprofile);
                    /*$("#allcontact").html(studentprofile.stdcontact);
                    $("#allstudentstatus").html(studentprofile.studentstatus);*/
                }
            });
        }
    }
    const PStateChange= () => {
        var state=$("#PSTATE").val();
        if(state!==''){
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{state:state,dataname:'getthestatelga'},
                success:function(response){
                    $("#PLGA").html(response);
                }
            });
        }
    }
    const CountryChange= () => {
        var COUNTRY=$("#COUNTRY").val();
        if($("#COUNTRY option:selected").text()!=='Nigeria'){
            $("#STATE,#LGA").empty();
            $("#STATE,#LGA").attr('disabled','disabled');
        }else{
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{COUNTRY:COUNTRY,dataname:'getcountrystate'},
                success:function(studentprofile){
                    /*$("#allupload").html(studentprofile.stdupload);*/
                    $("#STATE").html(studentprofile);
                    /*$("#allcontact").html(studentprofile.stdcontact);
                    $("#allstudentstatus").html(studentprofile.studentstatus);*/
                }
            });
        }
    }
    const StateChange= () => {
        var state=$("#STATE").val();
        if(state!==''){
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{state:state,dataname:'getthestatelga'},
                success:function(response){
                   $("#LGA").html(response);
            }
           });
        }
    }
    const LevelChange= () => {
        var studylevel=$("#LEVEL").val();
        if(studylevel!==''){
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{studylevel:studylevel,dataname:'getallclassbylevel'},
                success:function(response){
                   $("#CLASS").html(response);
            }
           });
        }
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
                $("#allstudentstatus,#allcontact,#allnextofkin,#allupload").hide();
                $("#allbiodata").show();
                
            }
        });
    }
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
            return false;
        }else{
            return true;
        }
    }
    const SaveNewEdit= () => {
        var form_data = new FormData();
        var addno=$.trim($("#addno").val());
        var SURNAME=$.trim($("#SURNAME").val());
        var FIRSTNAME=$.trim($("#FIRSTNAME").val());
        var OTHERNAME=$.trim($("#OTHERNAME").val());
        var SEX=$.trim($("#SEX").val());
        var DOB=$.trim($("#DOB").val());
        var COUNTRY=$("#COUNTRY option:selected").text()
        var STATE=$("#STATE option:selected").text()
        var LGA=$("#LGA option:selected").text()
        var HTOWN=$.trim($("#HTOWN").val());
        var PSURNAME=$.trim($("#PSURNAME").val());
        var POTHERNAME=$.trim($("#POTHERNAME").val());
        var PADDRESS=$.trim($("#PADDRESS").val());
        var PTOWN=$.trim($("#PTOWN").val());
        var PEMAIL=$.trim($("#PEMAIL").val());
        var PSTATE=$("#PSTATE option:selected").text()
        var RELATIONSHIP=$.trim($("#RELATIONSHIP").val());
        var PPHONENO=$.trim($("#PPHONENO").val());
        var LEVEL=$.trim($("#LEVEL").val());
        var CLASS=$.trim($("#CLASS").val());
        var REGSTATUS=$.trim($("#REGSTATUS").val());
        var RESIDENTIAL=$.trim($("#RESIDENTIAL").val());
        var STUDSTATUS=$.trim($("#STUDSTATUS").val());
        var PCOUNTRY=$.trim($("#PCOUNTRY").val());
        var PLGA=$.trim($("#PLGA").val());
        var PTITLE=$.trim($("#PTITLE").val());
        var file_data = $('#file').prop('files')[0];
        if(REGSTATUS==''){
            $('#successalert').html('<div class="alert alert-danger">Registration status cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(STUDSTATUS==''){
            $('#successalert').html('<div class="alert alert-danger">Studentship status cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(RESIDENTIAL==''){
            $('#successalert').html('<div class="alert alert-danger">Residential status cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(SURNAME==''){
            $('#successalert').html('<div class="alert alert-danger">Surname  cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(FIRSTNAME==''){
            $('#successalert').html('<div class="alert alert-danger">Firstname  cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(CLASS=='' || LEVEL==''){
            $('#successalert').html('<div class="alert alert-danger">Class/Level  cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(SEX==''){
            $('#successalert').html('<div class="alert alert-danger">Sex cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        if(DOB=='' || DOB=='1970-01-01'){
            $('#successalert').html('<div class="alert alert-danger">Date of birth cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }
        console.log(file_data);
        var fileExtension = ['jpg','jpeg','png',];
        $('#saveupload').attr('disabled','disabled');
        /*if ($('#file')[0].files.length === 0) {
            $('#successalert').html('<div class="alert alert-danger">Evidence to upload cannot be empty!!</div>');
            $('#successdetails').modal({backdrop: "static"});
            return false;
        }*/
        if(file_data!=undefined){
            if ($.inArray(file_data.name.split('.').pop().toLowerCase(), fileExtension) == -1) {
                $('#successalert').html('<div class="alert alert-danger">' + fileExtension.join(', ') +  '  is the only format allowed</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if (file_data.size > 20000000) {
                $('#successalert').html('<div class="alert alert-danger">Please upload file less than 20MB. Thanks!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
        }

        form_data.append('PTITLE', PTITLE);
        form_data.append('PCOUNTRY', PCOUNTRY);
        form_data.append('PLGA', PLGA);
        form_data.append('DOB', DOB);
        form_data.append('PADDRESS', PADDRESS);
        form_data.append('file', file_data);
        form_data.append('STUDSTATUS', STUDSTATUS);
        form_data.append('RESIDENTIAL', RESIDENTIAL);
        form_data.append('REGSTATUS', REGSTATUS);
        form_data.append('addno', addno);
        form_data.append('SURNAME', SURNAME);
        form_data.append('FIRSTNAME', FIRSTNAME);
        form_data.append('OTHERNAME', OTHERNAME);
        form_data.append('SEX', SEX);
        form_data.append('COUNTRY', COUNTRY);
        form_data.append('STATE', STATE);
        form_data.append('LGA', LGA);
        form_data.append('HTOWN', HTOWN);
        form_data.append('PSURNAME', PSURNAME);
        form_data.append('POTHERNAME', POTHERNAME);
        form_data.append('PTOWN', PTOWN);
        form_data.append('PEMAIL', PEMAIL);
        form_data.append('PSTATE', PSTATE);
        form_data.append('RELATIONSHIP', RELATIONSHIP);
        form_data.append('PPHONENO', PPHONENO);
        form_data.append('LEVEL', LEVEL);
        form_data.append('CLASS', CLASS);
        form_data.append('dataname', 'updatestddetails');
        $.ajax({
            url:"studentprofilecontrol.php",
            type:'POST',
            dataType:'text',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            /*data:{file_data:file_data,STUDSTATUS:STUDSTATUS,RESIDENTIAL:RESIDENTIAL,
            REGSTATUS:REGSTATUS,addno:addno,
                SURNAME:SURNAME,FIRSTNAME:FIRSTNAME,
                OTHERNAME:OTHERNAME,SEX:SEX,DOB:DOB,
            COUNTRY:COUNTRY,STATE:STATE,LGA:LGA,HTOWN:HTOWN,PSURNAME:PSURNAME,
            POTHERNAME:POTHERNAME,PADDRESS:PADDRESS,PTOWN:PTOWN,PEMAIL:PEMAIL,PSTATE:PSTATE,
            RELATIONSHIP:RELATIONSHIP,PPHONENO:PPHONENO,
            LEVEL:LEVEL,CLASS:CLASS,dataname:'updatestddetails'},*/
            success:function(response){
                $('#successalert').html('<div class="alert alert-success">' + $.trim(response) + '</div>');
                $('#successdetails').modal({backdrop: "static"});
            }
        });
    }
    $('#successclose,#successexit').on("click", function () {
        setTimeout(function () {
            location.href = "editstudentpro.php", 60000
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result) .width(150).height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

