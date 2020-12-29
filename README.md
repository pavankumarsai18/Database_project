# Apartment Search
This is a web application that helps students search for apartments nearby their university. The Database is not provided in this implementation.

* [How to use](#how-to-use)
* [All the web pages](#All-web-pages)
* [Technologies Used](#Technologies-Used)
* [Functionalities](#Functionalities)
* [DataBase](#DataBade)
* [Testing](#Testing)
* [DataStructures Used](#DataStructures-Used)
* [Credits](#Credits)
* [Further Improvements](#Further-Improvements)

## How to use
To use this simply download the sc code and paste a valid Google API key in 'Page_2.php'.

## All the web pages
|Web Page| Description|
|---------|------------|
|index| Log in or Signs up users|
|Page_2| Get the information from user|
|preferences| Get the preferences from user|
|Page_3| Sort the available apartments by the given menthods|
|Rent| Get the information of apartment|
|Reviews| Display the reviews of apartment|
|Roomate| Select the roommate|

## Functionalities Implemented
* Distance Calculation
* Sorting Apartments based on attributes
* Adding comments and reviews
* Dispalying the map
* Auto Complete

### Distance Calculation
User will be asked to enter the adress of his university and pick the location of the apartment. This web app calculates the distance between the university and the aparment for all the apartments chosen.

### Sorting Apartments
User can sort the apartments on various attributes which are rent, rating, and distane. This web app sorts them fromdecreasing to increasing order.

### Adding comments and reviews
Users can add reviews about the apartment they live in. This will help other users know about the quality of apartments.

### Displaying the map
This web app uses Map JS API to display the map. Apart from simply displaying the map, this application uses geocodeing, geoLocation, to get information about locations.
![Map](/pics/Address.png)

### Auto Complete
This web app uses AutoComplete feature when the user tries to enter an adress. This auto complete is linked with the map.
![AutoComplete](/pics/Autocomplete.png)

## Technologies Used
* HTML
* CSS
* JavaScript
* Php
* SQL
* Ajax
* Google APIs
* XAMPP

## DataBase
This web application uses mySQL database. The database is stored in an application called 'XAMPP'. The tables are shown below. The tables are descinged in such a way to minimize redundancies and to maximize effieciency. 

![DataBase](/pics/DB.png)

## Testing
This web application was tested by using manual input. XAMPP was used as a database and to host the website locally.

## DataStructures Used
* Caching 
* Cookies
* HashMaps
* Arrays

This web application used Caching and cookies because it made storing the user information easier. Apart from simply storing the user information this also made the website faster.

## Credits
* Me (Pavan Vadrevu)
* Humbert
* Schmidt

## Further Improvements
We can further improve the web application by increasing the updating data in database.
