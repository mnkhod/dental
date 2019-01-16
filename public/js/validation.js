/*var surname = document.getElementById("").value;
var name = document.getElementById("").value;
var phone = document.getElementById("").value;
var address = document.getElementById("").value;
var bith = document.getElementById("").value;
var regnum = document.getElementById("").value;
*/
var reglet = "АБВГДЕЁЖЗИЙКЛМНОӨПРСТУҮФХЦЧШЩЬЫЪЭЮЯ";
var phone = '91507087';


/*
if(surname == null){
    console.log(surname);
}

else if(name == null){
    console.log(name);
}
*/

//Checking phone number

var h = parseInt(phone);
var s = h.toString();
var p = s.length;

if (p !== 8){
    console.log('dugaaraa oruulna uu')
}
else{
    console.log('burtgelee')
}
var birth = '12/1/1999k';
var b = isValidDate(birth);
if(b === false){
    console.log('try again');
}


//Checking address
/*if(address == null){
    console.log(address);
}*/




function isValidDate(dateString)
{
    // First check for the pattern
    if(!/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(dateString))
        return false;

    // Parse the date parts to integers
    var parts = dateString.split("/");
    var day = parseInt(parts[1], 10);
    var month = parseInt(parts[0], 10);
    var year = parseInt(parts[2], 10);

    // Check the ranges of month and year
    if(year < 1000 || year > 3000 || month == 0 || month > 12)
        return false;

    var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

    // Adjust for leap years
    if(year % 400 == 0 || (year % 100 != 0 && year % 4 == 0))
        monthLength[1] = 29;

    // Check the range of the day
    return day > 0 && day <= monthLength[month - 1];
};