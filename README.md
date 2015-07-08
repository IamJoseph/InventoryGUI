# InventoryGUI
An inventory form with a visual representation of the data

When a user selects "New Batch" a form is created that allows the user to enter in various information pertaining to creating Kombucha.  When the form is submitted to the database it refreshes the data on screen with an image representative of the table data.  When a certain amount of time passes the images change color to remind the user to check on the kombucha "batches".  If the user has "harvested the batch" they can simply double click on the image of the harvested batch to remove it from the screen.   

FYI there is a MySQLi trigger set for the table data before insertion that adds a middle and end date depending on the date the user chose on the form.  It is as follows: 
BEGIN
SET NEW.middleDate = TIMESTAMPADD(DAY,12,NEW.date);
SET NEW.endDate = TIMESTAMPADD(DAY,15,NEW.date);
END

To get an idea of what it looks like just visit my website: www.joeireland.com