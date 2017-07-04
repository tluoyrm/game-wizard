/* insert imitation */
create table tmpItem1 select * from item where TypeID=8039011 and OwnerID=2
UPDATE tmpItem1 SET OwnerID=300, SerialNum=500089810450

DELIMITER $$

CREATE TRIGGER `sm_db`.`item_insert` BEFORE INSERT 
ON `sm_db`.`item` FOR EACH ROW 
BEGIN
  IF 
  (SELECT 
    `sm_db`.`account_common`.BaiBaoYuanBao 
  FROM
    `sm_db`.`account_common` 
    INNER JOIN `sm_db`.`roledata` 
      ON `sm_db`.`account_common`.AccountID = `sm_db`.`roledata`.AccountID 
  WHERE NEW.OwnerID = `sm_db`.`roledata`.RoleID) = 0 
  THEN SIGNAL SQLSTATE '01000' SET MESSAGE_TEXT = 'Error: insert row';
  
    END IF;
END$$

DELIMITER ;