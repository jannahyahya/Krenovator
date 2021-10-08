#!/usr/bin/env python
import sys
import mysql.connector
from time import *
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import I2C_LCD_driver
from smbus import SMBus
from mlx90614 import MLX90614
from increment import UpdateAttendance


bus = SMBus(1)
sensor = MLX90614(bus, address=0x5a)
reader = SimpleMFRC522()
mylcd = I2C_LCD_driver.lcd()
triggerPIN = 11
pin_rst = 14
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(triggerPIN,GPIO.OUT)
buzzer = GPIO.PWM(triggerPIN, 1000) # Set frequency to 1 Khz

try:
    connection = mysql.connector.connect(host="localhost",user="jannah",password="kentang",database="fyp")
        
    while True:
        if connection.is_connected():
            cursor = connection.cursor()
            record = cursor.fetchone()
        
                
            print("\n Place your tag ")
            mylcd.lcd_display_string(" Place your tag    ", 1,0)
            mylcd.lcd_display_string("       here        ", 2,0)
            
            id,text =  reader.read()
            print("ID: {}\n" .format(id,text))
            mylcd.lcd_display_string("{}   ".format(id) ,1,0)
            mylcd.lcd_display_string("             ", 2,0)
            
            if reader.read != 0 :
                buzzer.start(1) # Set dutycycle to 10
                sleep(1)
                buzzer.stop()
                
                #GPIO.setup(pin_rst,GPIO)
                sleep(5)
                #verify 
                print("Place your forehead to scan")
                mylcd.lcd_display_string("    Place your    \n ", 1, 0)
                mylcd.lcd_display_string("     forehead     \n", 2, 0)
                sleep(5)
                temp = sensor.get_object_1() 
                buzzer.start(1) # Set dutycycle to 10
                sleep(1)
                buzzer.stop()
                print ("temp : {}".format(temp) )
                
                mylcd.lcd_display_string(" Temperature: \n ", 1, 0)
                mylcd.lcd_display_string("     {}          ".format(temp), 2, 0)
                
                #inserting temperature
                print ("                                          ")
                UpdateAttendance(id,temp)
                
                if temp <= 37 :
                    print("Body temperature Normal and students allowed to enter")
                    mylcd.lcd_display_string("  Temp: Normal  \n", 1, 0)
                    mylcd.lcd_display_string("Student allowed \n", 2, 0)
                    sleep(5)
                else:
                    print("Body temperature Not Normal and students not allowed to enter")
                    mylcd.lcd_display_string("Temp:Not Normal  ", 1, 0)
                    mylcd.lcd_display_string("  Not Allowed    ", 2, 0)
                    buzzer.start(1)
                    sleep(10)


except Exception as e:
    print("13566! \n",e)

finally:
    sleep(5)
    GPIO.cleanup()
    bus.close()
    sys.exit()
