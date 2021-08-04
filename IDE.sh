#!/bin/zsh

#============PARAMETER DEFINE================
IMAGE_SERVER=linuxserver:5000/matthew
NGINX_IMAGE=nginx:1.17.2
PHP_IMAGE=php-7-fpm:7.3.9
MARIADB_IMAGE=mariadb:10.4.7
NODEJS_IMAGE=node:lts-alpine
PHP_COTAINER=Webablls_PHP
MARIADB_COTAINER=Webablls_Mariadb
NODEJS_COTAINER=Webablls_NodeJs
WROKDIR=/web
DATABASE=webablls
BR="\e[34m"
CMD="\e[32m"
EC="\e[0m"

#============ FUNCTION START ================
function Initial_Setup()
{
echo -e "\033[31m====================================\033[0m"
echo -e "\033[31m=   WEBABLLS SETUP PROCESS START   =\033[0m"
echo -e "\033[31m====================================\033[0m"
echo -e "\033[32mDownload Image File\033[0m"
docker pull $IMAGE_SERVER/$NGINX_IMAGE
docker pull $IMAGE_SERVER/$PHP_IMAGE
docker pull $IMAGE_SERVER/$MARIADB_IMAGE
docker pull $NODEJS_IMAGE
echo -e "\033[32mInitial All Container \033[0m"
docker-compose up -d mariadb nginx nodejs phpfpm
echo -e "\033[32mCreate Database\033[0m"
docker exec $MARIADB_COTAINER /home/Initial.sh
echo -e "\033[32mInstall Composer\033[0m"
docker exec -w $WROKDIR $PHP_COTAINER /home/Initial.sh
echo -e "\033[32mInstall Node.js\033[0m"
docker exec -i -t -w $WROKDIR $NODEJS_COTAINER npm install
docker exec -i -t -d -w $WROKDIR $NODEJS_COTAINER npm run dev
echo -e "\033[31m====================================\033[0m"
echo -e "\033[31m=   WEBABLLS SETUP PROCESS FINISH  =\033[0m"
echo -e "\033[31m====================================\033[0m"
}
function Production_DataBase()
{
      echo -e "\033[32m Create Database \033[0m"     
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "DROP DATABASE IF EXISTS $DATABASE;" 
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "CREATE DATABASE $DATABASE;" 
      echo -e "\033[32m Create User \033[0m"     
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "CREATE USER IF NOT EXISTS 'Admin'@'%' IDENTIFIED BY 'tecoimage';"
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "GRANT DELETE,CREATE,DROP,ALTER,ALTER ROUTINE,CREATE ROUTINE,CREATE VIEW,SELECT,\
                                              INDEX,INSERT,UPDATE ON $DATABASE.* TO 'Admin'@'%';"
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "FLUSH PRIVILEGES;"
      echo -e "\033[32mDataBase Migration\033[0m"     
      docker exec $PHP_COTAINER php artisan migrate:install
      docker exec $PHP_COTAINER php artisan migrate
      echo -e "\033[32mSeed Skill Info \033[0m"     
      docker exec $PHP_COTAINER php artisan db:seed --class=SkillClassSeeder      
}
function Initial_DataBase()
{
      echo -e "\033[32m Create Database \033[0m"     
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "DROP DATABASE IF EXISTS $DATABASE;" 
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "CREATE DATABASE $DATABASE;" 
      echo -e "\033[32m Create User \033[0m"     
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "CREATE USER IF NOT EXISTS 'Admin'@'%' IDENTIFIED BY 'tecoimage';"
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "GRANT DELETE,CREATE,DROP,ALTER,ALTER ROUTINE,CREATE ROUTINE,CREATE VIEW,SELECT,\
                                              INDEX,INSERT,UPDATE ON $DATABASE.* TO 'Admin'@'%';"
      docker exec $MARIADB_COTAINER mysql -uroot -ptismfp2 --show-warnings -v -e "FLUSH PRIVILEGES;"
      echo -e "\033[32mDataBase Migration\033[0m"     
      docker exec $PHP_COTAINER php artisan migrate:install
      docker exec $PHP_COTAINER php artisan migrate
      echo -e "\033[32mSeed Organization \033[0m"     
      docker exec $PHP_COTAINER php artisan db:seed --class=OrganizationSeeder
      echo -e "\033[32mSeed User \033[0m"     
      docker exec $PHP_COTAINER php artisan db:seed --class=UserSeeder
      echo -e "\033[32mSeed Seat \033[0m"     
      docker exec $PHP_COTAINER php artisan db:seed --class=SeatSeeder
      echo -e "\033[32mSeed Permission \033[0m"     
      docker exec $PHP_COTAINER php artisan db:seed --class=PermissionSeeder
      echo -e "\033[32mSeed Skill Info \033[0m"     
      docker exec $PHP_COTAINER php artisan db:seed --class=SkillClassSeeder
      echo -e "\033[32mSeed Archived Student \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=ArchivedSeeder
      echo -e "\033[32mSeed Student Parameter \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=SP_Seeder
      echo -e "\033[32mSeed Contact List \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=ContactListSeeder      
      echo -e "\033[32mSeed Assessment \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=AssessmentSeeder
      echo -e "\033[32mSeed Base Line Report \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=BaseLineReportSeeder
      echo -e "\033[32mSeed Status Report \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=StatusReportSeeder
      echo -e "\033[32mSeed WorkSheet and Progress \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=WorkSheetSeeder
      echo -e "\033[32mSeed Analysis  \033[0m"   
      docker exec $PHP_COTAINER php artisan db:seed --class=AnalysisSettingSeeder                           

}
#============ MENU LIST ================
while true 
do
clear
printf "$BR┌──────────────────────────────────────────────────────────┐$EC\r\n"
printf "$BR│ $EC Project Name: WebAblls                                  $BR│$EC\r\n"
printf "$BR├──────────────────────────────────────────────────────────┤$EC\r\n"
printf "$BR│ $EC 1: Initial Project Without DB                           $BR│$EC\r\n"
printf "$BR│ $EC 2: Open PHP Container                                   $BR│$EC\r\n"
printf "$BR│ $EC 3: Open Node.Js Container                               $BR│$EC\r\n"
printf "$BR│ $EC 4: UP Adminer Container                                 $BR│$EC\r\n"
printf "$BR│ $EC 5: Update CSS/JS                                        $BR│$EC\r\n"
printf "$BR│ $EC 6: Shutdown                                             $BR│$EC\r\n"
printf "$BR│ $EC 7: Initial Project With DB                              $BR│$EC\r\n"
printf "$BR│ $EC 8: Production                                           $BR│$EC\r\n"
printf "$BR├──────────────────────────────────────────────────────────┤$EC\r\n"
printf "$BR│ $EC R1: ReInitial Container                                 $BR│$EC\r\n"
printf "$BR│ $EC R2: ReCreate Faker Data                                 $BR│$EC\r\n"
printf "$BR│                                                          │$EC\r\n"
printf "$BR│                                                          │$EC\r\n"
printf "$BR│                                                          │$EC\r\n"
printf "$BR│                                                          │$EC\r\n"
printf "$BR│ $EC Q: Exit                                                 $BR│$EC\r\n"
printf "$BR└──────────────────────────────────────────────────────────┘$EC\r\n"
printf "$CMD Select CMD > $EC"
    read command ARGUMENTS    
    COMMAND=`echo $command`
  case $COMMAND in
    
    1)
      Initial_Setup       
      ;;
    2)
      docker exec -i -t $PHP_COTAINER /bin/bash
      ;;
    3)
      docker exec -i -t -w $WROKDIR $NODEJS_COTAINER /bin/sh
      ;;
    4)
      docker-compose up -d adminer
      ;;
    5)
      docker exec -i -t -w $WROKDIR $NODEJS_COTAINER npm run dev
      ;;
    6)
      docker-compose down
      ;;
    7)
      Initial_Setup 
      Initial_DataBase      
      ;;
    8)
      Initial_Setup 
      Production_DataBase      
      ;;            
    R1)
       docker-compose down
       Initial_Setup 
      ;;          
    R2)
       Initial_DataBase
      ;;  
    Q)
      exit
      ;;
  esac
  echo -n "Press Enter to Contiune"
  read
done