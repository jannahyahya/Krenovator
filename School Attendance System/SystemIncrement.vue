 /*import mysql.connector
from datetime import datetime 


monthlist=["","January","February","March","April","May","June","July","August","September","October","November","December",""]
#UPDATE `Att_Student` SET `April`=April+1 WHERE `RFIDID`="A1B2C3D5"
connection = mysql.connector.connect(host="localhost",user="jannah",password="kentang",database="FYP")
def UpdateAttendance(id,temp):
    cursor = connection.cursor()
    month=datetime.now().month
    sqlcommand = "UPDATE `Att_Student` SET `{}`={}+1 ,`DateUpdated`=now() WHERE RFIDID=\"{}\" AND `DateUpdated` != CURRENT_DATE() ".format(monthlist[month],monthlist[month],id)
    print(sqlcommand)
    cursor = connection.cursor()
    cursor.execute(sqlcommand)
    
    sqlcommand = "UPDATE `Att_Student` SET `Temp_Updated`= {} WHERE RFIDID=\"{}\" " .format(temp,id)
    
    cursor = connection.cursor()
    cursor.execute(sqlcommand)
    
    connection.commit()
    return (cursor.rowcount)

if __name__ =="__main__":
    x=UpdateAttendance("A1B2C3D5",39.9) 
    if(x==1):
        print("Student is valid")
    else:
        print("No student found in DB") */
