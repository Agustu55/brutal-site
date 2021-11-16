#!/usr/bin/env python3
from bs4 import BeautifulSoup
from datetime import datetime
import calendar
import subprocess
import os
import time
import shutil
import codecs
import sys

#this is the code that will create the post on main and archive on archive
def generatePost(prevDate, fullf):
	# with the new file need to remove the title, date and first paragraph then edit the main.html
	with open(fullf) as fp:
		soup = BeautifulSoup(fp, "html.parser")
		title = str(soup.find("p", class_="title").text)
		date = str(soup.find("p", class_="date").text)
		intro = str(soup.find_all("p")[2].text)
		image = str(soup.find_all("img")[0]).replace("../","")

	postNum = fullf.split(os.path.sep)[-1]
	thumbnail = '              <!-- edit -->\n' + '              <li>\n' + '                ' + '<a href=posts/' + postNum +'>' + image + '\n' + '                <p class="title"> <a href=posts/' + postNum +'>' + title +'</a></p>\n'  + '                <p class="date">' + date + '</p>\n' + '                <p class="intro">' + '                ' + intro.replace("\n", "") + '</p>\n' + '              </li>\n'


	## update main.html
	# open the main.html file and read to contents variable
	with open("/var/www/gusdstevens.com/blog/main.html", "r") as f:
		contents = f.readlines()
	index = contents.index("              <!-- edit -->\n")
	# update the edit value (index) to be the thumbnail value
	contents[index] = thumbnail

	with open("/var/www/gusdstevens.com/blog/main.html", "w") as f:
	    contents = "".join(contents)
	    f.write(contents)


	# for the archive we need to figure out the post date
	postDate = datetime.strptime(date, '%B %d %Y')
	day = postDate.day
	print("post date " + str(postDate))
	print("prev date " + str(prevDate))

	with open("/var/www/gusdstevens.com/blog/archive.html","r") as f:
		contents = f.readlines()
	# if postDate month is greater than current month I need to make a new month div in the list
	if (postDate.year >= prevDate.year) and (postDate.month > prevDate.month):
		print("post month is greater than last month. Creating new month field")
		index = contents.index("          <!-- month edit -->\n")
		archiveText = '          <!-- month edit -->\n' + '          <p class="month">' + calendar.month_name[postDate.month].upper() +' '+ str(postDate.year) + '</p>\n' + '            <ul>\n' + '              <!-- day edit -->\n' + '              <li>\n' + '                <p class="day">' + str(postDate.day) + ' - <a href=posts/' + postNum +'>' + title +'</a></p>\n' + '              </li>\n' + '            </ul>\n'
	else:
		print("in the same month as last one")
		index = contents.index("              <!-- day edit -->\n")
		archiveText = '              <!-- day edit -->\n' + '              <li>\n' + '                <p class="day">' + str(postDate.day) + ' - <a href=posts/' + postNum +'>' + title +'</a></p>\n' + '              </li>\n'

	contents[index] = archiveText

	with open("/var/www/gusdstevens.com/blog/archive.html", "w") as f:
	    contents = "".join(contents)
	    f.write(contents)

	print("wrote archive text")
	return postDate
