# TrainingInformationSystem
A WebApp using CodeIgniter Framework 

##Database Structure

`mysql> use Training;`

`mysql> show tables;`

| Tables_in_Training |
|:--------------:|
| project            |
| question           |
| trainee            |
| trainer            |

###project
`mysql> desc project;`

| Field | Type     | Null | Key | Default | Extra |
|:-----:|:--------:|:----:|:---:|:-------:|:-----:|
| id      | int(3)      | NO   |     | NULL    |       |
| pname   | varchar(10) | YES  |     | NULL    |       |
| pstatus | varchar(20) | YES  |     | NULL    |       |

###question
`mysql> desc question;`

| Field | Type     | Null | Key | Default | Extra |
|:-----:|:--------:|:----:|:---:|:-------:|:-----:|
| course | varchar(15)  | YES  |     | NULL    |       |
| ques   | varchar(100) | YES  |     | NULL    |       |
| c1     | varchar(10)  | YES  |     | NULL    |       |
| c2     | varchar(10)  | YES  |     | NULL    |       |
| c3     | varchar(10)  | YES  |     | NULL    |       |
| c4     | varchar(10)  | YES  |     | NULL    |       |
| ans    | char(1)      | YES  |     | NULL    |       |

###trainee
`mysql> desc trainee;`

| Field | Type     | Null | Key | Default | Extra |
|:-----:|:--------:|:----:|:---:|:-------:|:-----:|
| id       | int(3)      | NO   | PRI | NULL    | auto_increment |
| fname    | varchar(30) | YES  |     | NULL    |                |
| email    | varchar(60) | YES  |     | NULL    |                |
| password | varchar(40) | YES  |     | NULL    |                |
| course   | varchar(15) | YES  |     | NULL    |                |
| mark     | int(11)     | YES  |     | NULL    |                |


###trainer
`mysql> desc trainer;`

| Field | Type     | Null | Key | Default | Extra |
|:-----:|:--------:|:----:|:---:|:-------:|:-----:|
| id       | int(3)      | NO   | PRI | NULL    | auto_increment |
| fname    | varchar(30) | YES  |     | NULL    |                |
| email    | varchar(60) | YES  |     | NULL    |                |
| password | varchar(40) | YES  |     | NULL    |                |
| course   | varchar(15) | YES  |     | NULL    |                |