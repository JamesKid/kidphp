ALTER TABLE `vimkid_visitin` DROP `visit_id`;   
ALTER TABLE `vimkid_visitin` ADD `visit_id` MEDIUMINT( 9 ) NOT NULL FIRST;  
ALTER TABLE `vimkid_visitin` MODIFY COLUMN `visit_id` MEDIUMINT( 9 ) NOT NULL AUTO_INCREMENT,ADD PRIMARY KEY(visit_id); 

