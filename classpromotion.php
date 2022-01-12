<?php
include "../include/config.php";
$maxsemdetails=$setup->getcurrentterms()->fetch(PDO::FETCH_ASSOC);
$SESSION=$maxsemdetails['currentsession'];
$sessionid=$maxsemdetails['currentsessionid'];
$TERM=$maxsemdetails['currenttermname'];
$termid=$maxsemdetails['currenttermid'];
$shortterm=$maxsemdetails['currentshortterm'];
$oldtermid=$maxsemdetails['oldtermid'];
$oldsession=$maxsemdetails['oldsession'];
$oldshortterm=$maxsemdetails['oldshortterm'];
if($oldsession==$SESSION){
    echo "<h2 class='text-center'>Invalid Previous Session Details</h2>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>STUDENT||REGISTER</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link rel="stylesheet" href="../multi2/example/css/site.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
    <link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../multi2/example/css/site.css">


    <!-- END STYLESHEETS -->
    <style>
         @media (min-width: 769px) {
             #labeldesign {
                 width: 8%;
                 margin-left: 1px;
                 float: left;
                 text-align: left;
                 font-weight: bold;
                 font-size: 12px;
                 color: #000;
                 opacity: 1;
             }
             #labeldesign2{
                 width: 25%;
                 margin-left:90px;
                 float: left;
                 text-align: left;
                 font-weight: bold;
                 font-size: 14px;
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
                 font-size: 12px;
                 color: #000;
                 opacity: 1;
             }
             #labeldesign2{
                 width: 100%;
                 margin-left:90px;
                 float: left;
                 text-align: left;
                 font-weight: bold;
                 font-size: 14px;
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
        .form-control{
            font-size: 13px;
            opacity: 3;
            color: #000;
            height:20px;

        }

        label{
            font-weight: bold;
            font-size: 14px;
            color: #000;
        }
        .btn{
            padding:1px 1px;
            margin-top:0px;
            margin-left:6px;
            border: none;
            cursor: pointer;
            border-radius:5px;
            text-align: center;
            height:24px;

        }
         h3,h4,h5,h6,h1,h2{
            margin-top:0px;
            margin-bottom:0px;
        }

        


    </style>

</head>
<body>

