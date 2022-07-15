<?php
ini_set('max_execution_time', 0);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '-1');
error_reporting(1);

include_once './db_connect.php';
$db = new db();
$con = $db->connect();

if($con) {
     echo 'Connect';
} else {
    echo 'Not Connect';
    exit();
}

while(mysqli_more_results($con)){mysqli_next_result($con);}
$sql="SELECT * FROM  S3_Auto";
$result=$db->select($sql);
echo '<pre>';
foreach($result as $line) {
     //print_r($line);
    
    $Site =$line['Site'];
    $CallID=$line['CallID'];
    $CallType=$line['CallType'];
    $Campaign=$line['Campaign'];
    $Location=$line['Location'];
    $CallerNo=$line['CallerNo'];
    $Skill =$line['Skill'];
    $CallDate =$line['CallDate'];
    $StartTime=$line['StartTime'];
    $TimetoAnswer=$line['TimetoAnswer'];
    $EndTime=$line['EndTime'];
    $TalkTime=$line['TalkTime'];
    $HoldTime=$line['HoldTime'];
    $Duration=$line['Duration'];
    $CallFlow=$line['CallFlow'];
    $DialedNumber=$line['DialedNumber'];
    $Agent=$line['Agent'];
    $Disposition=$line['Disposition'];
    $WrapupDuration=$line['WrapupDuration'];
    $HandlingTime=$line['HandlingTime'];
    $Status=$line['Status'];
    $DialStatus=$line['DialStatus'];
    $CustomerDialStatus=$line['CustomerDialStatus'];
    $AgentDialStatus=$line['AgentDialStatus'];
    $HangupBy=$line['HangupBy'];
    $TransferDetails=$line['TransferDetails'];
    $UUI=$line['UUI'];
    $comments=$line['comments'];

    while(mysqli_more_results($con)){mysqli_next_result($con);}
    sleep(0.2);
    $sqli="CALL sp3Report('$Site','$CallID','$CallType','$Campaign','$Location','$CallerNo','$Skill','$CallDate','$StartTime','$TimetoAnswer','$EndTime','$TalkTime','$HoldTime','$Duration','$CallFlow','$DialedNumber','$Agent','$Disposition','$WrapupDuration','$HandlingTime','$Status','$DialStatus','$CustomerDialStatus','$AgentDialStatus','$HangupBy','$TransferDetails','$UUI','$comments')";
    $resultss=$db->select($sqli);
    $res = 0;
     foreach($resultss as $line){
          $res = $line['result'];
     }
     if($res == '0') {
          echo '<br>'.$sqli;
          echo ';';
     }
}

while(mysqli_more_results($con)) {mysqli_next_result($con);}
$sqlM="SELECT * FROM S3_Man";
$rowM = $db->select($sqlM);
foreach($rowM as $line) {
    //print_r($line);
    $Site = $line['Site'];
    $CallID = $line['CallID'];
    $CallType = $line['CallType'];
    $Campaign = $line['Campaign'];
    $Location = $line['Location'];
    $CallerNo = $line['CallerNo'];
    $Skill = $line['Skill'];
    $CallDate = $line['CallDate'];
    $StartTime = $line['StartTime'];
    $TimetoAnswer = $line['TimetoAnswer'];
    $EndTime = $line['EndTime'];
    $TalkTime = $line['TalkTime'];
    $HoldTime = $line['HoldTime'];
    $Duration = $line['Duration'];
    $CallFlow = $line['CallFlow'];
    $DialedNumber = $line['DialedNumber'];
    $Agent = $line['Agent'];
    $Disposition = $line['Disposition'];
    $WrapupDuration = $line['WrapupDuration'];
    $HandlingTime = $line['HandlingTime'];
    $Status = $line['Status'];
    $DialStatus = $line['DialStatus'];
    $CustomerDialStatus = $line['CustomerDialStatus'];
    $AgentDialStatus = $line['AgentDialStatus'];
    $HangupBy = $line['HangupBy'];
    $TransferDetails = $line['TransferDetails'];
    $UUI = $line['UUI'];
    $comments = $line['comments'];
    
    while(mysqli_more_results($con)){mysqli_next_result($con);}
    sleep(0.2);
    $sqli="CALL sp3Report('$Site','$CallID','$CallType','$Campaign','$Location','$CallerNo','$Skill','$CallDate','$StartTime','$TimetoAnswer','$EndTime','$TalkTime','$HoldTime','$Duration','$CallFlow','$DialedNumber','$Agent','$Disposition','$WrapupDuration','$HandlingTime','$Status','$DialStatus','$CustomerDialStatus','$AgentDialStatus','$HangupBy','$TransferDetails','$UUI','$comments')";
    $resultss=$db->select($sqli);
    $res = 0;
     foreach($resultss as $line){
          // print_r($line);
          $res = $line['result'];
     }
     if($res == '0') {
          echo '<br>'.$sqli;
          echo ';';
     }
  

}
echo '</pre>'


?>