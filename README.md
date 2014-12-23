simpleCounterJS
===============

A simple but bot-proof visitor counter.
It is based on the assumption, that a bot doesn't have a mouse nor a touch screen for browsing. 
There is a java event onmousemove/ontouchmove that triggers the counter to increase. A cookie prevents the counter to
count up rapidly.

Thanks to http://www.ffonts.net/Digital-Counter-7.font for the special font, I've used in my counter

Usage:
For statistic purposes there is a MySQL DB 'counter' needed. The table specs can be found in counter/logging.sql
There's no install process (yet), so you have to create the db manually and import the .sql file.
You have to change the full path to your counter.txt in line 47 of counter/counter.php
You have to change the username and password for the MySQL DB in line 65 of counter/counter.php

See demo at http://test.mitschke.at/countertest.html

Have fun!
