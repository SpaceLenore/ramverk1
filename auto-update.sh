#!/bin/sh
echo "\e[1m**STARTING LISTENER**\e[0m"
# DIRECTORY YOU WANT TO MONITOR
dir1=./theme/
# YOUR BUILD COMMAND (EXECUTED ON SAVE)
cmd="make theme"

# CHECK TO MAKE SURE PACKAGE IS INSTALLED
PKG_OK=$(dpkg-query -l inotify-tools | grep "Version") > /dev/null
    if [ -z "$PKG_OK" ]; then
        echo "The package inotify-tools is not installed."
        exit 1
    else
        echo "\e[32m\e[1m**LISTENER STARTED**\e[0m\e[49m"
    fi
# LOOP FOR AUTOMATING - RUNS ON SAVE
while inotifywait -qqre modify "$dir1"; do
    echo "\e[33m\e[1m**STARTING BUILD**\e[0m\e[49m"
    eval $cmd
    echo "\e[33m\e[1m**DONE**\e[0m\e[49m"
done
