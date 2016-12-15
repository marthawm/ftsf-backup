## Setting up the prerequisites for this Project

To run the project you'll need to have NodeJS and Ruby installed

### Windows & Mac
[NodeJS Download](https://nodejs.org/en/download/)   
[Ruby Download](http://railsinstaller.org/en) (This comes preinstalled on Mac so install this for windows only)


### Linux
Intall NodeJS and Ruby via the command line:   
```sudo apt-get install node```, ```sudo apt-get install nodejs-legacy``` & ```sudo apt-get install ruby```



## Docker Setup Windows & Mac (Virtualization required)
The Windows IP of wordpress is: *wordpress:8080*  

### 0. Check if Virtualization technology is enabled (Intel VT-d VT-x / AMD-V)   
*If you know that your CPU supports virtualization, skip this*

#### Windows 7 - 10
You can check if this is enabled on the (CPU) performance tab in Task manager.   
![](http://i.imgur.com/o1nf7Hv.png)   
If this option says *Enabled* you're good to go, if it says *Disabled* go into your BIOS settings and change the virtualization option to enabled. The option is normally called *Virtualization Technology*, *Intel VT-d*, *Intel VT-x* or *AMD-V*. If you have can find both the Intel settings in your BIOS, enable them both for best performance.

#### Other Operating Systems
Check your BIOS Settings to check if your system supports virtualization or follow the rest of the guide and see if it works.

*If you DO have visualization enabled --> You can either use Docker or Xampp*   
*If you DON'T have visualization enabled --> follow the steps for Xampp*

### 1. Cloning the project
- if you will be using docker, start by cloning the project in the desired folder by opening a terminal in that folder and running: ```git clone https://github.com/Competa-IT/ftsf.eu.git```
- If you will be using XAMPP, install xampp first accordiing to the steps below.

## XAMPP Setup (No Virtualization)

### 1.2 Installing Xampp:
Start by downloading XAMPP: [XAMPP Download](https://www.apachefriends.org/index.html)   

Run the .EXE file you recieved from the download.  
You may or may not get an error message , ignore this and just press ok.  
Click next.  
You see a drop-down chart , check everything if it isn't by default then click next.  
Next you need to select a file, try to leave this to C:\xampp then click next.  
You see a checkbox to learn more about Bitnami, uncheck this if you don't want emails , press next.  
Now it says it's ready to install so press next again.  
Once it's done installing you might get a message saying your firewall is blocking it so check the private network one and continue.  
Now you have Xampp installed.

### 2. Configure Xampp:
Start up Xampp.   
In the top right you see the word *config* with a wrench infront of it.   
Next click on *Service and Port Settings*.  
Change the main port to the port you are going to use , we recommend *8080*.

##### 2.1 Apache:
Click on the config next to Appache.  
Choose *(Appache) httpd.conf*.  
Open it with notepad or notepad++, this doesn't matter.  
Press ctrl+f and search for *Listen 80*.  
Change the *80* to whatever port you are using for your project or add a new line: Listen 8080

Click on start next to Apache to see if it works. (The name will be in a green bar

##### 2.2 MySQL:
Just click start behind it.

##### 2.3 FileZilla, Mercury, Tomcat:
DO NOT USE THIS FOR THIS PROJECT.  
So do not press start.

##### 2.4 Clone project
Navigate in your terminal to your htdocs folder (YOUR:/PATH/xampp/htdocs for example) and run: ```git clone https://github.com/Competa-IT/ftsf.eu.git```

### 3. Wordpress:
Start by downloading Wordpress: [Wordpress Download](https://nl.wordpress.org/)

Go to *C:/xampp/htdocs* or your assigned path.

Drag your .Zip file in this place and extract it.
### 3.1 Install the npm module folder on the ftsf project
Open a terminal in the projects folder and run: ```npm install --global gulp```.
then run: ``npm install```.
and finally run: ``gulp``.
This should install all the needed dependencies.
### 4. Insert the project

##### 4.1 For Linux / Mac
Go into the main xampp folder and open the terminal.
Type this: ```git clone https://github.com/Competa-IT/ftsf.eu.git temp```   
then ```cp temp/. htdocs/ftsf.eu -R```   
now delete the temp directory by using: ```rm -R temp```   
After this it is asking you to type yes or no. Type *yes*

### 5. Install dependencies
Open a terminal in the projects folder and run: ```npm install```.   
This should install all the needed dependencies.

### 6. Configuring wordpress
1. go to your `htdocs` folder
2. Go to your 'ftsf.eu' folder
2. open the `wordpress` folder
3. locate the `wp-config-sample.php`
4. make a copy of that, and rename it to `wp-config.php`
5. open the newly created `wp-config.php` file, and change the following values of variables:`DB_NAME` to `ftsf.eu` and `DB_USER` to `root` and 'DB_PASSWORD' to ''
6. save that file
7. Open your browser and navigate to `localhost:8080/phpmyadmin`
8. on the left sidebar/menu, make a new database and name it `ftsf.eu`
9. In the new db, click import in the middle of the screen
10. import the database file in the git repository (ftsf_eu.sql) and click 'OK' at the bottom (no need to change settings)
11. proceed to `localhost:8080/ftsf.eu/wordpress` and follow the setup.
11.1. choose 'admin' as username and 'admin' as password, 'ftsf.eu' as db name, and 'lol@lol.lol' as email adress 

### 7. get project running
1. go back to the terminal in your ftsf.eu folder
2. run 'gulp'
3. go to localhost:8080/ftsf.eu/wordpress/wp-admin
4. run neccessary updates if needed
5. activate all plugins!

## Docker Setup
### 2. Install Docker Toolbox
Docker toolbox is needed to run docker on windows pc's. you can download it here: [Docker Toolbox Download](https://www.docker.com/products/docker-toolbox)   
On the components screen in the installer, you can disable VirtualBox if you have this installed already and you can check git if you do not have it installed already (git is required to run docker toolbox), leave everything else as is. 

### 3. Start Docker
Now we can start docker. You will need to do this every time you want to (re)start docker.   
Start by opening *git Bash* **AS ADMIN**.     

Then, in the bash prompt open the *docker* folder in the project by using ```cd [Path of folder]```. (Example: ```cd D:/Users/Nick/Documents/Stage/Projects/Competa-IT/ftsf.eu/docker```)   
Next execute the docker script by typing ```sh start-docker-containers.sh --clean --install```.

After a minute or so it will ask you to enter the path to your *wp-content* folder, enter the absolute path. (Example: ```D:/Users/Nick/Documents/Stage/Projects/Competa-IT/ftsf.eu/wordpress/wp-content```)   

After that it will ask you for the path to your *Oracle VM VirtualBox* install. If you didn't change this from the default installation leave it empty. If you did change it, fill in the absolute path of the installation folder. (Example: ```C:\Program Files\Oracle\VirtualBox```) 
  
Now you should have everything up and running!

###### Extra Info on the script parameters

The `--clean` parameter will remove all the old docker container data, you will only have to run this when you are experiencing some kind of issue with the current containers.   
The `--install` parameter installs all dependencies so you'll only have to add this whenever the dependencies are updated.   
The `--restart` parameter restarts the docker VM if you have trouble running it.  
The `--reinstall` parameter completely removes the docker VM and re-installs it. You can use this if you have trouble getting the VM to run and the `--restart` doesn't fix this.

  

### 4 Place VM Disk in a different location (optional)

If you want you can place the the VM's disk in another location. To do this open *Oracle VM VirtualBox* and go to to the Storage tab in the VM's Settings and remove the attachment: *disk.vmdk*. Next Open Virtual Media Manager.   


In the Virtual Media Manager select the *disk.vmdk* and click remove. In the first popup press remove again to confirm your choice. In the second popup press **Keep**. We want to reallocate the disk, not completely delete it.   

Now find the *disk.vmdk* in your file explorer and copy it to the location you want. Then go back to the storage settings of your VM and press *add Hard Disk*. Select *Choose existing disk* and then select *disk.vmdk* again. Now the docker VM should be up and running on another hard drive!  


## Docker Setup Linux (No Virtualization)
The Linux IP of wordpress is: *localhost:8080*   
*NOTE: If you don't have the permissions to run any of the commands run them in superuser mode by running ```sudo -i```*

### 1. Cloning the project
Start by cloning the project in the desired folder by opening a terminal in that folder and running: ```git clone https://github.com/Competa-IT/ftsf.eu.git```

### 2. Install Docker and Docker-compose
Start by opening your terminal and verifying if you have *curl* installed by running ```which curl```.
If curl isn't installed, install it after updating your manager: 
```sudo apt-get update``` & ```sudo apt-get install curl```.   

You can install the docker package by running:   
```curl -fsSL https://get.docker.com/ | sh```.   
After that install docker-compose by running: ```curl -L https://github.com/docker/compose/releases/download/1.7.0/docker-compose-`uname -s`-`uname -m` > /usr/local/bin/docker-compose``` and apply the executable permissions to the binary with the command:   
```chmod +x /usr/local/bin/docker-compose```   

Now we can test if they are properly installed by running: ```docker version``` and ```docker-compose version```  
 
### 3. Start Docker containers
In the terminal, open the docker folder in the project by using ```cd [Path of folder]```. (Example: ```cd /home/administrator/Documents/Projects/ftsf.eu/docker```)  
Next execute the docker script by typing ```sh start-docker-containers.sh --clean --install```.
  
The ```--clean``` tag will remove all the old docker container data, you will only have to run this when you are experiencing some kind of issue with the current containers.   
The ```--install``` tag installs all dependencies so you'll only have to add this whenever the dependencies are updated.  
Now you should have everything up and running!  
---
## linux lamp setup  
#### (LINUX, APACHE, MYSQL AND PHP)  
# 1. APACHE installation  
To install apache, open terminal and type in these commands:  
`sudo apt-get update`  
`sudo apt-get install apache2`  
you can check the version of your apache2 by running  
`$ apache2 -v` in the terminal. 
change directory into the `html` folder by typing in the terminal:  
`cd /var/www/html`  
and then typing `rm index.html`  to remove the html index.


# 2.MYSQL installation  
MySQl is a powerful database management System.  
to install it open terminal and run the following command:  
`sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql`  
ensure to set a mysql root password that you can remember easily.  
Once you have installed MySQL, we should activate it with this command  
`sudo mysql_install_db`  
# 3. PHP installation  
php is used to develop dynamic web pages.  
to install it, run the following command in the terminal.  
`sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt`  
you can check the version you have by typing this in your terminal:  
`php -v `  
### FTSF installation  
change to the following directory by typing in the terminal  
```$ cd /var/www/```   
directory and run the following command  in that directory.
`sudo chmod 777 html`  
then provide your user password in order to change the permissions of the folder.
now change into the `html`folder by typing `cd /html`.  
now we are ready to clone the ftsf project into this folder.  
## cloning the project 
you need to have git installed in your machine so install it by running this in terminal.  
`sudo apt-get install git`  
after it is installed.  
run this command:  
```git clone https://github.com/Competa-IT/ftsf.eu.git```  
### installing gulp
after cloning, change directory into the ftsf folder by running this command:
`cd ftsf.eu`
node packet manager is required to use this service.  
you get it by running the following command:  
```sudo apt-get install node```  
```sudo apt-get install nodejs-legacy```  
 `npm install`  
 `$ gulp`,  
if it does not work, you could install the individual gulp package by running:  
`npm un -g gulp && npm un gulp`  
 `npm i -g gulp`  
 `npm i --save-dev gulp `  
 then run `$ gulp` 
 ### set up the wordpress 
 download the latest wordpress by downloading the compressed folder into the `ftsf.eu`  
 by typing this into the terminal `wget http://wordpress.org/latest.tar.gz`  
 extract the folder by running `tar xzvf latest.tar.gz`  
 as soon as the extraction is done.   
 change the directory into the wordpress folder by typing `cd /wordpress`   
 once in this folder. you need to configure the wordpress database.  
 run this command:  
 `cp wp-config-sample.php wp-config.php`  
 then  
 `nano wp-config.php` to configure the database information.  
 Change the following values of variables:`DB_NAME` to `ftsf.eu` and `DB_USER` to `root` and `DB_PASSWORD` to `[mysql_root_password]`  
 save that file.
 you now need to open a select browser and navigate to the phpmyadmin page.
 create a database and import data from the ftsf folder.   
 the database is named ftsf_eu.sql 
 after importing, click the database and scroll to the wp_option.  
 edit the site_url and home option value entries with the url : http://localhost/ftsf.eu/wordpress/  
 this is because the port number need not be specified in this case.  
 after this step, your wordpress should be set up.  
if you enter http://localhost/ftsf.eu/wordpress/ in your browser, it should take you to the ftsf site.  

 
 
 
 





