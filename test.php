<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once dirname(__FILE__)."/resources.php";
//require_once dirname(__FILE__)."my_own_dao.class.php";

$resources= new Resources();

$dao=new LocationsDao();  //initialization of a class with location-table altering functions add and such are coded
for ($i=0;$i<200;$i++){
    $location=[
        'locationAddress'=> $resources->address(),      //make sure you use valid field names
        'locationCity'=>$resources->cities(),           //matching the field names in your DB here
        'locationCountry'=>$resources->countries(),
        'locationZipcode' => $resources->randomString(5)
    ];
$dao->add($location);   //you can use any generic function you have made for inserting a new object into db

}

$dao = new UserDao(); //initialization of a class with users-table altering functions add and such are coded

for ($i=0;$i<1000;$i++){
$user = [
    'userName' => $resources->peopleNames(),          //use valid field names for your db!
    'userPassword' => bin2hex(random_bytes(4)),
    'userStatus'=>$resources->randomStatus(),
    'userPermissions'=>$resources->randomPermission()
    ];
    $dao->add($user);  //this is a generic function for inserting a record in db which i have coded. youll have to code your own
}
?>
