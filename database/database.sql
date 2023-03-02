create database iot_led_pilot;
use iot_led_pilot;
create table leds(id primary key not null, status int);
insert into leds(id, status) values(0, 1);