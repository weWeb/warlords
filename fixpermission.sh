#! /bin/sh

DIRECTORY1=app/cache
DIRECTORY2=app/logs

if  [ ! -d "$DIRECTORY1" ]; then
	mkdir "$DIRECTORY1"
fi
if  [ ! -d "$DIRECTORY2" ]; then
        mkdir "$DIRECTORY2"
fi
 
sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx "$DIRECTORY1" "$DIRECTORY2"
sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx "$DIRECTORY1" "$DIRECTORY2"

	
