<?php
include('../include/config.php');
include('../../../include/config.php');
foreach($general->regstatusforfreshandret() as $value){
    if($getsinglestudentdetails['REGSTATUS']==$value['id']){
        $regstatusforstd.="<option value='".$value['id']."' selected>".$value['name']."</option>";
    }else{
        $regstatusforstd.="<option value='".$value['id']."'>".$value['name']."</option>";
    }

}
foreach($general->residentialforfreshandret() as $value){
    if($getsinglestudentdetails['RESIDENTIAL']==$value['residentialid']){
        $residentialforstd.="<option value='".$value['residentialid']."' selected>".ucfirst($value['residentialname'])."</option>";
    }else{
        $residentialforstd.="<option value='".$value['residentialid']."'>".ucfirst($value['residentialname'])."</option>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
       <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!------ Include the above in your HEAD tag ---------->
      <style>

         .clickable{
             cursor: pointer;
         }
         .panel-heading span {
             margin-top: -20px;
             font-size: 15px;
         }
         select.form-control:not([size]):not([multiple]) {
             height: calc(3.25rem + 2px);
         }
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

         table th {
             font-size: .85em;
             letter-spacing: .1em;
             text-transform: uppercase;
         }

         @media screen and (max-width: 600px) {
             table {
                 border: 0;
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

         /* general styling */
         body {
             font-family: "Open Sans", sans-serif;
             line-height: 1.25;
         }

      </style>
     <link type="text/css" href="../assets/jquery/themes/base/ui.base.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link type="text/css" href="../assets/jquery/themes/base/ui.theme.css" rel="stylesheet" />
</head>
<body style="background-color:#e9ecef;">
      <div class="container">
         <h4 class="text-center">Register New Student</h4>
          <div class="col-md-offset-4">
             <i class="text-center fa fa-spinner fa-spin loader" style="font-size:100px;"></i>
          </div>
          <div class="row forminput" style="display: none">
              <div class="col-md-10">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Bio
                              <b class="caret"></b>
                              </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label for="label" id="labeldesign" class="col-sm-2 col-form-label">
                                        Surname:
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="SNAME"  id="SNAME" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        First Name:
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="FNAME"  id="FNAME" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                       <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Middle Name:
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="MNAME"  id="MNAME" class="form-control" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Date Of Birth:
                                    </label>
                                    <div class="col-sm-5">
                                        <input type="date" name="DOB"  id="DOB" class="form-control" required>
                                    </div>
                                     <label for="label" id="labeldesign" class="col-sm-1 col-form-label-md">
                                        Gender:
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="SEX"  id="SEX" class="form-control" required>
                                            <option value=""> Choose Sex</option>
                                            <option value="female">Female</option>
                                            <option value="male">Male</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Country:
                                    </label>
                                    <div class="col-sm-5">
                                         <select name="COUNTRY"  id="COUNTRY" class="form-control" required>
                                            <option value=""> Choose Country</option>
                                             <?php
                                             $getallcountries=$general->getallcountries();
                                             foreach($getallcountries as $allthecountries){
                                                 extract($allthecountries);
                                                 ?>
                                                 <option value="<?php echo $countrycode;?>" ><?php echo $country;?></option>
                                                 <?php
                                             }
                                             ?>
                                        </select>
                                    </div>
                                    <label for="label" id="labeldesign" class="col-sm-1 col-form-label-md">
                                    State:
                                    </label>
                                    <div class="col-sm-4">
                                         <select name="STDSTATEDROPDOWN"  id="STDSTATEDROPDOWN"  class="STDSTATE form-control" required>
                                            <option value=" "> Choose State</option>
                                        </select>
                                         <input type="text" name="STDSTATEINPUT" id="STDSTATEINPUT"  placeholder="Enter State"  class="STDSTATE form-control" required  style="display:none">
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                    Lga:
                                    </label>
                                    <div class="col-sm-10">
                                         <select name="STDLGADROPDOWN"  id="STDLGADROPDOWN" class="form-control STDLGA" required>
                                            <option value=" "></option>
                                        </select>
                                        <input type="text" name="STDLGAINPUT"  id="STDLGAINPUT" class="form-control STDLGA" required  style="display:none">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Home Town:
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="HTOWN"  id="HTOWN" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Parent/Guardian
                            <b class="caret"></b>
                          </a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">

                           <div class="form-group row">
                               <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                   Title:
                                </label>
                                <div class="col-sm-5">
                                     <select name="TITLE"  id="TITLE" class="form-control" required>
                                        <option value=""> Choose Title</option>
                                         <?php
                                         $getalltitles=$general->getalltitles();
                                         foreach($getalltitles as $alltitles){
                                             extract($alltitles);
                                             ?>
                                             <option value="<?php echo $full;?>" ><?php echo ucfirst($full);?></option>
                                             <?php
                                         }
                                         ?>
                                    </select>
                                </div>
                           </div>
                            <div class="form-group row">
                               <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                     Surname:
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="PSURNAME"  id="PSURNAME" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                      Other names:
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="POTHERNAME"  id="POTHERNAME" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Country:
                                    </label>
                                    <div class="col-sm-5">
                                         <select name="PCOUNTRY"  id="PCOUNTRY" class="form-control" required>
                                            <option value=" "> Choose Country</option>
                                             <?php
                                             $getallcountries=$general->getallcountries();
                                             foreach($getallcountries as $allthecountries){
                                                 extract($allthecountries);
                                                 ?>
                                                 <option value="<?php echo $countrycode;?>" ><?php echo $country;?></option>
                                                 <?php
                                             }
                                             ?>
                                        </select>
                                    </div>
                                    <label for="pggroup" id="labeldesign" class="col-sm-1 col-form-label-md-sm">
                                    State :
                                    </label>
                                    <div class="col-sm-4" >
                                         <select name="PSTATEDROPDOWN"  id="PSTATEDROPDOWN" class="form-control" required>
                                            <option value=""> Choose State</option>
                                        </select>
                                         <input type="text" name="PSTATEINPUT" id="PSTATEINPUT"  placeholder="Enter Parent State"  class="PSTATE form-control" required  style="display:none">
                                    </div>
                            </div>
                             <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Lga:
                                    </label>
                                    <div class="col-sm-10" >
                                         <select name="PLGADROPDOWN"  id="PLGADROPDOWN" class="form-control" required>
                                            <option value=""></option>
                                        </select>
                                        <input type="text" name="PLGAINPUT" id="PLGAINPUT"  placeholder="Enter Parent State"  class="PLGA form-control" required  style="display:none">
                                    </div>
                             </div>
                             <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Town:
                                    </label>
                                    <div class="col-sm-5">
                                        <input type="text" name="PTOWN"  id="PTOWN" class="form-control" required>
                                    </div>
                                    <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                        Address:
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="text" name="PADDRESS"  id="PADDRESS" class="form-control" required>
                                    </div>
                             </div>
                             <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                         Phone no:
                                    </label>
                                    <div class="col-sm-5">
                                        <input type="text" name="PPHONENO"  id="PPHONENO" class="form-control" required>
                                    </div>
                                    <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                         Email:
                                    </label>
                                    <div class="col-sm-4">
                                        <input type="email" name="PEMAIL"  id="PEMAIL" class="form-control" required>
                                    </div>
                             </div>
                             <div class="form-group row">
                               <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                    Relationship:
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="RELATIONSHIP"  id="RELATIONSHIP" class="form-control" required>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Student Ship
                              <b class="caret"></b>
                          </a>
                        </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                             <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-3 col-form-label-md">
                                        Entry Session:
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="SESSION"  id="SESSION" class="form-control" required>
                                          <option value="<?php echo $csessionid;?>" ><?php echo $CSESSION;?></option>
                                            <?php
                                            $allsessions=$general->allsessions();
                                            foreach($allsessions as $allthesession){
                                                extract($allthesession);

                                                ?>
                                                <option value="<?php echo $sessionid;?>" ><?php echo $session;?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="pggroup" id="labeldesign" class="col-sm-2 control-label">
                                         Term:
                                    </label>
                                    <div class="col-sm-3">
                                         <select name="TERM"  id="TERM" class="form-control" required>
                                            <option value=""> Choose Term</option>
                                             <?php
                                             $getterms=$general->getterms();
                                             foreach($getterms as $theterms){
                                                 extract($theterms);
                                                 ?>
                                                 <option value="<?php echo $termid;?>" ><?php echo $term;?></option>
                                                 <?php
                                             }
                                             ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-3 col-form-label-md">
                                        Study Level:
                                    </label>
                                    <div class="col-sm-4">
                                         <select name="studylevel"  id="studylevel" class="form-control" required>
                                            <option value=""> Choose Level</option>
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
                                    <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Class:
                                    </label>
                                    <div class="col-sm-3">
                                       <select name="thelevelclass"  id="thelevelclass" class="form-control" required>
                                            <option value=" ">Select Class</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <label for="label" id="labeldesign" class="col-sm-3 col-form-label-md">
                                        Registration Status:
                                    </label>
                                    <div class="col-sm-4">
                                        <select name="REGSTATUS"  id="REGSTATUS" class="form-control" required>
                                            <option value=" ">Select Registration Status</option>
                                            <?php echo $regstatusforstd;?>
                                        </select>
                                    </div>
                                    <label for="label" id="labeldesign" class="col-sm-2 col-form-label-md">
                                        Residential:
                                    </label>
                                    <div class="col-sm-3">
                                        <select name="RESIDENTIAL"  id="RESIDENTIAL" class="form-control" required>
                                            <option value=" ">Select Residential Status</option>
                                            <?php echo $residentialforstd;?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="col-md-offset-9 forminput" style="display: none">
                <input type="button" name="save"  id="save" value="Save">
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
<!-- END JAVASCRIPT -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(".closeform").click(function(){
        $('.card').hide();
        $('.closeform').hide();
        $('.titleofform').hide();
    });

    $('.forminput').hide();
    $(document).ready(function() {
        $('.fa-spinner').hide();
        $('.forminput').show();
        $('#thelevelclass,#studylevel,#COUNTRY,#SEX,#TERM').select2({ width: '100%'});
        $('#PCOUNTRY,#RESIDENTIAL,#TITLE,#REGSTATUS,#SESSION').select2({ width: '100%'});
        $(".stdlgaselect").hide();
        $('#save').on('click', function(e){
            event.preventDefault();
            var SNAME=$.trim($("#SNAME").val().toUpperCase());
            var MNAME=$.trim($("#MNAME").val().toUpperCase());
            var FNAME=$.trim($("#FNAME").val().toUpperCase());
            var DOB=$.trim($("#DOB").val());
            var COUNTRY=$.trim($("#COUNTRY option:selected").text());
            if(COUNTRY=='Nigeria') {
                var STATE=$.trim($("#STDSTATEDROPDOWN option:selected").text());
                var LGA=$.trim($("#STDLGADROPDOWN option:selected").text());
            }else{
                var STATE=$.trim($("#STDSTATEINPUT").val());
                var LGA=$.trim($("#STDLGAINPUT").val());
            }
            var HTOWN=$.trim($("#HTOWN").val());
            var TITLE=$.trim($("#TITLE").val());
            var PSURNAME=$.trim($("#PSURNAME"). val().toUpperCase());
            var POTHERNAME=$.trim($("#POTHERNAME").val().toUpperCase());
            var PADDRESS=$.trim($("#PADDRESS").val());
            var PTOWN=$.trim($("#PTOWN").val());
            var PPHONENO=$.trim($("#PPHONENO").val());
            var PEMAIL=$.trim($("#PEMAIL"). val());
            var RELATIONSHIP=$.trim($("#RELATIONSHIP").val());
            var YOE=$.trim($("#SESSION").val());
            var TERM=$.trim($("#TERM").val());
            var studylevel=$.trim($("#studylevel").val());
            var thelevelclass=$.trim($("#thelevelclass").val());
            var REGSTATUS=$.trim($("#REGSTATUS").val());
            var RESIDENTIAL=$.trim($("#RESIDENTIAL").val());
            var SEX=$.trim($("#SEX"). val());
            var PCOUNTRY=$.trim($("#PCOUNTRY option:selected").text());
            if(PCOUNTRY=='Nigeria') {
                var PSTATE=$.trim($("#PSTATEDROPDOWN option:selected").text());
                var PLGA=$.trim($("#PLGADROPDOWN option:selected").text());
            }else{
                var PSTATE=$.trim($("#PSTATEINPUT").val());
                var PLGA=$.trim($("#PLGAINPUT").val());
            }
            if(PEMAIL==''){
                $('#successalert').html('<div class="alert alert-danger">Email cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(REGSTATUS==''){
                $('#successalert').html('<div class="alert alert-danger">Registration status cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(RESIDENTIAL==''){
                $('#successalert').html('<div class="alert alert-danger">Residential status cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(SNAME==''){
                $('#successalert').html('<div class="alert alert-danger">Surname  cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(FNAME==''){
                $('#successalert').html('<div class="alert alert-danger">Firstname  cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(thelevelclass=='' || studylevel==''){
                $('#successalert').html('<div class="alert alert-danger">Class/Level  cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(SEX==''){
                $('#successalert').html('<div class="alert alert-danger">Sex cannot be empty!!</div>');
                $('#successdetails').modal({backdrop: "static"});
                return false;
            }
            if(SNAME!='' && FNAME!='' && thelevelclass!='' && studylevel!=''){
                $.ajax({
                    url:"studentprofilecontrol.php",
                    method:"POST",
                    data:{PCOUNTRY:PCOUNTRY,PLGA:PLGA,REGSTATUS:REGSTATUS,RESIDENTIAL:RESIDENTIAL,SNAME:SNAME,FNAME:FNAME,MNAME:MNAME,DOB:DOB,COUNTRY:COUNTRY,STATE:STATE,LGA:LGA,HTOWN:HTOWN,
                        TITLE:TITLE,PSURNAME:PSURNAME,POTHERNAME:POTHERNAME,PADDRESS:PADDRESS,
                        PTOWN:PTOWN,PSTATE:PSTATE,PPHONENO:PPHONENO,PEMAIL:PEMAIL,YOE:YOE,TERM:TERM,studylevel:studylevel,
                        thelevelclass:thelevelclass,RELATIONSHIP:RELATIONSHIP,SEX:SEX,dataname:'insertnewstudentreg'},
                    success:function(data){
                        console.log(data)
                        $('#alert').html('<div class="alert alert-success">' + data + '</div>');
                        $('#msgdetails').modal();
                    }
                });
            }else{
                alert("invalid form input")
            }
        });
        $("#COUNTRY").change(function(){
            var COUNTRY=$("#COUNTRY").val();
            if($("#COUNTRY option:selected").text()=='Nigeria') {
                $("#STDSTATEINPUT,#STDLGAINPUT").hide();
                $("#STDSTATEDROPDOWN,#STDLGADROPDOWN").show();
                $.ajax({
                    url: "studentprofilecontrol.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {COUNTRY: COUNTRY, dataname: 'getcountrystate'},
                    success: function (response) {
                        console.log(response);
                        $('#STDSTATEDROPDOWN').html(response);

                    }
                });
            }else{
                $("#STDSTATEINPUT,#STDLGAINPUT").show();
                $("#STDSTATEDROPDOWN,#STDLGADROPDOWN").hide();
            }
        });
        $("#STDSTATEDROPDOWN").change(function(){
            var STATE=$("#STDSTATEDROPDOWN").val();
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{STATE:STATE,dataname:'getcountrylga'},
                success:function(response){
                    $('#STDLGADROPDOWN').html(response);
                }
            });
        });
        $("#PCOUNTRY").change(function(){
            var COUNTRY=$("#PCOUNTRY").val();
            if($("#PCOUNTRY option:selected").text()=='Nigeria') {
                $("#PSTATEINPUT,#PLGAINPUT").hide();
                $("#PSTATEDROPDOWN,#PLGADROPDOWN").show();
                $.ajax({
                    url: "studentprofilecontrol.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {COUNTRY: COUNTRY, dataname: 'getcountrystate'},
                    success: function (response) {
                        $('#PSTATEDROPDOWN').html(response);

                    }
                });
            }else{
                $("#PSTATEINPUT,#PLGAINPUT").show();
                $("#PSTATEDROPDOWN,#PLGADROPDOWN").hide();
            }
        });

        $("#PSTATEDROPDOWN").change(function(){
            var STATE=$("#PSTATEDROPDOWN").val();
            $.ajax({
                url:"studentprofilecontrol.php",
                type:'POST',
                dataType:'text',
                data:{STATE:STATE,dataname:'getcountrylga'},
                success:function(response){
                    $('#PLGADROPDOWN').html(response);
                }
            });
        });
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
                        // alert(response);
                    }
                });
            }else{
                $('#alert').html('<div class="alert alert-danger">Form input must not be empty</div>');
                $('#msgdetails').modal();
            }

        });
        $("#exit").click(function(){
            window.location.href="addnewstudent.php";
        });
        $("#close").click(function(){
            window.location.href="addnewstudent.php";
        });

    });
</script>
</body>
</html>

