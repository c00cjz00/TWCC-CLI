# TWCC-CLI Project

> we cook twcc-cli


:::info

NOTE:

Please update your TWCC-CLI constantly to make sure all functionalities works up-to-date, thanks! 

any questions: please check on https://www.twcc.ai/doc?page=deploy_env_cli or email to isupport@narlabs.org.tw THANKS!

:::

INDEX: 
1. [S3](doc/S3_tutorial.md)
1. [Customized Image](doc/Customed_Img_Tutorial.md)


UPDATED:
- Please follow instructions in [TWCC MANUAL](https://www.twcc.ai/doc?page=deploy_env_cli), thanks!


ssh-keygen
ssh-copy-id -i ~/.ssh/id_rsa.pub c00cjz00@203.145.219.140 -p 51917
ssh -p  51917 c00cjz00@203.145.219.140

TWCCCLI
pipenv run python src/test/gpu_cntr.py create-cntr -cntr mytorch -gpu 2 -sol PyTorch -img pytorch-19.11-py3:latest
pipenv run python src/test/gpu_cntr.py list-cntr -site 765808 -table False

ssh -o StrictHostKeyChecking=no c00cjz00@203.145.219.140 -p 54569

ssh -o StrictHostKeyChecking=no c00cjz00@203.145.219.140 -p 54569 'ls -al'

ssh -o StrictHostKeyChecking=no c00cjz00@203.145.219.140 -p 54569 'sudo -i pip install fastai'
