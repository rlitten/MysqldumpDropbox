# MysqldumpDropbox
Simple way to do a mysqldump and have it upload directly to Dropbox

This script was based on source code from the following sources:

https://github.com/jakajancar/DropboxUploader

https://daveismyname.com/backup-to-dropbox-with-php-bp

#Installation
Step 1: 
Login to: https://www.dropbox.com/developers/apps/create

Step 2: 
For the what type of app do you want to create. Choose Dropbox API app

Step 3:
Can your app be limited to its own folder? Choose Yes - My app only needs access to files it creates.

Step 4: 
Enter a unique app name and click Create app button

Step 5:
Under settings scroll down to the Oauth2 section and click the Generate Access Token button.
Copy this code down.

Step 6:
Open the MysqlToDropbox.php file and update this file as needed.
Make sure you set your Access Token you generated in Step 5, as well as your database credentials

Step 7:
Make sure your MysqlToDropbox.php file has execute (+x) permissions and then try to run script from command line