<div id="base">
    <div id="content">
        <section>
            <div class="section-body contain-md">
                <h4 class="text-center" style="margin-right:20%">Generate Class Register</h4>
                <div class="card">
                    <div class="card-body" >
                        <form  id="form"  class="form-horizontal"  method= "POST" action=""  role="form"     enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign2" class="col-sm-1 control-label">
                                    Old Session/Term: <?php echo $oldsession . '  ' . $oldshortterm . " TERM "?>
                                </label>
                                
                                <label for="pggroup" id="labeldesign2" class="col-sm-1 control-label">
                                    New Session/Term: <?php echo $SESSION . '  ' . $shortterm . " TERM "?>
                                </label>
                                
                            </div>
                            <div class="form-group">
                                <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                    Old Class:
                                </label>
                                <div class="col-sm-3">
                                    <select name="theoldclass"  id="theoldclass" class="form-control" required>
                                        <option value="">Choose class </option>
                                        <?php
                                        $allclasses=$general->allclasses();
                                        foreach($allclasses as $theclasses){
                                            extract($theclasses);
                                            ?>
                                            <option value="<?php echo $class;?>" ><?php echo $class;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for="pggroup" id="labeldesign" class="col-sm-1 control-label">
                                    New Class:
                                </label>
                                <div class="col-sm-3">
                                    <select name="thenewclass"  id="thenewclass" class="form-control" required>
                                        <option value="">Select Class</option>
                                        <?php
                                        $allclasses=$general->allclasses();
                                        foreach($allclasses as $theclasses){
                                            extract($theclasses);
                                            ?>
                                            <option value="<?php echo $class;?>" ><?php echo $class;?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input type="button" name="view"  id="view" value="View List">
                                </div>
                            </div>
                            <i class="fa fa-spinner fa-spin loader" style="font-size:44px;margin-left:35%;display:none"></i>
                            <div class="row style-select">
                                <label for="nmlist" id="labeldesign" class="col-sm-2"></label>
                                <div class="col-md-8">
                                    <div class="subject-info-box-1">
                                        <label>Old Students</label>
                                        <select multiple  style="width:100%" id="lstBox1">
                                        </select>
                                    </div>
                                    <div class="subject-info-arrows text-center">
                                        <br /><br />
                                        <input title="Send All!" type='button' id='btnAllRight' value='>>' class="btn btn-default" /><br />
                                        <input  title="Send Selected!" type='button' id='btnRight' value='>' class="btn btn-default" /><br />
                                        <input title="Return Selected!" type='button' id='btnLeft' value='<' class="btn btn-default" /><br />
                                        <input title="Return All!" type='button' id='btnAllLeft' value='<<' class="btn btn-default" />
                                    </div>
                                    <div class="subject-info-box-2 lectclass" >
                                        <label>New Students</label>
                                        <select multiple style="width:100%" id="lstBox2" name="lstBox2[]" class="lstBox2">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-8">
                                    <input type="button" name="save"  id="save" value="save">
                                </div>
                            </div>
                            <div id="result"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="modal fade" id="successdetails" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    <div class="modal fade" id="msgdetails" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content" role="document">
                <div class="modal-header">
                    <button type="button" id="msgclose" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center" id="myModalLabel">Message</h4>
                </div>
                <div class="modal-body">
                    <p id="msgalert"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" id="msgexit" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN JAVASCRIPT -->
    <script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
    <script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/js/libs/spin.js/spin.min.js"></script>
    <script src="../multi2/example/js/jquery.selectlistactions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- END JAVASCRIPT -->
    <script type="text/javascript">
        $('#theoldclass').select2();
        $('#thenewclass').select2();
        $('#btnRight').click(function (e) {
            $('select').moveToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
        });
        $('#btnAllRight').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox1', '#lstBox2');
            e.preventDefault();
        });
        $('#btnLeft').click(function (e) {
            $('select').moveToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
        });
        $('#btnAllLeft').click(function (e) {
            $('select').moveAllToListAndDelete('#lstBox2', '#lstBox1');
            e.preventDefault();
        });
        $(document).on('click', '#view', function(){
            var thenewstdclass =$('#thenewclass').val();
            var theoldstdclass =$('#theoldclass').val();
            //alert(thestdclass);
            if(thenewstdclass !=='' && theoldstdclass!==''){
                $('.loader').show();
                $.ajax({
                    url:"studentprofilecontrol.php",
                    type:'POST',
                    dataType:'JSON',
                    data:{
                        thenewstdclass:thenewstdclass,
                        theoldstdclass:theoldstdclass,
                        dataname:'viewstdinaclass'
                    },
                    success:function(stddata){
                        console.log(stddata)
                        if(stddata.existing==1){
                            $('#successalert').html('<div class="alert alert-danger">Student already exist in the selected class for this session</div>');
                            $('#successdetails').modal();
                            //alert('Student aLready exist in the selected class for this session')
                            $('.loader').hide();
                            return false;
                        }
                        $('#lstBox1').html(stddata.oldstudents);
                        $('#lstBox2').html(stddata.newstudents);
                        $('.loader').hide();
                    }
                });
            }else{
                alert("Invalid form input")
            }

        });
        $(document).on('click', '#save', function(){
            //var kos =$('#kos').val();
            //var kosmodule=$('#kosmodule').val();
            var thestdclass =$('#thenewclass').val();
            if(thestdclass ==''){
                alert("No selected class");
                return;
            }
            var studentobjarray=new Array();
            $("#lstBox2 > option").each(function() {
                var studentobj={};
                if($(this).val()!=''){
                    studentobj.col1=$.trim($(this).val());
                    studentobj.col2=$.trim($(this).text());
                    studentobjarray.push(studentobj);
                    //alert($.trim($(this).val()));
                }
            });
            
            var thestudentobjarray=JSON.stringify(studentobjarray);
            if(studentobjarray.length > 0){
                $('.loader').show();
                $.ajax({
                    url:"studentprofilecontrol.php",
                    type:'POST',
                    dataType:'text',
                    data:{
                        thestdclass:thestdclass,
                        thestudentobjarray:thestudentobjarray,
                        dataname:'savestdetails'
                    },
                    success:function(response){
                        $('#msgalert').html('<div class="alert alert-danger">' + $.trim(response) + '</div>');
                        $('#msgdetails').modal();
                        /*alert($.trim(response));*/
                        $('.loader').hide();
                        //window.location.href="classpromotion.php"
                    }
                });
            }else{
                alert("Invalid form input")
            }
        });
        $('#msgclose,#msgexit').on("click", function () {
            setTimeout(function () {
                location.href = "classpromotion.php", 60000
            });
        });

    </script>
</body>
</html>


