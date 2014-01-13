JetPackVC
=================

== Functional ==

Place the following line of code just below WP_DEBUG with in the wp-config.php file. This will allow you to utilize jetpack with out having to connect it to the wordpress server.
define( 'JETPACK_DEV_DEBUG', 1 );

== Terms ==

OOP - Object Oriented Programing

== General Notes ==
There are two files, one if OOP style and the other is procedural. The OOP is the style I write in because it allows for more a more fluid approach to writing code and allows me to use function names that do not need to have a prefix or singular. We can talk about OOP another time. 

The procedural is more likely what you're used to seeing. 

I wrap all the sharing code with:
```
if ( function_exists( 'sharing_display' ) ) {}
```
This will ensure it only runs if the sharing_display() function exists. That specific function is from the jetpack plugin and is the one that actually displays the sharing.

Each file does the same thing. 

== Info == 

First we remove_filter on the sharing so jetpack is no longer adding the sharing. Then we re-add them from our own function that includes the div with the class jetpack-sharing-wrapper. This gives us a parent wrapper to use when targeting css. We re-add them exactly as they were before so there is no change in the core of the plugin so we should see no change except that there is now a css wrapper. There may be other ways to do this via filters that are placed with in the jetpack plugin, but this method allows for the most control. 

"allows for the most control" meaning we now have the option not re-add them via filter. Instead we could add them manually if we wanted to place them specifically. Using the filters to add them is nice, but sometimes you may want to have more control over where the code is placed in the page.