#!/bin/bash

newline="* 1 * * * /usr/bin/php /var/www/warlords/app/console WarlordsGameBundle:ResourceUpdate 2>~/crontab.log"
(crontab -l; echo "$newline") | crontab
