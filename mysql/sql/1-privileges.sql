revoke all privileges on `webctf`.* from 'webctf'@'%';
grant SELECT ON `webctf`.* TO 'webctf'@'%';
flush privileges;
