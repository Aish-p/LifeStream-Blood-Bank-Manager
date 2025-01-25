DELIMITER $$
CREATE TRIGGER aft_d
AFTER INSERT
ON Donation FOR EACH ROW
BEGIN

SELECT p_id, new.d_quantity ,max(d_date) d_date INTO @p_id ,@d_quantity ,@d_date
FROM DONATION 
WHERE p_id = new.p_id
GROUP BY p_id;

UPDATE Stock SET s_quantity = s_quantity + @d_quantity where Stock.s_blood_group = (select p_blood_group FROM Person where p_id = @p_id);

END $$
DELIMITER ;

