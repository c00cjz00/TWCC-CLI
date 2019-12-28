<?php
function createContainer($containerName,$containerGpuNum,$containerSol,$containerImg){
 $containerID="";
 $cmd="pipenv run python src/test/gpu_cntr.py create-cntr -cntr $containerName -gpu $containerGpuNum -sol $containerSol -img $containerImg";
 $tmp=shell_exec($cmd);
 $tmpArr=explode("Site id: ",$tmp);
 if (count($tmpArr)==2){
  $tmp=trim($tmpArr[1]);
  $tmpArr=explode("is created",$tmp);
  if (count($tmpArr)==2){
   $containerID=trim($tmpArr[0]);
  }
 }
 return $containerID;
}

function getContainerDetail($containerID){
 $cmd="pipenv run python src/test/gpu_cntr.py list-cntr -site $containerID -table False";
 $tmp=trim(shell_exec($cmd));
 $tmpArr=explode("\n",$tmp);
 $result=trim($tmpArr[2]);
 return $result;
}
function delContainer($containerID){
 $cmd="pipenv run python src/test/gpu_cntr.py del-cntr $containerID";
 $result=trim(shell_exec($cmd));
 return $result;
} 

function sshCmd($sshLinking,$myCmd){
 $cmd="ssh -o StrictHostKeyChecking=no ".$sshLinking." '".$myCmd."'";
 echo $cmd."\n";
 $result=trim(shell_exec($cmd));
 return $result;
}

function listContainer(){
 $cmd="pipenv run python src/test/gpu_cntr.py list-cntr -all";
 //echo $cmd."\n";
 $tmp=trim(shell_exec($cmd));
 $tmpArr=explode("\n",$tmp);
 for($i=4;$i<(count($tmpArr)-1);$i++){
  $tmp=trim($tmpArr[$i]);
  $smpArr=explode("|",$tmp);
  $containerID=trim($smpArr[1]);
  $containerName=trim($smpArr[2]);
  $containerList[$containerID]=$containerName;
 }
 return $containerList;
}