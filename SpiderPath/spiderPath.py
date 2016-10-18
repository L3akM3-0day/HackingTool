#!/usr/bin/env python3
from bs4 import BeautifulSoup
import urllib.request

url = input('URL TO SPIDER : ')
print(url)
try:		
	html = urllib.request.urlopen(url)
except ValueError:
	print("Can't open url {}".format(url))
soup = BeautifulSoup(html,"html5lib")
print('BEGIN SPIDERING')
Followed = []
def getLink(soup):
	global Followed
	links = []
	for a in soup.find_all('a', href=True):
		try:
			if a['href'] not in Followed:
				print('URL FOUND : {}'.format(a['href']))	
				Followed.append(a['href'])
				if a['href'].startswith('/') or a['href'].startswith('?'):
					links.append(a['href'])
		except UnicodeDecodeError:
			pass
	for link in links:
		try:
			html = urllib.request.urlopen(url + link)
			Followed.append(link)
			soup = BeautifulSoup(html,"html5lib")
			getLink(soup)
		except:
			pass

getLink(soup)
