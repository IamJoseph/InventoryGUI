# InventoryGUI
An inventory form with a visual representation of the data

FYI there is a MySQLi trigger set for the table data before insertion that adds a middle and end date depending on the date the user chose on the form.  It is as follows: 
BEGIN
SET NEW.middleDate = TIMESTAMPADD(DAY,12,NEW.date);
SET NEW.endDate = TIMESTAMPADD(DAY,15,NEW.date);
END