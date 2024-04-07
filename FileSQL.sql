


CREATE TABLE gallery( 
    id int(11) AUTO_INCREMENT PRIMARY KEY not null, 
    userId int(11) not null, 
    pTitle LONGTEXT not null, 
    pDesc LONGTEXT not null,
    fDestination LONGTEXT not null,
    pOrder LONGTEXT not null
);