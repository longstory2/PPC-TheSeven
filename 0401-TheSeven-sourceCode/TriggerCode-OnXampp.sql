CREATE TRIGGER `Full_Contract_THEAUTO` BEFORE INSERT ON `full_contract`
 FOR EACH ROW BEGIN
    SET @year_part = SUBSTRING(YEAR(NEW.Date_Of_Contract), 3, 2);
    SET @month_part = LPAD(MONTH(NEW.Date_Of_Contract), 2, '0');
    SET @new_number = LPAD(
            IFNULL(
                    (SELECT MAX(CAST(SUBSTRING(Full_Contract_Code, 7) AS UNSIGNED)) + 1 FROM full_contract
                    WHERE full_contract.Full_Contract_Code LIKE CONCAT( @year_part, @month_part,'FC', '%')),
                    1), 4, '0');
    SET NEW.Full_Contract_Code = CONCAT(@year_part, @month_part,'FC',@new_number);
END
