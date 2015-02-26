#!/bin/bash
clear
rm log
rm temp

echo "RAPPORT DE TESTS" >> log
echo "----------------" >> log

./Console/cake test app Model/User >> temp
echo "Model/User" >> log
cat temp | tail -n 2 >> log
echo "" >> log 

> temp
./Console/cake test app Controller/AnnoncesController >> temp
echo "Controller/AnnoncesController" >> log 
cat temp | tail -n 2 >> log
echo "" >> log

> temp
./Console/cake test app Controller/UsersController >> temp
echo "Controller/UsersController" >> log
cat temp | tail -n 2 >> log
echo "" >> log

clear

cat log
