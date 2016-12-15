#!/usr/bin/env bash

BASE_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
STATUS="$(docker-machine status 2>/dev/null)"
cd ${BASE_DIR}

function install {

	#Start the docker VM if it isnt enabled yet
	if [ "$(docker-machine status 2>/dev/null)" != "Stopped" ] && [ "$(docker-machine status 2>/dev/null)" != "Running" ] && [ "$OSTYPE" != "linux-gnu" ]; then
		docker-machine create --driver virtualbox --virtualbox-memory 512 default
		
		echo "Please enter the path to your wp-content folder:"
		read -r WP_CONTENT
		
		if [ "$OSTYPE" = "msys" ]; then
			echo "Please enter the path to your VirtualBox installation: (Leave this empty if unchanged. default = C:\Program Files\Oracle\VirtualBox)"
			read -r VBOX

			if [ "$VBOX" = "" ]; then
				VBOX="C:\Program Files\Oracle\VirtualBox"
			fi
			docker-machine stop default
			"$VBOX\VBoxManage" sharedfolder add "default" --name "win_share" --hostpath "$WP_CONTENT"
		fi

		if [ "$OSTYPE" = "darwin15" ]; then
			echo "Please enter the path to your VirtualBox.app: (Leave this empty if unchanged. default = /Applications/VirtualBox.app)"
			read -r VBOX

			if [ "$VBOX" = "" ]; then
				VBOX="/Applications/VirtualBox.app"
			fi
			docker-machine stop default
			"$VBOX/Contents/MacOS/VBoxManage" sharedfolder add "default" --name "win_share" --hostpath "$WP_CONTENT"
		fi
	fi
		
	if [ "$(docker-machine status)" = "Stopped" ]; then
		docker-machine start default
	fi
}

install

# Transform long options to short ones
for arg in "$@"; do
    shift
    case "$arg" in
        	"--clean")
            set -- "$@" "-c"
          ;;
			"--install")
            set -- "$@" "-i"
          ;;
			"--restart")
            set -- "$@" "-r"
          ;;
		  	"--reinstall")
            set -- "$@" "-m"
          ;;
    esac
done

# Parse short options
while getopts "cirm" opt
    do
		if [ "$OSTYPE" != "linux-gnu" ]; then
			eval $(docker-machine env default)
		fi
        case "$opt" in
            "c")
				echo "Deleting old containers"
				#{
					docker rm -f $(docker ps -a -q) 
					docker rmi -f $(docker images -q)
				#} &> /dev/null
            ;;
            "i")
				#Install dependencies
				cd ..
				npm install
				npm install --global gulp-cli
            ;;
		    "r")
				if [ "$OSTYPE" != "linux-gnu" ]; then
			    	#Restart docker machine
					docker-machine restart default
				else
					echo "This command doesn't work on this OS"
				fi
			;;
			"m")
				#Reinstall docker-machine
				if [ "$OSTYPE" != "linux-gnu" ]; then
					if [ "$(docker-machine status 2>/dev/null)" = "Running" ]; then
						docker-machine stop default
					fi
					
					if [ "$(docker-machine status 2>/dev/null)" = "Stopped" ]; then
						docker-machine rm -f default
					fi
					install
				else
					echo "This command doesn't work on this OS"
				fi
				
			;;
        esac
        cd ${BASE_DIR}
done

#Don't run on Linux
if [ "$OSTYPE" != "linux-gnu" ]; then
	#Create and mount shared folders in Boot2Docker VM
	docker-machine ssh default 'sudo mkdir /VM_share' &> /dev/null
	docker-machine ssh default 'sudo mount -t vboxsf win_share /VM_share'
	eval $(docker-machine env default)
fi

#Add docker-machine IP to hosts file for Windows
if [ "$OSTYPE" = "msys" ]; then
	#Run command to check permission level
	net session &> /dev/null 2>&1
	
	if [ $? = 0 ]; then
		sed -i".bak" '/wordpress/d' C:/Windows/System32/drivers/etc/hosts
		echo "$(docker-machine ip) wordpress" >> C:/Windows/System32/drivers/etc/hosts
	else
		echo "Current permissions inadequate. Please run script again as Administrator to add IP to hosts file."
	fi
fi

#Add docker-machine IP to hosts file for Mac
if [ "$OSTYPE" = "darwin15" ]; then
	sudo sed -i".bak" '/wordpress/d' /private/etc/hosts
	echo "$(docker-machine ip) wordpress" | sudo tee -a /private/etc/hosts &> /dev/null
fi

#Run Docker Compose
echo "Starting docker containers"
docker-compose up -d

#Copy wordpress config into wordpress container but remove HOME and URL when not on windows
if [ "$OSTYPE" = "linux-gnu" ]; then
	echo "Copying wp-config.php for Linux"
	mkdir temp
	cp config/wp-config.php temp/wp-config.php
	sed -i '/The URL of the wordpress website/d' ./temp/wp-config.php
	sed -i '/WP_HOME/d' temp/wp-config.php
	sed -i '/WP_SITEURL/d' temp/wp-config.php
	docker cp temp/wp-config.php docker_wordpress_1:/var/www/html/wp-config.php
	rm -f -r temp
else
	echo "Copying wp-config.php for Windows & Mac"
	docker cp config/wp-config.php docker_wordpress_1:/var/www/html/wp-config.php
fi

#Import database dump
#echo "Importing database"
#sleep 15s
#docker exec -i docker_mysql_1 mysql -uroot -pfairtrade wordpress < ../data/wordpress-db-dump.sql

#Run gulp
gulp

#Kill all containers
#docker kill $(docker ps -a -q)
