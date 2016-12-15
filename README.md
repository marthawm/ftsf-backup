# Fair Trade Software Foundation
A new website

## Important notice about database / read before going live
Some plugins save their settings in the database. Since we don't share that database everyone has different settings.
Before the new sites goes live it's important to either merge the database and test it on different computer.
The other option would be make a complete version of the website on one computer with all pages, post
settings and layout. Then export this database via PHPmyadmin and import it on other computers and test is fully.
If everyone is sure everything is working you can use that database for the new wordpress site.

### notice about email subscriber plugin
The email subscriber plugin allows people to subscribe to the newsletter. Inside the plugin there's a possibilty to compose an email and the ability to send an composed email. The sending of the emails does not work yet. (Kim said that was not required yet) This could be because of the site running locally or because the wordpress settings. But before someone wants to use the function, someone should dive in to the plugin to get it working first
