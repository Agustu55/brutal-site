# using SendGrid's Python Library
# https://github.com/sendgrid/sendgrid-python
import os
from sendgrid import SendGridAPIClient
from sendgrid.helpers.mail import *


def sendEmail(post_num, email_list):

    post_link = 'https://www.gusdstevens.com/blog/posts/' + str(post_num) +'.html'
    message = Mail(
        from_email=From('gus@gusdstevens.com', 'Gus Stevens'),
        subject=Subject('New Blog Post'),
        # plain_text_content=PlainTextContent('and easy to do anywhere, even with Python'),
        html_content=HtmlContent('<strong>Hello! This is a notification from Gus that a new post is up!!</strong><br><p>Check it out here: <a href=' + post_link + '>' + post_link + '</a>'),
        is_multiple=True
    )
    
    for email in email_list:
        personal = Personalization()
        personal.add_to(To(email))
        message.add_personalization(personal)

    sg = SendGridAPIClient(os.environ.get('SENDGRID_API_KEY'))
    try:
        response = sg.send(message)
        print(response.status_code)
        print(response.body)
        print(response.headers)
    except Exception as e:
        print(e)


if __name__=="__main__": 
    print("in main, sending emails to gusdstevens@gmail.com and gusfake@gmail.com")
    sendEmail(34, ["gusdstevens@gmail.com", "gusfake49@gmail.com"])
    
