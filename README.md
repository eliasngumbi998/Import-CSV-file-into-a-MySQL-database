# Import-CSV-file-into-a-MySQL-database
Sometimes we might want to migrate our csv file/xlsx-file(s) into our database in order to work with them accordingly, php makes that possible. With regards to this, I have written a simple script to make that easier base on a request from a good friend of mine and I thought it wise to share it with the world. 1. Firstly unzip the project file and paste it in your htdocs if you're using xampp or www folder if you are using wamp or your server folder if any. 2. Locate a readMe text file 3. Copy the sql code in the readMe text file and run it in your mysql work bench or phpmyadmin. 4. Open your web browser and run the index.php file 5. Voila!!, you have successfully imported a csv file.


-- copy and run the code below in your phpmyadmin
=================================================

create database mycsv;

create table articles(
    id int(5) primary key auto_increment,
    int_value varchar(5),
    title varchar(70),
    msg text,
    created_at varchar(30),
    updated_at varchar(30)
);
