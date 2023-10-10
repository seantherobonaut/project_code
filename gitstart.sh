#!/bin/bash

workingDir=$(pwd)

cd ~
DIRECTORY=$(pwd)$"/.ssh"
if [ ! -d "$DIRECTORY" ]; then
    mkdir .ssh
    cd .ssh
    touch mykey
    echo "-----BEGIN OPENSSH PRIVATE KEY-----" >> mykey
    counter=0
    numchars=${#SSH_KEY}
    while [ $counter -lt $numchars ]; do
    	echo ${SSH_KEY:$counter:70} >> mykey
    	let counter=counter+71
    done
    echo "-----END OPENSSH PRIVATE KEY-----" >> mykey
    chmod 600 mykey
else
    cd .ssh
fi

eval "$(ssh-agent -s)"
ssh-add mykey
git config --global user.name "Sean Leapley"
git config --global user.email "seantherobonaut@gmail.com"
git config --global merge.ff no
git config --global pull.ff yes

cd $workingDir
