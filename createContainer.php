<?php
$containerName="mytorch";
$containerGpuNum=1;
$containerSol="PyTorch";
$containerImg="pytorch-19.11-py3:latest";
$containerID=createContainer($containerName,$containerGpuNum,$containerSol,$containerImg);
echo "containerID: ".$containerID."\n";
$containerTable=getContainerTable($containerID);
echo $containerTable."\n";
$myCmd="ls";
$cmdMessage=sshCmd($containerTable,$myCmd);
echo $cmdMessage."\n";

$myCmd="sudo -i pip install fastai";
$cmdMessage=sshCmd($containerTable,$myCmd);
echo $cmdMessage."\n";

$delMessage=delContainer($containerID);
echo $delMessage."\n";
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

function getContainerTable($containerID){
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

function sshCmd($containerTable,$myCmd){
 $cmd="ssh -o StrictHostKeyChecking=no ".$containerTable." '".$myCmd."'";
 echo $cmd."\n";
 $result=trim(shell_exec($cmd));
 return $result;
}
?>