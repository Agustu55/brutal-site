#!/usr/bin/env python3
from bs4 import BeautifulSoup
from datetime import datetime
from generatePost import generatePost
import subprocess
import os
import time
import shutil
import codecs
import sys

source = "/var/www/gusdstevens.com/blog/posts"
files1 = os.listdir(source)
prevDate = datetime(2020,7,18)

with open('/var/wwww/gusdstenves.com/blog/lastPost.txt','r') as date_file:
	contents = date_file.read()
	prevDate = datetime.strptime(str.rstrip(contents),'%Y-%m-%d')


files2 = os.listdir(source)
# get new file from the paramater passed in
f = sys.argv[1]

print("file passed in is:")
print(f)

#if the file is html
if f.endswith(".html"):
	print("new html file")
	fullf = os.path.abspath(sys.argv[1])
	print(fullf)

	postDate = generatePost(prevDate, fullf)
	prevDate = postDate
