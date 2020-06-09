/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  thanhnc
 * Created: May 16, 2020
 */

create table items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    modified_date datetime
);

insert into items values (1, 'item 1', now());
insert into items values (2, 'item 2', now());
insert into items values (3, 'item 3', now());