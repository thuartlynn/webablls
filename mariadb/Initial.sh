#!/bin/bash

#============PARAMETER DEFINE================
DATABASE=webablls
#============ FUNCTION START ================
echo -e "\033[31m====================================\033[0m"
echo -e "\033[31m=   DATABASE INITIAL START         =\033[0m"
echo -e "\033[31m====================================\033[0m"
maxcounter=45
 
counter=1
while ! mysql --protocol TCP -uroot -ptismfp2 -e "show databases;" > /dev/null 2>&1; do
    sleep 10
    counter=`expr $counter + 1`
    if [ $counter -gt $maxcounter ]; then
        >&2 echo "We have been waiting for MySQL too long already; failing."
        exit 1
    fi;
done
