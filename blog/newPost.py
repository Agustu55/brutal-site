#!/usr/bin/env python3
from bs4 import BeautifulSoup
from datetime import datetime
from generatePost import generatePost
from sendEmail import sendEmail
from pathlib import Path
import subprocess
import os
import mysql.connector
from mysql.connector import Error
import time
import shutil
import codecs
import sys


def handle_new_post(f, prevDate):

	print("file passed in is:")
	print(f)

	#if the file is html or php
	if ( f.endswith(".html") or f.endswith(".php") ):
		print("new html file")
		fullf = os.path.abspath(sys.argv[1])
		print(fullf)

		postDate = generatePost(prevDate, fullf)
		with open(last_date_file,'w') as new_date_file:
			new_date_file.write(str(postDate))

def send_email_notification(post_link):
	try:
		connection = mysql.connector.connect(
			host='localhost',
			database='blog',
			user='gusdstevens',
			password='web'
		)
		sql = "select email from post_notifications"
		cursor = connection.cursor()
		cursor.execute(sql)

		records = cursor.fetchall()
		email_list = [row[0] for row in records]
		print("emails in post_notifications:")
		print(email_list)
		
		sendEmail(post_link, email_list)

	except Error as e:
		print("error when reading data from database", e)
	finally:
		if connection.is_connected():
			connection.close()
			cursor.close()
			print("MySQL connection was closed")

if __name__=="__main__":
	print("in main, handling the new post")

	source = '/var/www/gusdstevens.com/blog/posts'
	blog_dir = Path('//var/www/gusdstevens.com/blog')
	last_date_file = blog_dir / 'lastPost.txt'
	# files1 = os.listdir(source)
	prevDate = datetime(2020,7,18)

	print(last_date_file)

	with open(last_date_file,'r') as date_file:
		contents = date_file.read()
		prevDate = datetime.strptime(str.rstrip(contents),'%Y-%m-%d %H:%M:%S')
	
	# files2 = os.listdir(source)
	# get new file from the paramater passed in
	f = sys.argv[1]
	print(f)
	full_name = os.path.basename(f)
	file_name = os.path.splitext(full_name)
	post_num = file_name[0]
	post_link = 'https://www.gusdstevens.com/blog/posts/' + str(post_num)
	print(post_link)
	
	handle_new_post(f, prevDate) 
	# send_email_notification(post_link) 
