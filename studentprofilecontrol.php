<?php
session_start();
include('../../../include/config.php');
include('../include/config.php');
extract($_POST);
//$maxsessiondetails=$setup->maxsessiondetails()->fetch(PDO::FETCH_ASSOC);
$maxsemdetails=$setup->getcurrentterms()->fetch(PDO::FETCH_ASSOC);
$SESSION=$maxsemdetails['currentsession'];
$sessionid=$maxsemdetails['currentsessionid'];
$TERM=$maxsemdetails['currenttermname'];
$termid=$maxsemdetails['currenttermid'];
$shortterm=$maxsemdetails['currentshortterm'];
$oldtermid=$maxsemdetails['oldtermid'];
$oldsession=$maxsemdetails['oldsession'];
$STAFFID=implode(',', array_map(function($el){ return $el['idno']; }, get_user($_SESSION['loginid']))); 
$PDATE=(new \DateTime())->format('Y-m-d H:i:s');
$appid = $_SESSION['appid'];
$menuid = $_SESSION['menuid'];
if($dataname=='savestdetails'){
    $getclass=$setup->allclassesbyclassid($thestdclass)->fetch(PDO::FETCH_ASSOC);
    $levelclass=$getclass['studylevel'];
    $allthestudentobjarray = json_decode($thestudentobjarray, true);
    //print_r($allthestudentobjarray);
    foreach($allthestudentobjarray as $thestdeachrec){
        $addno=$thestdeachrec['col1'];
        $getstddetails=$setup->getsinglestudentdetailsinregmaster($thestdeachrec['col1'])->fetch(PDO::FETCH_ASSOC);
        $sname=$getstddetails["SURNAME"];
        $fname=$getstddetails["FIRSTNAME"];
        $mname=$getstddetails["OTHERNAME"];
        $REGSTATUS=$getstddetails["REGSTATUS"];
        $RESIDENTIAL=$getstddetails["RESIDENTIAL"];
        $sex=$getstddetails["SEX"];
        $DOB=$getstddetails["DOB"];
        $STUDENTSHIPSTATUS=$getstddetails["STUDENTSHIPSTATUS"];
       /* $sql4 = "SELECT  *  FROM  register_classes WHERE ADDNO='$addno'";
        $stmt4 = $con->prepare($sql4);
        $stmt4->execute();*/
        $rdcount=count($general->getsinglestudentdetails($addno)->fetchAll());
        if($rdcount==0){
            /*$sql3 = "INSERT INTO register_classes(SESSION,TERM,TERMID,SURNAME,FIRSTNAME,OTHERNAME,LEVEL,CLASS,STUDENTSHIPSTATUS,REGSTATUS,RESIDENTIAL,SEX,DOB,STAFFID,ADDNO,ENTRYDATE)
            values ('$SESSION','$shortterm','$termid','$sname','$fname','$mname','$levelclass','$thestdclass','$STUDENTSHIPSTATUS','$REGSTATUS','$RESIDENTIAL','$SEX','$DOB','$STAFFID','$addno','$PDATE')";
            $stmt3 = $con->prepare($sql3);*/
            $result = $general->insertnewstudent($SESSION,$shortterm,$termid,$sname,$fname,$mname,$levelclass,$thestdclass,$STUDENTSHIPSTATUS,$REGSTATUS,$RESIDENTIAL,$SEX,$DOB,$STAFFID,$addno,$PDATE);
        }else{
            $result='';
        }
    }
    if(isset($result)){
        echo "succesfully saved";
    }else{
       echo "not saved"; 
    }
    $userid=$STAFFID;
    $comment = "$thestdclass setup for termid:- $termid";
    $appid = $_SESSION['appid'];
    $submenuid = $_SESSION['submenuid'];
    logguser($userid,$comment, $appid, $submenuid);
    
}
if($dataname=='getstdbylevel'){
    $allclassesbylevel=$setup->allclassesbyclasses($thestdclass)->fetchall(PDO::FETCH_ASSOC);
    $theclasslevel;
    foreach ($allclassesbylevel as $thevalue) {
        $theclasslevel.='<option value='.$thevalue["ADDNO"].'>'.$thevalue["SURNAME"].'   ' . $thevalue["FIRSTNAME"].'   ' . $thevalue["OTHERNAME"].'</option>';
    }
    echo $theclasslevel;
    

}
if($dataname=='viewstdinaclass'){
    $allclassesbyclassesbymaster=$setup->allclassesbyclassesbymaster($theoldstdclass,$oldsession)->fetchall(PDO::FETCH_ASSOC);
    $theclasslevel;
    foreach ($allclassesbyclassesbymaster as $thevalue) {
        $theclasslevel.='<option value='.$thevalue["ADDNO"].'>'.$thevalue["SURNAME"].'   ' . $thevalue["FIRSTNAME"].'   ' . $thevalue["OTHERNAME"].'</option>';
    }
    $stddata['oldstudents']=$theclasslevel;
    if(count($setup->allclassesbyclassesandstatus($thenewstdclass)->fetchall(PDO::FETCH_ASSOC)) > 0) {
        $stddata['existing']=1;
    }else{
        $stddata['existing']=0;
    }
    $allclassesbyclasses=$setup->allclassesbyclasses($thenewstdclass)->fetchall(PDO::FETCH_ASSOC);
    $thenewclasslevel;
    if(count($allclassesbyclasses) > 0){
        foreach ($allclassesbyclasses as $thevalue) {
            $thenewclasslevel.='<option value='.$thevalue["ADDNO"].'>'.$thevalue["SURNAME"].'   ' . $thevalue["FIRSTNAME"].'   ' . $thevalue["OTHERNAME"].'</option>';
        }
      $stddata['newstudents']=$thenewclasslevel;
    }
    echo json_encode($stddata);
}
if($dataname=='getstddetails'){
    $getsinglestudentdetails=$setup->getsinglestudentdetails($addno)->fetch(PDO::FETCH_ASSOC);
    $stddata['name']=$getsinglestudentdetails['SURNAME'].' '.$getsinglestudentdetails['FIRSTNAME'].' '.  $getsinglestudentdetails['OTHERNAME'];
    $stddata['class']=$getsinglestudentdetails['CLASS'];
    $stddata['ADDNO']=$getsinglestudentdetails['ADDNO'];
    $stddata['level']=$getsinglestudentdetails['LEVEL'];
    $stddata['status']=$getsinglestudentdetails['STUDENTSHIPSTATUS'];
    $thelevelclass=$getsinglestudentdetails['CLASS'];
    $progapp='<table id="schoolfeereport" style="width:90%;">';
    $progapp.='<tr>';
    $progapp.='<th class="text-center"width="30px">Sn</th>';
    $progapp.='<th class="text-center"width="30px">B/F</th>';
    $progapp.='<th class="text-center"width="30px">Charges</th>';
    $progapp.='<th class="text-center"width="30px">Payment</th>';
    $progapp.='<th class="text-center"width="30px">Refunds</th>';
    $progapp.='<th class="text-center"width="30px">Balance</th>';
    $progapp.='</tr>';
    $prevcharge=$setup->stdprevbal($termid,$addno);
    $stdcurrrentbal=$setup->stdcurrentbal($termid,$addno)->fetch(PDO::FETCH_ASSOC);
    $amtcharged=$stdcurrrentbal['amtcharged'];
    $amtpaid=$stdcurrrentbal['amtpaid'];
    $sumrefundamt=$setup->sumrefundamt($addno,$shortterm,$SESSION);
    $balances= $prevcharge + $amtcharged-$amtpaid+$sumrefundamt;
    $progapp.='<tr>';
    $progapp.="<td class='text-center'>" . '1'. "</td>";
    $progapp.="<td style='text-align:right;'>" .number_format($prevcharge). "</td>";
    $progapp.="<td style='text-align:right;'>" . number_format($amtcharged). "</td>";
    $progapp.="<td style='text-align:right;'>" . number_format($amtpaid). "</td>";
    $progapp.="<td style='text-align:right;'>" . number_format($sumrefundamt). "</td>";
    $progapp.="<td style='text-align:right;'>" . number_format($balances). "</td>";
    $progapp.='</tr>';
    $progapp.='</table>';
    $stddata['scheduleofbal']=$progapp;
    echo json_encode($stddata);
    exit();

}
if($dataname=='getallclassbylevel'){
    $allclassesbylevel=$setup->allclassesbylevel($studylevel)->fetchall(PDO::FETCH_ASSOC);
    $theclasslevel='<option>Select Class</option>';
    foreach ($allclassesbylevel as $value) {
        $theclasslevel.='<option value='.$value["class"].'>'.$value["class"].'</option>';
    }
    echo $theclasslevel;
}
if($dataname=='getallstddetails'){
    $setup->allstudentinaclass($studylevel,$thelevelclass);
}
if($dataname=='insertnewstudentreg'){
    $DATECREATED=(new \DateTime())->format('Y-m-d H:i:s');
    $NEWYOE=date("Y-m-d",strtotime($YOE));
    $newdob=date("Y-m-d",strtotime($DOB));
    $setup->addnewstudent($SNAME,$FNAME,$MNAME,$thelevelclass,$studylevel,$newdob,$SEX,$COUNTRY,$STATE,$LGA,$HTOWN,
      $PSURNAME,$POTHERNAME,$PPHONENO,$PADDRESS,$PTOWN,$PEMAIL,$PSTATE,$RELATIONSHIP,$YOE,$TERM,$termid,
      $DATECREATED,$REGSTATUS,$RESIDENTIAL,$STAFFID,$TITLE,$PCOUNTRY,$PLGA);
    exit();
}
if($dataname=='getcountrystate'){
    $getallstatebycountry=$setup->getallstatebycountry($COUNTRY)->fetchall(PDO::FETCH_ASSOC);
    if(count($getallstatebycountry) > 0){
        $thestateresult='<option value=" ">Select State</option>';
        foreach ($getallstatebycountry as $value) {
            $thestateresult.='<option value='.$value["state_id"].'>'.$value["state_name"].'</option>';
        }
    }else{
        $thestateresult='<option value=" "></option>';
    }
   echo $thestateresult;
}
if($dataname=='getcountrylga'){
    $getalllgabycountry=$setup->getalllgabycountry($STATE)->fetchall(PDO::FETCH_ASSOC);
    if(count($getalllgabycountry) > 0){
        $thestateresult='<option value=" ">Select Lga</option>';
        foreach ($getalllgabycountry as $value) {
            $thestateresult.='<option value='.$value["lga_id"].'>'.$value["lga_name"].'</option>';
        }
    }else{
        $thestateresult='<option value=" "></option>';
    }
    echo $thestateresult;
}
if($dataname=='editstddetails'){
    $getsinglestudentdetails=$setup->getsinglestudentdetails($addno)->fetch(PDO::FETCH_ASSOC);
    $stddata['SURNAME']=$getsinglestudentdetails['SURNAME'];
    $stddata['FIRSTNAME']=$getsinglestudentdetails['FIRSTNAME'];
    $stddata['OTHERNAME']=$getsinglestudentdetails['OTHERNAME'];
    $stddata['ADDNO']=$getsinglestudentdetails['ADMISSIONNO'];
    $stddata['DOB']=$getsinglestudentdetails['DOB'];

    echo json_encode($stddata);
    exit();

}
if($dataname=='getstdprofile'){
        $getsinglestudentdetails=$setup->getsinglestudentdetails($ADDNO)->fetch(PDO::FETCH_ASSOC);
        $stddata['NAME']=$getsinglestudentdetails['SURNAME'].' '.$getsinglestudentdetails['FIRSTNAME'].' '.  $getsinglestudentdetails['OTHERNAME'];
        $stddata['CLASS']=$getsinglestudentdetails['CLASS'];
        $stddata['ADDNO']=$getsinglestudentdetails['ADDNO'];
        $stddata['SEX']=$getsinglestudentdetails['SEX'];
        $stddata['STUDENTSHIPSTATUS']=$getsinglestudentdetails['STUDENTSHIPSTATUS'];
        $stddata['COUNTRY']=$getsinglestudentdetails['COUNTRY'];
        $stddata['STATE']=$getsinglestudentdetails['STATE'];
        $stddata['LGA']=$getsinglestudentdetails['LGA'];
        $stddata['PSURNAME']=$getsinglestudentdetails['PSURNAME'];
        $stddata['POTHERNAME']=$getsinglestudentdetails['POTHERNAME'];
        $stddata['PADDRESS']=$getsinglestudentdetails['PADDRESS'];
        $stddata['PTOWN']=$getsinglestudentdetails['PTOWN'];
        $stddata['PEMAIL']=$getsinglestudentdetails['PEMAIL'];
        $stddata['PPHONENO']=$getsinglestudentdetails['PPHONENO'];
        $stddata['RELATIONSHIP']=$getsinglestudentdetails['RELATIONSHIP'];
        echo json_encode($stddata);
    }
