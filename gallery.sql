drop database if exists gallery;
create database gallery;
use gallery;

create table object(
	object_id serial primary key,
	username text,
	title text,
	category text,
	description text,
	year year,
	price int,
	filename text
);

create table member(
	user_id serial primary key,
	username varchar(20),
	password char(40),
	reg_date datetime
);