# setup de la base de donnée:
# pip3 install mysql-connector-python

import mysql.connector
import sys
#from rfm9 import send

try:
  database = mysql.connector.connect(
    host="127.0.0.1",
    user="root",
    password="1234",
    database="iot_led_pilot",
  )

  cursor = database.cursor()

  if sys.argv[1] == "1":
      cursor.execute("update leds set status = 1 where id = 1") 
      #send("on");
  else:
      cursor.execute("update leds set status = 0 where id = 1")
      #send("off");

  database.commit()

except:
  print("error")
