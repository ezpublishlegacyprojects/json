JSON
---------------------------

/*
    JSON
    Copyright (C) 2007  Sydesy ltd

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

Introduction
------------
The goal is to be able to query datas and get them in json format.
Yes, ajax and all that jazz.


1. Context
----------

Alpha thing. I need help to see how to head that beast.

The general idea is to get via json all what you can do with the fetch, and use a template system on the client to display it.

On the top of that, adding the powercontent that you can access via ajax and you might end up with a system that isn't too slow.


On the server side, that's the ez API+ some class to convert a php object to a json notation

I mostly use jquery+trimpath-templates on the client side.

jquery is your friend, and used for the demos.
I have an amazing js template library that I've started using. still digging.


2. Features
-----------

the mostly only method developed are json/list/<nodeid> (list of children)
and json/node/<nodeid> (fetch the node)

It should be expended with new methods to fetch the latest, filter by class... I'd like to come up with a nice way so everyone can add the method they need when they need it without being a complete mess. Any idea more than welcome.

it can take some extra parameters:
json/list/<nodeid>?datamap (so you have the attributes fetched)
json/list/<nodeid>?owner (so you have the owner fetched)
json/list/<nodeid>?debug (so you have a readable view of the data)

of course, you can combine
json/list/<nodeid>?datamap&owner


3. Example of use
-----------------

Want to see the json directly ?
json/list/2?datamap&owner

want to see how to display the result 
json/node/2?debug=1&datamap

And now working and  using the template system on the client side

json/explorer

4. I want classes on the client side !
--------------------------------------

Is someone good enough in js ? I want to mimick (on the light !) what is on the server: have a node+attribute class
being able to fetch -via json- and display -via the trimpath- 

Did I mention than I'm looking for help ? ;)

6. Known bugs and limitations
-----------------------------

Yes, here. and there too. probably.
 
7. TO DO and possible evolutions
--------------------------------

Right now, the format is a direct mirror of what's spit out of the ez php classes. 

It needs a sanner and less verbose format, and properly abstracting the datas of each attribute, based on its type.

8. Disclaimer & Copyright
-------------------------
/*
    JSON for eZ publish 3.x
    Copyright (C) 2007  Sydesy ltd

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/
The operator is tailored to fit our needs, and is shared with the community as is.





Thanks for your attention

Xavier DUTOIT