if($dataname=='geteditprofile'){
        $getsinglestudentdetails=$setup->getsinglestudentdetails($addno)->fetch(PDO::FETCH_ASSOC);
        $countryoutput='';
        $getcountries=$setup->getallcountries();
        foreach($getcountries as $allcountries){
            extract($allcountries);
            if($getsinglestudentdetails['COUNTRY']==$country){
                $countryoutput.='<option value="'.$countrycode.'" selected>' . $country . '</option>';
            }else{
                $countryoutput.='<option value="'.$countrycode.'" >' . $country . '</option>';
            }
        }
        $getstates=$setup->getallthestates();
        $stateoutput='';
        foreach($getstates as $allstates){
            extract($allstates);
            if(ucfirst($getsinglestudentdetails['STATE'])==$state_name){
                $stateoutput.='<option value="'.$state_id.'" selected>' . $state_name . '</option>';
            }else{
                $stateoutput.='<option value="'.$state_id.'" >' . $state_name . '</option>';
            }
        }
        $Ptitleoutput='';
        foreach($general->getalltitles() as $alltitles){
            extract($alltitles);
            if($getsinglestudentdetails['PTITLE']==$full){
                $Ptitleoutput.='<option value="'.$full.'" selected>' . $full . '</option>';
            }else{
                $Ptitleoutput.='<option value="'.$full.'" >' . $full . '</option>';
            }
        }
        $Pcountryoutput='';
        foreach($setup->getallcountries() as $allcountries){
            extract($allcountries);
            if($getsinglestudentdetails['PCOUNTRY']==$country){
                $Pcountryoutput.='<option value="'.$countrycode.'" selected>' . $country . '</option>';
            }else{
                $Pcountryoutput.='<option value="'.$countrycode.'" >' . $country . '</option>';
            }
        }

        $parentstateoutput='';
        foreach($setup->getallthestates() as $allstates){
            extract($allstates);
            if(ucfirst($getsinglestudentdetails['PSTATE'])==$state_name){
                $parentstateoutput.='<option value="'.$state_id.'" selected>' . $state_name . '</option>';
            }else{
                $parentstateoutput.='<option value="'.$state_id.'" >' . $state_name . '</option>';
            }
        }
        $studentshipstatus='';
        foreach($setup->getallstudentship_status() as $allstudstatus){
            extract($allstudstatus);
            if(ucfirst($getsinglestudentdetails['STUDENTSHIPSTATUS'])==$id){
                $studentshipstatus.='<option value="'.$id.'" selected>' . $name . '</option>';
            }else{
                $studentshipstatus.='<option value="'.$id.'" >' . $name . '</option>';
            }
        }
        $state=$getsinglestudentdetails['STATE'];
        $thestateid=$setup->getstatesbyid($state)->fetch(PDO::FETCH_ASSOC);
        $stdstate=$thestateid['state_id'];
        $getlga=$setup->getlga();
        $lgaoutput='';
        foreach($getlga as $alllga){
            extract($alllga);
            if(ucfirst($getsinglestudentdetails['LGA'])==$lga_name){
                $lgaoutput.='<option value="'.$lga_name.'" selected>' . $lga_name . '</option>';
            }else{
                $lgaoutput.='<option value="'.$lga_name.'" >' . $lga_name . '</option>';
            }
        }
        $Plgaoutput='';
        foreach($setup->getlga() as $alllga){
            extract($alllga);
            if(ucfirst($getsinglestudentdetails['PLGA'])==$lga_name){
                $Plgaoutput.='<option value="'.$lga_name.'" selected>' . $lga_name . '</option>';
            }else{
                $Plgaoutput.='<option value="'.$lga_name.'" >' . $lga_name . '</option>';
            }
        }
        $alllevels=$general->alllevels();
         foreach($alllevels as $thelevels){
            extract($thelevels);
            if($getsinglestudentdetails['LEVEL']==$levelid){
             $leveloutput.='<option value="'.$levelid.'" selected>' . $levelid . '</option>';
            }else{
              $leveloutput.='<option value="'.$levelid.'" >' . $levelid . '</option>';  
            }
        }
        $allclasses=$general->allclasses();
         foreach($allclasses as $stdallclasses){
            extract($stdallclasses);
            if($getsinglestudentdetails['CLASS']==$class){
            $classoutput.='<option value="'.$class.'" selected>' . $class . '</option>';
          }else{
            $classoutput.='<option value="'.$class.'" >' . $class . '</option>';  
          }
        }

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
        $femaleselected='';
        $maleselected='';
        if($getsinglestudentdetails['sex']=='female'){ $femaleselected='selected';}
        if($getsinglestudentdetails['sex']=='male'){ $maleselected='selected';}
        $studentphoto='../studentphoto/'.$getsinglestudentdetails['PHOTOPATH'];
        $selectedsex='<option value="female" "'.$femaleselected.'">Female</option><option value="male" "'.$maleselected.'">Male</option>';
             $stdbio='<div class="form-group">
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Surname:
            </label>
            <div class="col-sm-10">
                <input type="text" name="SURNAME"  id="SURNAME"  value="'.$getsinglestudentdetails['SURNAME'].'" class="form-control" required>
            </div></div><div class="form-group">
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                First Name:
            </label>
            <div class="col-sm-10">
                <input type="text" name="FIRSTNAME"  id="FIRSTNAME" value="'.$getsinglestudentdetails['FIRSTNAME'].'" class="form-control" required>
            </div></div><div class="form-group">
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Middle Name:
            </label>
            <div class="col-sm-10">
                <input type="text" name="OTHERNAME"  id="OTHERNAME" value="'.$getsinglestudentdetails['OTHERNAME'].'" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Sex:
            </label>
            <div class="col-sm-3">
                <select name="SEX"  id="SEX" class="form-control" required>'.$selectedsex.'</select>
            </div>
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Date Of Birth:
            </label>
            <div class="col-sm-5">
                <input type="date" name="DOB"  id="DOB"  value="'.$getsinglestudentdetails['DOB'].'" class="form-control" required>
            </div>
    
        </div>
        <div class="form-group">
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Nation:
            </label>
            <div class="col-sm-3">
            <select name="COUNTRY"  id="COUNTRY" class="form-control" required onchange="CountryChange()">' .$countryoutput.
            '</select>
            </div>
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                State:
            </label>
            <div class="col-sm-5">
                <select name="STATE"  id="STATE" class="form-control" required onchange="StateChange()">'. $stateoutput .
               '</select>
            </div>
            </div>
            <div class="form-group">
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Lga
            </label>
            <div class="col-sm-3">
                <select name="LGA"  id="LGA" class="form-control" required>' . $lgaoutput .
            '</select></div>
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Home Town
            </label>
            <div class="col-sm-5">
                <input type="text" name="HTOWN"  id="HTOWN" class="form-control" required value="'.$getsinglestudentdetails['HTOWN'].'"> 
            </div>
    
        </div>';
        $stdcontact='
                <div class="form-group">
                    <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                            Parent Title:
                        </label>
                        <div class="col-sm-9">
                            <select name="PTITLE"  id="PTITLE" class="form-control" required >' . $Ptitleoutput .
                      '</select>
                        </div> 
                </div>
            <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent Surname:
            </label>
            <div class="col-sm-9">
                <input type="text" name="PSURNAME"  id="PSURNAME" value="'.$getsinglestudentdetails['PSURNAME'].'" class="form-control" required>
            </div>
            </div>
            <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
              Parent Other Name:
            </label>
            <div class="col-sm-9">
                <input type="text" name="POTHERNAME"  id="POTHERNAME"  value="'.$getsinglestudentdetails['POTHERNAME'].'" class="form-control" required>
            </div>
            </div>
            <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
            Parent Address:
            </label>
            <div class="col-sm-9">
                <input type="text" name="PADDRESS"  id="PADDRESS" value="'.$getsinglestudentdetails['PADDRESS'].'" class="form-control" required>
            </div>
            </div>
        </div>
       
        <div class="form-group">
        <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent Country:
            </label>
            <div class="col-sm-9">
                <select name="PCOUNTRY"  id="PCOUNTRY" class="form-control" required onchange="Pcountrychange()">' . $Pcountryoutput .
          '</select>
            </div> 
        </div>
        <div class="form-group">
        <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent State:
            </label>
            <div class="col-sm-9">
                <select name="PSTATE"  id="PSTATE" class="form-control" required onchange="PStateChange()">' . $parentstateoutput .
               '</select>
            </div> 
        </div>
        <div class="form-group">
        <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent lga:
            </label>
            <div class="col-sm-9">
                <select name="PLGA"  id="PLGA" class="form-control" required>' . $Plgaoutput .
          '</select>
            </div> 
        </div>  
        
        <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent Town:
            </label>
            <div class="col-sm-9">
                <input type="text" name="PTOWN"  id="PTOWN" value="'.$getsinglestudentdetails['PTOWN'].'" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent Email:
            </label>
            <div class="col-sm-9">
                <input type="email" name="PEMAIL"  id="PEMAIL"  value="'.$getsinglestudentdetails['PEMAIL'].'" class="form-control" required>
            </div>
            </div>
            <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Parent Phone No:
            </label>
            <div class="col-sm-9">
                <input type="number" name="PPHONENO"  id="PPHONENO"  value="'.$getsinglestudentdetails['PPHONENO'].'" class="form-control" required>
            </div>
            </div>
            <div class="form-group">
            <label for="pggroup" id="contactlabel" class="col-sm-1 control-label">
                Relationship:
            </label>
            <div class="col-sm-9">
                <input type="text" name="RELATIONSHIP"  id="RELATIONSHIP"  value="'.$getsinglestudentdetails['RELATIONSHIP'].'" class="form-control" required>
            </div>
        </div>';
        $studentstatus='<div class="form-group">
        <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Study Level:
            </label>
            <div class="col-sm-3">
                <select name="LEVEL"  id="LEVEL" class="form-control" required onchange="LevelChange()">
                <option value="'.$getsinglestudentdetails['LEVEL'].'" >'. $leveloutput .
               '</select>
            </div> 
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                CLASS:
            </label>
            <div class="col-sm-3">
                <select name="CLASS"  id="CLASS" class="form-control" required>'
                . $classoutput .
               '</select>
            </div> 
        </div>
        <div class="form-group">
        <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Studentship Status:
            </label>
            <div class="col-sm-3">
                <select name="STUDSTATUS"  id="STUDSTATUS" class="form-control" required>'. $studentshipstatus .
          '</select></div></div>
        <div class="form-group">
        <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Registration Status:
            </label>
            <div class="col-sm-3">
                <select name="REGSTATUS"  id="REGSTATUS" class="form-control" required>'. $regstatusforstd .
          '</select>
            </div> 
            <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Residential Status:
            </label>
            <div class="col-sm-3">
                <select name="RESIDENTIAL"  id="RESIDENTIAL" class="form-control" required>'
          . $residentialforstd .
          '</select>
            </div> 
        </div>';

        $stdupload='<div class="form-group">
        <label for="pggroup" id="classlabeldesign" class="col-sm-1 control-label">
                Photo:
            </label>
            <div class="col-sm-2">
                <img src="'.$studentphoto.'"  style="width:100px;height:100px;float:left;">
            </div> 
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                  <input type="file"  id="file" onchange="readURL(this);" />
            </div> 
            <div class="col-sm-offset-3">
               <img id="blah" src="#" alt="image" style="width:100px;height:100px;float:left;"/>
            </div> 
        </div>';
        $finance='<table style="width:100%"><tr><th class="text-center">Finance</th></tr>';
        if(count($setup->getallthestdchargesfinance($addno)->fetchAll()) > 0){
            foreach($setup->getallthestdchargesfinance($addno) as $value){
                extract($value);
                $finance.='<tr>';
                $finance.='<td class="stdfinance text-center" id="'.$termid.'" style="color:blue" onclick="AllFinance()">'.$session . ' - ' . $term.' Term</td>';
                $finance.='</tr>';
            }
            $finance.='</table>';
        }else{
            $finance.='<tr><td class="text-center">No Record Found</td>';
        }
        $studentprofile['stdbio']=$stdbio;
        $studentprofile['stdupload']=$stdupload;
        $studentprofile['stdcontact']=$stdcontact;
        $studentprofile['studentstatus']=$studentstatus;
        $studentprofile['finance']=$finance;
        echo json_encode($studentprofile);
    }
        
