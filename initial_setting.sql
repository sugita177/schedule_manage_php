drop database if exists schedule_manage;
create database schedule_manage default character set utf8 collate utf8_general_ci;
drop user if exists 'member@localhost';
create user 'member@localhost' identified by 'password';
grant all on schedule_manage.* to 'member@localhost';
use schedule_manage;

create table member (
    id int auto_increment primary key,
    member_name varchar(20) not null
);

create table schedule (
    member_id  int,
    schedule_year int,
    schedule_month int,
    schedule_day int,
    content varchar(200),
    foreign key(member_id) references member(id),
    primary key(member_id, schedule_year, schedule_month, schedule_day)
);

insert into member values(null, 'Alice');
insert into member values(null, 'Bob');
insert into member values(null, 'Caroline');
insert into member values(null, 'David');
insert into member values(null, 'Eve');
insert into member values(null, 'George');
insert into member values(null, 'Irvine');
