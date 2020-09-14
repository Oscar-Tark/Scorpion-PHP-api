Hi!

Please create the DB: Statistics in MYSQL before continuing.

Description:
------------

This post API allows you to send data to a specific service and after a mysql database. The system uses two requests from javascript. One sends an empty request which is then sent a token. this token then is used by javascript to send its base 64 payload to the PHP service. The php service, then checkes that the request contains a date and in the correct format('dd-mm-yyyy hh:mm:ss') and decodes the base 64 string and filters it. It then encodes it in UTF8 and hashes it using SHA256(I could also use AES RIJNDAEL if we want to decrypt it, which I think was the case?). Curl is then used to call the specific service needed with the payload data, this is transefered to MYSQL. Tables are created if they do not exist. Rows are updated or inserted depending on the day(Tested it briefly on different days, use with caution :P).

Settings:
---------

There are some functions in the sh.php file and the /services/hit_service.php usually called 'create_settings(string)', these set up settings for your local environment where you can supply your URL for curl and your sql settings.

Returns:
--------

Service returns a last update element and the hashed data.