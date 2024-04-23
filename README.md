# DCC_Assignment_4
 ## To clone this repo
```rb
sudo apt install git
git clone https://github.com/Naveen-Pal/DCC_Assignment_4
cd DCC_Assignment_4
```

## 1. Convert The PDF to CSV file
To convert PDF to CSV file I make the python file using the given reference [link](https://pymupdf.readthedocs.io/en/latest/module.html)
<br/>
The python file is named as pdf_to_csv.py in this repo.

## 2. Import to mysql
To import I use mysql command line interface 
1. Create a new databases name "dcc_4"
2. Create Two table with name individual and political.
3. import csv file in this tables

```rb
create database dcc_4;
create table individual;
LOAD DATA INFILE '/var/lib/mysql-files/individual.csv'
INTO TABLE Individual
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 LINES
```
## 3. Create required frontend and backend code
 I write a php code to handle the backend because I was facing issue with Flask.

## 4. Start the server
I am using linux so I am confortable with the apache2 server.
Use below command to start the server
```rb
sudo systemctl apache2 start
```

Below are some screenshots:
<br>
![dcc_1](https://github.com/Naveen-Pal/DCC_Assignment_4/assets/136141222/5a84c0b0-e033-41ea-89d3-2c3cdfe6351f)
![dcc_2](https://github.com/Naveen-Pal/DCC_Assignment_4/assets/136141222/17c21584-174c-4bd8-8f36-d1efede4379d)
![dcc_3](https://github.com/Naveen-Pal/DCC_Assignment_4/assets/136141222/578366e3-5a8a-44dc-9765-9ce219269740)
![dcc_4](https://github.com/Naveen-Pal/DCC_Assignment_4/assets/136141222/fc0ae4c8-fef3-4c55-ad4b-ac2763f11a2d)

