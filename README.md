# Cruge 2.0
**A Web Application Framework based on Yii Framework (2.0), 
UNDER DEVELOPMENT AND UNSTABLE**

###Introductory

Cruge 2.0 is a Web Application Framework built at top of Yii Framework 2.0
extending the authentication provided by default. The goal of Cruge is
to provide a high business class oriented to Office Applications.

Cruge 2.0 provides you a set of *authentication clients* each one serving
one prupose: authenticate users persisted in a database (ActiveRecordClient)
and more (more clients comes in later). 

By default, Cruge comes with one authentication client (ActiveRecordClient), 
the goal is to provide more clients, each one serving a specific case, 
like LDAP authentication, Webservice Authentications and others.

Cruge 2.0 provides you a set of ready-for-use views serving this use cases:
login, password recovery, registration, user management, visual/console RBAC,
menu builder, remote login, events.

**What kind of solutions should be designed with Cruge ?**

Office Applications. That ones requiring always the same basic features 
everytime, plus advanced role management, login screens, alternative login 
methods. That is, those applications human oriented. As an example of 
applications that should apply for Cruge, you have: human resource management, 
school/university management, office finance applications. Think in Cruge as 
a set of ready-for-use subclassing system designed to put you in practice 
with role management, user administration, session management and event 
handling (do some task when some event is fired by cruge).

**Why Cruge is not the good solution to build a public Website, a ecommerce etc ?**

Because Cruge is a better solution for office applications in where many 
authorized roles with complex task and operations exists. A Public Website 
is mainly used by one guy: a anonymous user. that is: one role. You can ask 
immediatly: ok, what happen when some users gets registered in that web 
application: again, one more role. You have two roles. Ok, in many cases 
a public web site becomes complex, that is true, but this point is beyond 
the limits of this subframework. This kind of applications (public websites) 
are better suited for a different kind of framework: a Content Managed System, 
a CMS, like Joomla, Wordpress or some other different specialized framework. 
Many of you may differ this point of view, thats ok too.

###Develpment Status

**Under Development**....very early development. 
Please do not fork or download yet.

###Author

+ Christian Salazar H. (christiansalazarh@gmail.com) www.chileshift.cl/cruge

###Partners

This development is supported by: 

+ Carlos Llamosas (Mexico)

###I Love U Man, Will you have my Baby ?

No. you can support me via [PayPal Donation](https://www.paypal.com/us/cgi-bin/webscr?cmd=_flow&SESSION=Cof8Q1M7pvKRI5dGgyNFJ9WY9fgOaq1-pTB2ZXJ_K-QR3us8emGzbLea3t8&dispatch=5885d80a13c0db1f8e263663d3faee8d99e4111b56ef0eae45e68b8988f5b2dd)
i will appreciate very much you donation and i can put your name in partners sections. Thank you in advance, i put my time and effort on this project for you.

###Documentation and Setup Instructions

The full documentation is here: 

	https://github.com/christiansalazar/cruge/wiki

