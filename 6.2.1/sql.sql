CREATE TABLE comments (
	cid int(11) not null AUTO_INCREMENT PRIMARY KEY,
    uid varchar(128) not null,
    date datetime not null,
    username varchar(128) not null,
    useremail varchar(128) not null,
    userhomepage varchar(128) not null,
    message TEXT not null
);