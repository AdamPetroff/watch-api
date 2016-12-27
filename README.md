cleevio-api
===========

A Symfony project created on December 26, 2016, 10:49 pm.


REST API : The server returns a JSON containing keys status(success/error), message, data.

Before using, you have to add a data service provider implementing either AppBundle\Components\XmlWatchLoader or AppBundle\Components\MySqlWatchRepository interfaces and register it in the configurational file services.yml in config directory and add the new service as an argument to service app.watch_manager .