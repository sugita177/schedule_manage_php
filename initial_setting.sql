drop database if exists schedule_manage;
create database schedule_manage default character set utf8 collate utf8_general_ci;
drop user if exists 'member'@'localhost';
create user 'member'@'localhost' identified by 'password';
grant all on schedule_manage.* to 'member'@'localhost';
use schedule_manage;

create table user (
    id int auto_increment primary key,
    member_name varchar(20) not null,
    account_name varchar(20) unique not null,
    account_password varchar(60) not null,
    is_schedule_member boolean default true,
    is_admin_user boolean default false
);


create table schedule (
    member_id  int,
    schedule_year int,
    schedule_month int,
    schedule_day int,
    content varchar(200),
    foreign key(member_id) references user(id),
    primary key(member_id, schedule_year, schedule_month, schedule_day)
);

insert into user values(null, 'Alice', 'alice', 'alicePass01', true, false);
insert into user values(null, 'Bob', 'bob', 'bobPass02', true, false);
insert into user values(null, 'Caroline', 'caroline', 'carolinePass03', true, false);
insert into user values(null, 'David', 'david', 'davidPass04', true, false);
insert into user values(null, 'Eve', 'eve', 'evePass05', true, false);
insert into user values(null, 'George', 'george', 'georgePass06', true, false);
insert into user values(null, 'Irvine', 'irvine', 'irvinePass07', true, false);
insert into user values(1000, 'Guest', 'guest', 'guestPass', false, false);
insert into user values(9000, 'Admin', 'admin', 'adminPass', false, true);

insert into schedule values(1, 2023, 5, 15, 'Airport');
insert into schedule values(3, 2023, 6, 8, 'Station');