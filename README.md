Landing Theme Framework
=======================

Landing is a wordpress theme framework created for internal use at [Cartogram](https://www.studiocartogram.com).

### Features

* Runs Compass and Sass via Zurb's Foundation 4.0
* Totally blank, barebones wordpress template structure
* Chalk full of wordpress utility functions
* Superfast!
* Uses Bower for font-end packages

### Credits

* [Zurb](http://www.zurb.com) For Foundation
* [Viewport Industries](http://viewportindustries.com/) For Starkers
* [Some Random Dude](http://somerandomdude.com) For Frank


## Directory Layout

	external/					--> external functions.php components
	
	parts/						--> template parts that are not within wordpress template heirarchy
		shared/					--> always shared parts, html-header and html-footer
			html-footer.php 	--> everything after the document footer hooks, scripts, etc...
			html-header.php 	--> everthing before the body tag, header hooks, meta tags, etc...
		loop.php 				--> basic extendible loop tempalte
	
	sass
		<%= pkg.name %> 		--> everything sass, imports foundation
		variables				--> a direct copy of foundations variables with package overrides
		globals					--> all package specific variables

	images
	
	javascripts
		modernizer.js
		app.js 					--> Single doc ready js
		vendor					--> all our vendor stuff that is not a bower componene
	
	stylesheets					--> font-end loaded stylesheets
		<%= pkg.name %>.css		--> everything css
		normalize.css			--> normalize css (maybe)

	fonts						--> webfonts