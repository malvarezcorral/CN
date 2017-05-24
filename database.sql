create schema printing_srv;
use printing_srv;

create table projects(
	_id int auto_increment,
    _name varchar(100),
    _desc text,
    _created datetime default current_timestamp,
    _key varchar(10),
    Primary Key(_id)
);

create table users(
	_id int auto_increment,
    _username varchar (60),
    _pswd varchar(20),
    _name varchar(100),
    _email varchar(100),
    _tel varchar(15),
    Primary Key(_id)
);

create table print(
	_id int auto_increment,
    _name varchar(100),
    _file varchar(100),
    _date datetime default current_timestamp,
    _priority int default 0,
    _user int,
    _status varchar(100),
    _project varchar(10) default "0",
    Primary Key(_id),
    Foreign Key (_user) references users(_id)
);

create table Project_user(
	_project int,
    _user int,
    foreign key (_project) references projects(_id),
    foreign key (_user) references users(_id)
)