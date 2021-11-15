#!/usr/bin/env python3
from bs4 import BeautifulSoup
from datetime import datetime
from generatePost import generatePost
import subprocess
import os
import time
import shutil
import codecs

source = "/var/www/gusdstevens.com/blog/posts"
files1 = os.listdir(source)
prevDate = datetime(2020,7,18)

while True:
	time.sleep(4)
	files2 = os.listdir(source)
	# get new files
	new = [f for f in files2 if f not in files1]
	#if there is a file
	for f in new:
		if f.endswith(".html"):
			print("new html file")
			f="posts/" + f
			fullf = os.path.join(source,f)
			print(fullf)
			postDate = generatePost(prevDate, fullf)
			# # with the new file need to remove the title, date and first paragraph then edit the main.html
			# with open(fullf) as fp:
			# 	soup = BeautifulSoup(fp, "html.parser")
			# 	title = str(soup.find("p", class_="title").text)
			# 	date = str(soup.find("p", class_="date").text)
			# 	intro = str(soup.find_all("p")[2].text)
			# 	image = str(soup.find_all("img")[0]).replace("../","")
			#
			# thumbnail = '              <!-- edit -->\n' + '              <li>\n' + '                ' + image + '\n' + '                <p class="title"> <a href="' + f +'">' + title +'</a></p>\n'  + '                <p class="date">' + date + '</p>\n' + '                <p class="intro">' + '                ' + intro.replace("\n", "") + '</p>\n' + '              </li>\n'
			#
			#
			# ## update main.html
			# # open the main.html file and read to contents variable
			# with open("/var/www/gusdstevens.com/blog/main.html", "r") as f:
			# 	contents = f.readlines()
			# index = contents.index("              <!-- edit -->\n")
			# # update the edit value (index) to be the thumbnail value
			# contents[index] = thumbnail
			#
			# with open("/var/www/gusdstevens.com/blog/main.html", "w") as f:
			#     contents = "".join(contents)
			#     f.write(contents)
			#
			# # for the archive we need to figure out the post date
			# postDate = datetime.strptime(date, '%B %d %Y')
			# day = postDate.day
			# print("post date " + str(postDate))
			# print("prev date " + str(prevDate))
			#
			# with open("/var/www/gusdstevens.com/blog/archive.html","r") as f:
			# 	contents = f.readlines()
			# print(contents)
			# # if postDate month is greater than current month I need to make a new month div in the list
			# if (postDate.year >= prevDate.year) and (postDate.month > prevDate.month):
			# 	print("month is greater than last month. Creating new month field")
			# 	index = contents.index("          <!-- month edit -->\n")
			# 	archiveText = '          <!-- month edit -->\n' + '          <p class="month">CODE MONTH 2020</p>\n' + '            <ul>\n' + '              <!-- day edit -->\n' + '              <li>\n' + '                <p class="day">20 - <a href="posts/1.html"> CODE POST</a></p>\n' + '              </li>\n' + '            </ul>\n'
			# else:
			# 	print("in the same month as last one")
			# 	index = contents.index("              <!-- day edit -->\n")
			# 	archiveText = '              <!-- day edit -->\n' + '              <li>\n' + '                <p class="day"> 20 - <a href="posts/1.html"> CODE POST</a></p>\n' + '              </li>\n'
			#
			# contents[index] = archiveText
			#
			# with open("/var/www/gusdstevens.com/blog/archive.html", "w") as f:
			#     contents = "".join(contents)
			#     f.write(contents)
			#
			# print("wrote archive text")
			prevDate = postDate


	files1 = files2
