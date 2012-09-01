TF2 Trade
=========

This is a site for managing trades in the TF2 trading system.

Installation
------------

You will need to install the following:

* [PHP 5.4+](http://php.net/downloads.php)
* A Webserver (testing is done on Abyss on Windows x64)
* [Mongodb (latest version)](http://www.mongodb.org/downloads) -- testing is done on 2.07
* Mongodb plugin for php ([Download of plugin](https://github.com/mongodb/mongo-php-driver/downloads), [Installation](http://php.net/manual/en/mongo.installation.php))
* A fork of this repo and your webserver set to host it!
* Read application/config/mongodb.php

Todo
----

Things that need completing are:

* Writing views for everything
* Creating a layout and colour scheme (<a href="tf2trade/application/views/default.php">application/views/default.php</a>)
* Search functions for users/trades (application/controllers/search)
* Documentation so other people can contribute
* Use ajax to submit trades/comments/searches alongside the above API.
* Steam login using openid
* Updating the local itemschema whenever steam updates it with new icons and information
* Showing icons for items in backpack and trade views
* When people post trades, track if they actually have those items in stock.