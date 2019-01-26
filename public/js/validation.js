function validate() {
    var surename = document.getElementById("lname").value;
    var name = document.getElementById("fname").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("Address").value;
    var birth = document.getElementById("birth").value;
    var regnum = document.getElementById("registernum").value;
    var img = document.getElementById('yourImgId');


//console.log(surname,name, phone, address, birth, regnum, sex);
    var reglet = [А,Б,В,Г,Д,Е,Ё,Ж,З,И,Й,К,Л,М,Н,О,Ө,П,Р,С,Т,У,Ү,Ф,Х,Ц,Ч,Ш,Щ,Ь,Ы,Ъ,Э,Ю,Я];


    // last name
    if(surename === ''){
        document.getElementById('lname').classList.add('border-danger');
        document.getElementById('lname_msg').innerHTML = "Овгоо оруулна уу"

    }else{
        document.getElementById('lname').classList.remove('border-danger');
        document.getElementById('lname_msg').innerHTML = ""
    }

    // first name

    if(name === ''){
        document.getElementById('fname').classList.add('border-danger');
        document.getElementById('fname_msg').innerHTML = "Нэрээ оруулна уу"
    }else{
        document.getElementById('fname').classList.remove('border-danger');
        document.getElementById('fname_msg').innerHTML = ""
    }
    // date
    if(isValidDate(birth) === false){
        document.getElementById('birth').classList.add('border-danger');
        document.getElementById('date_msg').innerHTML = "Төрсөн он сараа оруулна уу"
    }

    // email
  /*  if() {
        document.getElementById('lname').classList.remove('border-danger');
        document.getElementById('lname_msg').innerHTML = ""
    }*/

    if(address === ''){
        document.getElementById('Address').classList.add('border-danger');
        document.getElementById('address_msg').innerHTML = "Гэрийн хаягаа оруулна уу"
    }

    if(ph(phone) === false){
        document.getElementById('phone').classList.add('border-danger');
        document.getElementById('phone_msg').innerHTML = "Дугаараа зөв оруулна уу"
    }


    if(regnumber(regnum) === false){
        document.getElementById('registernum').classList.add('border-danger');
        document.getElementById('registernum_msg').innerHTML = "Регистерийн дугаараа зөв оруулна уу"
    }

//Checking phone number
    function ph(o) {
        var h = parseInt(o);
        var s = h.toString();
        var p = s.length;

        if(p !== 8){
            return false
        }
        else{
            return true
        }
    }

    function regnumber(reg) {
        if(reg[0] in reglet && reg[1] in reglet){
            return true}
        else{
            return false
        }

        }



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
        if(year < 1000 || year > 3000 || month === 0 || month > 12)
            return false;

        var monthLength = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

        // Adjust for leap years
        if(year % 400 === 0 || (year % 100 !== 0 && year % 4 === 0))
            monthLength[1] = 29;

        // Check the range of the day
        return day > 0 && day <= monthLength[month - 1];
    }



    function error(){
        document.getElementById("lname").style.border = "1px solid red";

        return false
    }
    function resize(yourImg){
        if(yourImg && yourImg.style) {
            yourImg.style.height = '200px';
            yourImg.style.width = '200px';
        }
    }
    return false
}

