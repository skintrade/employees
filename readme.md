# Demo Employee Crawler

This is a demo of an employee data crawler - for testing and demonstration purposes only

## Development information

This was built in php and developed on a Wampserver instance (Apache 2.4.46, PHP 7.3.21, MySQL 5.7.31). There is minimal JS implemented, purely for elements of interaction that require it.

Note: The CSS implementation is over engineered for this purpose, and is scaled from a custom sass build I created for rapid deployment and development of UI, without relying on twitter bootstrap etc. See 'Uncompiledstyles' for the complete sass/scss build.

## Important

This uses the DB from https://dev.mysql.com/doc/employee/en/ so please follow the relevant setup information for this.

## Deployment for testing

The whole repository can be deployed to a domain, sub domain, or VirtualHost.

To connect to the DB, modify utilities/dbconn.php

### Key Structure

The system implemented uses a home page, a main results page, and a page for the display of a single employee's data.


#### Further notes

The DB used is 'messy', many of the tables do not have unique keys, and some store data in a manner that would be classed as 'legacy' or redundant in its current location. Ideally this DB would be restructured to organise the content more effectively and reduce query sizes and times.

There are some test markers in the code to allow for quick debugging, and while not needed I have kept them 'just in case'.

### post review

There are 2 branches "main" and "updates" - "main" is quick and dirty, "updates" has updated code to tidy up, rationalise, speed up, manage errors, and sanitise input.
