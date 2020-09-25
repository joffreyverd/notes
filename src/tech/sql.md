# SQL

```sql

-- Update values in database
update user
set username = 'Gaston'
where username = 'Bob'
and userlogin = 'bob@gmail.com'
and age = 36

-- Usefull to run into an array
update user
  set username = case
    when age = 36 then 37
    when age = 37 then 38
	  else username
	end;
  
-- Create a new column and set a default value
alter table `user`
add column `age`
tinyint(1) not null DEFAULT 0
comment 'this is the age'
after `home`;

-- Create a new table
create table `project_options` (
  `idoptions` int(10) unsigned not null AUTO_INCREMENT,
  `idproject` int(10) unsigned not null DEFAULT '0',
  `options` json
  comment 'Contain the json set of settings for this project',
  primary key (`idoptions`),
  key `idproject` (`idproject`),
  constraint `project_options` foreign key (`idproject`) references `project` (`idproject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Remove a column from a table
alter table project drop `status` options;

-- Add a column with an auto-increment primary key
alter table `user` add `id` int primary key AUTO_INCREMENT

-- Add a foreign key on a field
alter table project
add foreign key (company_id) references company(id);

-- Empty all data of a table
truncate table `user`

-- Get column filter by occurences
select `name`,
  count(`name`) as `value_occurrence` 
from     `user`
group by `name`
order by `value_occurrence` desc;

-- Export content of some columns to new one in another table
insert into `new_user_table` (`data`, `id`)
select `data`, `id`
from `user`

-- Delete an entry from a table
delete from `user`
where `id` = 1;

-- Loop
DECLARE c INT DEFAULT 1;
WHILE c <= 2000
    -- SQL
    SET c  = c  + 1;
END WHILE;
```
