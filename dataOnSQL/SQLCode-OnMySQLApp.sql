
CREATE TRIGGER TG_Full_Contract_INSERT_AUTOCODE
ON Full_Contract
FOR INSERT
AS 
BEGIN
DECLARE @ID INT,@Property_ID INT, @MAHD varchar(15), @ngay varchar(2), @Thang varchar(2), @Nam varchar(2) ,@MAX INT
set @ID = (select ID from inserted)
set @Property_ID = (select Property_ID from inserted)
set @Ngay=CONVERT(varchar(2),day(getdate()),2)
set @Thang=CONVERT(varchar(2),month(getdate()),2)
set @Nam=CONVERT(varchar(2),right(year(getdate()),2))
 IF EXISTS (SELECT 1 FROM Full_Contract where LEFT(Full_Contract_Code,2)=@MAHD)
	SET @MAX=(SELECT MAX(RIGHT(Full_Contract_Code,4))from Full_Contract) +1
else
	set @MAX = 1
set @MAHD = @Ngay+@Thang+@Nam+'FC'+format(@MAX,'0000')
update Full_Contract set Full_Contract_Code = @MAHD where ID = @ID
end
DROP TRIGGER TG_Full_Contract_INSERT_AUTOCODE