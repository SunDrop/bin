#!/bin/bash
PROJECTS=(admin gtp-core mail mobile services social)

for ((i=0; i<${#PROJECTS[*]}; i++)); do
	cd /apps/nurkz/${PROJECTS[$i]}
	echo "status for " /apps/nurkz/${PROJECTS[$i]}
	git status
	echo -e "Done\n\n"
done
