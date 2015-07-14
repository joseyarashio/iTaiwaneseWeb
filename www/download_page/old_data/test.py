from LGO import *
import xml.etree.ElementTree as XmlET
import os
import urllib.request
import sys

t=XmlET.parse('datatemp.log')
r0=t.getroot()

