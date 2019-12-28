<?php
for($i=0;$i<2;$i++){
 $today = date("YmdHis");
 $cmd="php demo.php ".$today." 1 TensorFlow 'tensorflow-19.11-tf2-py3:latest' 'sudo -i pip install --upgrade pip; sleep 2; sudo -i pip install fastai; sleep 3; ipython ~/fastaiDemo/00-firstClass-TrainingSimple.ipynb;' '/tmp/model01.pkl' '/home/ubuntu/git/TWCC-CLI/php/model/".$today.".pkl'";
 echo $cmd."\n";
 exec($cmd);
 sleep(1);
}
?>