if($dataname=='getthestatelga'){
    $getalllgabycountry=$setup->getalllgabycountry($state)->fetchall(PDO::FETCH_ASSOC);
    if(count($getalllgabycountry) > 0){
        $thestateresult='';
        foreach ($getalllgabycountry as $value) {
            $thestateresult.='<option value='.$value["lga_id"].'>'.$value["lga_name"].'</option>';
        }
    }else{
        $thestateresult='<option value=""></option>';
    }
    echo $thestateresult;
}
if($dataname=='updatestddetails'){
    if ($_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0){
        $uploadedfilename='';
    }else {
        $tempfilename = $_FILES["file"]["tmp_name"];
        $uploadedfilename = $addno.$_FILES["file"]["name"];
        $ext = pathinfo($uploadedfilename, PATHINFO_EXTENSION);
        move_uploaded_file($tempfilename, "../studentphoto/$uploadedfilename");
    }
    $setup->updatestddetails($uploadedfilename,$STATE,$LGA,$SURNAME,$FIRSTNAME,$OTHERNAME,$REGSTATUS,$RESIDENTIAL,$DOB,$SEX,$PDATE,$addno,
      $COUNTRY,$PSURNAME,$STUDSTATUS,$PPHONENO,$STAFFID,
      $POTHERNAME,$PADDRESS,$PTOWN,$PSTATE,$PEMAIL,$RELATIONSHIP,
      $HTOWN,$PCOUNTRY,$PLGA,$PTITLE);
    logguser($addno,"updated student with addno:$addno record",$appid, $menuid);
}
if($dataname=='getstudentactbalance'){
    $general->getstdfinance($addno,$stdtermid);
}
?>








