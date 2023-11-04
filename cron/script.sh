#!/bin/sh

# Delete all files inside /upload/ and create a file monitored by healthcheck only if successful
rm  -rf -v /upload/* && touch /healthcheck_file
