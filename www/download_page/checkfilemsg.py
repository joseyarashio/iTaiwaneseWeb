import os
import re
import sys
import datetime
import time


file_name="C:\AppServ\www\download_page\dictionary.py"
while(1):
    now=int(time.time())
    retime= int(os.path.getmtime(file_name))
    while int(time.time())==now:
        if not int(os.path.getmtime(file_name))== retime:
            retime= int(os.path.getmtime(file_name))
            print(datetime.datetime.fromtimestamp(retime).strftime('%Y-%m-%d %H:%M:%S'))
    now=int(time.time())
