<?php
### 建立變數條件 
$containerName="mytorch";
$containerGpuNum=1;
$containerSol="PyTorch";
$containerImg="pytorch-19.11-py3:latest";

### 導入 Function, containerFunc.php
$dirBin=dirname(__FILE__);
include($dirBin."/00-containerFunc.php");

### 建立 Container, 並取得ID, containerID: 766387
$containerID=createContainer($containerName,$containerGpuNum,$containerSol,$containerImg);
echo "containerID: ".$containerID."\n";

### 取得連線方式內容, c00cjz00@203.145.219.140 -p 51692 
$containerTable=getContainerDetail($containerID);
echo $containerTable."\n";
