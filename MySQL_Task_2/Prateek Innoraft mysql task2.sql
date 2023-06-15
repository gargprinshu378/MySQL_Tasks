create database employee;
use employee;
create table employee_code_table(
employee_code varchar(50),
employee_code_name varchar(50),
employee_domain varchar(50),
primary key (employee_code)
);

create table employee_salary_table(
employee_id varchar(50),
employee_salary int(10),
employee_code varchar(50),
primary key (employee_id),
foreign key (employee_code) references employee_code_table(employee_code)
);

create table employee_details_table(
employee_id varchar(50),
employee_first_name varchar(50),
employee_last_name varchar(50),
graduation_percentile float(5),
primary key (employee_id),
foreign key (employee_id) references employee_salary_table(employee_id)
);

insert into employee_code_table 
values
('su_john','ru_john','Java'),
('su_daenerys','du_daenerys','PHP'),
('su_cersei','du_cersei','Java'),
('su_tyrion','tu_tyrion','Angular JS');

insert into employee_salary_table
values
('RU122',60000,'su_john'),
('RU123',25000,'su_daenerys'),
('RU124',44000,'su_cersei'),
('RU125',85000,'su_tyrion');

insert into employee_details_table
values
('RU122','John','Snow',60),
('RU123','Daenerys','Targaryen',88),
('RU124','Cersei','Lannister',72),
('RU125','Tyrion','Lannister',64);

-- Displaying data of table employee_code_table 
select *
from employee_code_table;

-- Displaying data of table employee_salary_table 
select *
from employee_salary_table;

-- Displaying data of table employee_details_table
select *
from employee_details_table;

-- Query1

select employee_details_table.employee_first_name,employee_salary_table.employee_salary
from employee_salary_table
join employee_details_table on employee_salary_table.employee_id=employee_details_table.employee_id
where employee_salary_table.employee_salary > 50000;

-- Query2

select employee_last_name,graduation_percentile
from employee_details_table
where graduation_percentile > 70;

-- Query3

 select employee_code_table.employee_code_name,employee_details_table.graduation_percentile
 from employee_details_table
 join employee_salary_table on employee_details_table.employee_id=employee_salary_table.employee_id
 join employee_code_table on employee_salary_table.employee_code=employee_code_table.employee_code
 where employee_details_table.graduation_percentile < 70;
 
 -- Query 4
 
 select concat(employee_first_name,' ',employee_last_name),employee_code_table.employee_domain
 from employee_code_table
 join employee_salary_table on employee_code_table.employee_code=employee_salary_table.employee_code
 join employee_details_table on employee_salary_table.employee_id=employee_details_table.employee_id
 where employee_code_table.employee_domain != 'Java';
 
 -- Query5
 
 select distinct employee_code_table.employee_domain,sum(employee_salary_table.employee_salary) as domain_salary
 from employee_salary_table
 join employee_code_table on employee_salary_table.employee_code=employee_code_table.employee_code
 group by employee_code_table.employee_domain;
 
 -- Query6
 
 select distinct employee_code_table.employee_domain,sum(employee_salary_table.employee_salary)
 from employee_salary_table
 join employee_code_table on employee_salary_table.employee_code=employee_code_table.employee_code
 where employee_salary_table.employee_salary > 30000
 group by employee_code_table.employee_domain;
 
 -- Query7
 
 select employee_salary_table.employee_id
 from employee_salary_table
 where employee_salary_table.employee_code = NULL;