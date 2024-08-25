# using SendGrid's Python Library
# https://github.com/sendgrid/sendgrid-python
import os
from sendgrid import SendGridAPIClient
from sendgrid.helpers.mail import Mail


def sendEmail(post_link, email_list):


    for email in email_list:
        message = Mail(
            from_email='gus@gusdstevens.com',
            to_emails=email,
            subject='New Blog Post',
            html_content='<strong>Hello! This is a notification from Gus that a new post is up!!</strong><br><p>Check it out here: <a href=' + post_link + '>' + post_link + '</a>'
        )

        sg = SendGridAPIClient(os.environ.get('SENDGRID_API_KEY'))
        try:
            response = sg.send(message)
            print(response.status_code)
            print(response.body)
            print(response.headers)
        except Exception as e:
            print("email failed for " + email)
            print(e)
 
