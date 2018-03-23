create table if not exists usuarios(
	id int(11) not null AUTO_INCREMENT,
    login varchar(255) not null,
    senha varchar(255) not null,
    status int(1) not null,
    nivel int(2) not null,
    
    PRIMARY KEY(id)  
);