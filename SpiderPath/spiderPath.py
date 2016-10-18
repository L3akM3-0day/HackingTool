#!/usr/bin/env python3
from bs4 import BeautifulSoup
import urllib.request

url = input('URL TO SPIDER : ')
print(url)
try:
	html = urllib.request.urlopen(url)
except:
	print("can't open url")	
