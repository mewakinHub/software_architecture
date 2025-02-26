More on Web APIs

Recommended YouTube videos

These are helpful and in depth YouTube videos discussing REST APIs:





















Online articles

This online article about understanding and using REST APIs in Smashing Magazine explains key terms and concepts for RESTful Web APIs. 

https://www.smashingmagazine.com/2018/01/understanding-using-rest-api/
These technical blog posts on API First Transformation at Etsy by Stefanie Schirmer offer in-depth discussions from ETSY about their API in 2016. Note that ETSY use the PHP-like language Hack for their backend.

Post 1: API First Transformation at Etsy – Concurrency: https://codeascraft.com/2016/09/06/api-first-transformation-at-etsy-concurrency/
Post 2: API First Transformation at Etsy – Operations: https://codeascraft.com/2016/09/26/api-first-transformation-at-etsy-operations/
Post 3: API First Transformation at Etsy – Human aspects & developer adoption https://codeascraft.com/2016/11/08/api-first-transformation-human-aspects-developer-adoption/


Examples of Public Web APIs

The Cat API

The Cat API https://thecatapi.com/ is a fun an easy to use public API that you can play with:

Send an image request to the Cat API https://api.thecatapi.com/v1/images/search?limit=5 - This returns an array of JSON objects, each containing a link to a cat image (try pasting that link into your browser to see the image)
Send an invalid request (note the response) https://api.thecatapi.com/v1/images/penguin - This gives an error with a 400 status code.
Welcome message https://api.thecatapi.com/ - Just a simple greeting. Some APIs list all of their endpoints when the base endpoint is called, which can be helpful.
SpaceX API (Unofficial)

Another interesting public API is the unofficial SpaceX API

List of launches https://api.spacexdata.com/v4/launches
List of capsules https://api.spacexdata.com/v4/capsules
Information about a capsule with the id 5e9e2c5bf359189ef23b2667 https://api.spacexdata.com/v4/capsules/5e9e2c5bf359189ef23b2667


About HTTP

This is a list of possible HTTP Response Status Codes. Note that not all are actually supported by PHP (e.g.418 I'm a teapot).

 https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
This is a list of HTTP request methods (GET, POST, etc.)

https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods


About JSON

This is a Mozilla web doc on 'working with JSON'. This gives a clear and detailed overview of JSON.

https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Objects/JSON
This JSON Validator can be very helpful for checking whether there are errors in your JSON.

https://jsonlint.com/ 
