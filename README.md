# Cruge 2.0
**A Web Application Framework based on Yii Framework (2.0), UNDER DEVELOPMENT, DO NOT FORK OR DOWNLOAD YET**

###Introductory

Cruge is a Web Application Framework based on Yii Framework 2.0. Let me start by saying that you can build any application or service using purely Yii Framework 1.x or 2.x and no more, also you can extend it using extensions, modules, adding behaviors or subclassing some core functionality in that framework, that's ok and it is the goal of this beautifull framework. But, beyound this point a problem shows up: Every new application needs to be rebuilt from zero, of course, assuming you dont use more resources than the framework by itself, the practice tell us to reuse code, extensions and so on. 

When we go in the task of creating a new application using purely the framework by itseld with no extensions or some other 3rd party code then is required to keep in mind the framework achitecture to start any code subclassing from this point. This last issue is goodest only if you are trying to build a very new specialized feature, the rest need to reutilize code to build a operative application. I'm figured out of this last point when i build Cruge 1.0: the gross of the developpers using Cruge 1.0 stay there to build short business applications designed basically for end human users. So, this new development is focused in this last point: short business applications (school/university applications, human resources management, as example usage), i call them: office applications.

**What kind of solutions should be designed with Cruge ?**

Office Applications. That ones requiring always the same basic features everytime, plus advanced role management, login screens, alternative login methods. That is, those applications human oriented. As an example of applications that should apply for Cruge, you have: human resource management, school/university management, office finance applications. Think in Cruge as a set of ready-for-use subclassing system designed to put you in practice with role management, user administration, session management and event handling (do some task when some event is fired by cruge).

**Why Cruge is not the good solution to build a public Website, a ecommerce etc ?**

Because Cruge is a better solution for office applications in where many authorized roles with complex task and operations exists. A Public Website is mainly used by one guy: a anonymous user. that is: one role. You can ask immediatly: ok, what happen when some users gets registered in that web application: again, one more role. You have two roles. Ok, in many cases a public web site becomes complex, that is true, but this point is beyound the limits of this subframework. This kind of applications (public websites) are better suited for a different kind of framework: a Content Managed System, a CMS, like Joomla, Wordpress or some other different specialized framework. Many of you may differ this point of view, thats ok too.

###Develpment Status

**Under Development**....very early development. Please do not fork or download yet.

###Author

+ Christian Salazar H.

###Partners

This development is partnered by ...................

###Documentation

The full documentation is here: https://github.com/christiansalazar/cruge/wiki

