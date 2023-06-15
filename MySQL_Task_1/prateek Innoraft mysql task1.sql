-- created database 
create database IPL;
-- used database 
use IPL;
-- created table teams
create table teams(
team_id varchar(10),
team_name varchar(50),
captain varchar(50),
primary key (team_id)
);

-- created table matches 
create table matches(
match_no int (200),
match_date date,
team1 varchar(50),
team2 varchar(50),
venue varchar(50),
toss_won varchar(50),
match_won varchar(50),
primary key (match_no)
);

-- inserted data into table teams 
insert into teams values('MI','Mumbai Indians','Rohit Sharma');
insert into teams values('CSK','Chennai Super Kings','Mahendra Singh Dhoni');
insert into teams values('RCB','Royal Challengers Bangalore','Virat Kohli');
insert into teams values('KKR','Kolkata Knight Riders','Shreyas Iyer');
insert into teams values('DC','Delhi Capitals','Rishabh Pant');
insert into teams values('RR','Rajasthan Royals','Sanju Samson');
insert into teams values('SRH','Sunrisers Hyderabad','Kane Williamson');
insert into teams values('PBKS','Punjab Kings','Mayank Agarwal');


-- inserted data into table matches
insert into matches values(1,'2022-03-31','MI','CSK','Mumbai','CSK','CSK');
insert into matches values(2,'2022-04-01','RCB','KKR','Bengaluru','RCB','KKR');
insert into matches values(3,'2022-04-02','DC','RR','Jaipur','DC','DC');
insert into matches values(4,'2022-04-03','SRH','PBKS','Mohali','PBKS','SRH');
insert into matches values(5,'2022-04-05','CSK','KKR','Ahmedabad','KKR','CSK');
insert into matches values(6,'2022-04-07','SRH','DC','Pune','SRH','DC');
insert into matches values(7,'2022-04-10','CSK','DC','Indore','DC','DC');

-- Displaying data of table teams 
select *
from teams;

-- Displaying data of table matches 
select *
from matches;

-- 1) Venue of the matches

select match_no,venue
from matches;

-- 2) Date of Match

select match_no,match_date
from matches;

-- 3) Team 1 Name

select match_no,team1
from matches;

-- 4) Team 2 name

select match_no,team2
from matches;

-- 5) captain of team 1    

select match_no,team1,teams.captain
from teams
join matches on teams.team_id=matches.team1;

-- 6) captain of team 2

select match_no,team2,teams.captain
from teams
join matches on teams.team_id=matches.team2;

-- 7) Toss won by (with captain)

select matches.match_no,matches.toss_won,teams.captain
from teams
join matches on teams.team_id=matches.toss_won; 

-- 8) Match won by (with captain)
select matches.match_no,matches.match_won,teams.captain
from teams
join matches on teams.team_id=matches.match_won; 