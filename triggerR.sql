DELIMITER $$
CREATE TRIGGER aft_r
AFTER INSERT
ON RECEIVE FOR EACH ROW
BEGIN


SELECT r_blood_group, r_quantity ,max(r_date) r_date INTO @r_blood_group ,@r_quantity ,@r_date
FROM RECEIVE 
WHERE r_blood_group = new.r_blood_group
GROUP BY r_blood_group;


update  Stock SET s_quantity = s_quantity - @r_quantity where s_blood_group = new.r_blood_group;
END $$
DELIMITER ;

