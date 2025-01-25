DELIMITER $$
CREATE procedure Donors(IN b_type varchar (3))
BEGIN
DELETE FROM Donor_list;
INSERT INTO Donor_list 
SELECT p_id, p_name, p_blood_group, p_phone
FROM person
WHERE p_blood_group = b_type AND p_med_issues like 'n%';

END;$$
DELIMITER ;

