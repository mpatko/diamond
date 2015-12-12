###################
Test task
###################

Application has only one page (welcome page) for direct access. Other pages are available only via POST and return data in JSON.
This application allows performs main CRUD operation with categories and products of virtual online store.

******* Categories *******
/category/create -> add category
POST data:
	[name] - category name
	
/category/update/{ID} -> update category
{ID} - category ID
POST data:
	[name] - category name
	
/category/delete -> delete category
POST data:
	[id] - category ID
	
/category/get -> get array of all categories (ID, name)


******* Products **********
/product/create -> add product
POST data:
	[title] - product title
	[cat_id] - category ID
	[description] - product description
	
/product/update/{ID} -> update product
{ID} - product ID
POST data:
	[title] - product title
	[cat_id] - category ID
	[description] - product description

/product/delete -> delete product
POST data:
	[id] - product ID
	
/product/get/{ID} -> get array of products
{ID} - not required param (if ID is empty - all products, else ID - category ID)
return array of products and link for download products in excel
	

*******************
Server Requirements
*******************

PHP version 5.4 or newer is recommended.

It should work on 5.2.4 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

************
Installation
************

Please see the `installation section <http://www.codeigniter.com/user_guide/installation/index.html>`_
of the CodeIgniter User Guide.

*******
License
*******

Please see the `license
agreement <https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst>`_.

*********
Resources
*********

-  `User Guide <http://www.codeigniter.com/docs>`_
-  `Language File Translations <https://github.com/bcit-ci/codeigniter3-translations>`_
-  `Community Forums <http://forum.codeigniter.com/>`_
-  `Community Wiki <https://github.com/bcit-ci/CodeIgniter/wiki>`_
-  `Community IRC <http://www.codeigniter.com/irc>`_

Report security issues to our `Security Panel <mailto:security@codeigniter.com>`_
or via our `page on HackerOne <https://hackerone.com/codeigniter>`_, thank you.

***************
Acknowledgement
***************

The CodeIgniter team would like to thank EllisLab, all the
contributors to the CodeIgniter project and you, the CodeIgniter user.