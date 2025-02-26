​Download index.html and open it in a browser. Open the developer tools (right click on the browser window and choose 'inspect' || f12) and go to the console. Every time data is fetched from the API it is also logged in the console. This is JSON data. 


It is worth noting that when we send a request to the CatAPI it is sending back the URL for an image rather than the image itself. Therefore to display the images above, a request is sent to the API and then the response from the API is used in an image tag.

Some of the API endpoints for the CatAPI will return JSON data when typing the URL into the browser address bar, but not all. 

For example the 'favourites' endpoint (https://api.thecatapi.com/v1/favourites) returns an authentication error when we try to access it using the browser.

If you look at the documentation for the CatAPI you might notice that there are several ways to interact with it.

Firstly, the screenshot of the documentation below shows it is possible to use a GET request for favourites but that we also need to include 'Headers' including 'content type' and an 'x-api-key'.

Secondly, the screenshot from the documentation below shows that it is also possible to do a POST request to the favourites endpoint and that two parameters are required in the request body.

Thirdly, the screenshot below shows it is also possible to do a DELETE request to the favourites endpoint.



Request method

Common HTTP request methods are GET, POST, and DELETE. When we type a URL in the Web Browser or click on a link we are sending GET requests. 

Headers

An HTTP request has headers which include things such as the address, what the request method is and authentication information.

Body parameters

Parameters can be sent in the body of the request meaning that they do not appear in the URL. Typically we use a POST request when including parameters in the body of the request.

