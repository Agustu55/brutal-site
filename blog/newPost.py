#!/usr/bin/env python3
from bs4 import BeautifulSoup
from datetime import datetime
from generatePost import generatePost
from pathlib import Path
import subprocess
import os
import time
import shutil
import codecs
import sys

source = '/var/www/gusdstevens.com/blog/posts'
blog_dir = Path('//var/www/gusdstevens.com/blog')
last_date_file = blog_dir / 'lastPost.txt'
files1 = os.listdir(source)
prevDate = datetime(2020,7,18)

print(last_date_file)

with open(last_date_file,'r') as date_file:
	contents = date_file.read()
	prevDate = datetime.strptime(str.rstrip(contents),'%Y-%m-%d %H:%M:%S')

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
	with open(last_date_file,'w') as new_date_file:
		new_date_file.write(str(postDate))
