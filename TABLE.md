#Table Creation

`mysql> create table IF NOT EXISTS trainer(id int(3) NOT NULL AUTO_INCREMENT, fname  varchar(30),email varchar(60), password varchar(40), course varchar(15), mark int, PRIMARY KEY(id));`

`mysql> create table IF NOT EXISTS trainee(id int(3) NOT NULL AUTO_INCREMENT, fname  varchar(30),email varchar(60), password varchar(40), course varchar(15), PRIMARY KEY(id));`

`mysql> create table IF NOT EXISTS project(id int(3) NOT NULL, pname varchar(10), pstatus varchar(20));`

`mysql> create table IF NOT EXISTS question(course varchar(15), ques varchar(100), c1 varchar(10), c2 varchar(10), c3 varchar(10), c4 varchar(10), ans char(1));`