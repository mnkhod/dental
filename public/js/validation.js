function validate() {
    var surename = document.getElementById("lname").value;
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("Address").value;
    var birth = document.getElementById("birth").value;
    var reg = document.getElementById("registernum").value;
    //var img = document.getElementById('Image');
    var check = 1;

    //console.log(surname,name, phone, address, birth, regnum, sex);
    var reglet = ['А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','Ө','П','Р','С','Т','У','Ү','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ы','Ъ','Э','Ю','Я'];
    var reggg = 'АБВГДЕЁЖЗИЙКЛМНОӨПРСТУҮФХЦЧШЩЬЫЪЭЮЯ'
    var numlet = ['0','1','2','3','4','5','6','7','8','9'];
    console.log(reg.length);
    // last name
    if(surename === ""){
        document.getElementById('lname').classList.add('border-danger');
        document.getElementById('lname_msg').innerHTML = "Овгоо оруулна уу";
        check = check * 0;
    }else{
        document.getElementById('lname').classList.remove('border-danger');
        document.getElementById('lname_msg').innerHTML = "";
        check = check * 1;
    }
    if(email === ""){
        document.getElementById('email').classList.add('border-danger');
        document.getElementById('email_msg').innerHTML = "Цахим хаяг оруулна уу";
        check = check * 0;
    }else{

        var re = /\S+@\S+\.\S+/;
        if(re.test(email)) {
            document.getElementById('email').classList.remove('border-danger');
            document.getElementById('email_msg').innerHTML = "";
            check = check * 1;
        } else {
            document.getElementById('email').classList.add('border-danger');
            document.getElementById('email_msg').innerHTML = "Цахим хаяг зөв оруулна уу";
            check = check * 0;
        }
    }

    // first name

    if(name === ""){
        document.getElementById('fname').classList.add('border-danger');
        document.getElementById('fname_msg').innerHTML = "Нэрээ оруулна уу";
        check = check * 0;
    }else{
        document.getElementById('fname').classList.remove('border-danger');
        document.getElementById('fname_msg').innerHTML = "";
        check = check * 1;
    }
    // date
    if(isValidDate(birth) === false){
        document.getElementById('birth').classList.add('border-danger');
        document.getElementById('date_msg').innerHTML = "Төрсөн он сараа оруулна уу";
        check = check * 0;
    }else{
        document.getElementById('birth').classList.remove('border-danger');
        document.getElementById('date_msg').innerHTML = "";
        check = check * 1;
    }


    if(address === ""){
        document.getElementById('Address').classList.add('border-danger');
        document.getElementById('address_msg').innerHTML = "Гэрийн хаягаа оруулна уу";
        check = check * 0;
    }else{
        document.getElementById('Address').classList.remove('border-danger');
        document.getElementById('address_msg').innerHTML = "";
        check = check * 1;
    }

    if(ph(phone) === false){
        document.getElementById('phone').classList.add('border-danger');
        document.getElementById('phone_msg').innerHTML = "Дугаараа зөв оруулна уу";
        check = check * 0;
    }else{
        document.getElementById('phone').classList.remove('border-danger');
        document.getElementById('phone_msg').innerHTML = "";
        check = check * 1;
    }
    if(regnumber(reg) === false ){

        document.getElementById('registernum').classList.add('border-danger');
        document.getElementById('registernum_msg').innerHTML = "Регистерийн дугаараа зөв оруулна уу";
        check = check * 0;
    }else{
        document.getElementById('registernum').classList.remove('border-danger');
        document.getElementById('registernum_msg').innerHTML = "";
        check = check * 1;
    }

//Checking phone number

    function ph(o) {
        var h = parseInt(o);
        var s = h.toString();
        var p = s.length;

        if(p !== 8){
            return false
        }
        else if(p !== o.length){
            return false
        }
        else{
            return true
        }
    }

    function regnumber(regg) {
        var i;
        var z;
        var x;
        var hh = regg.slice(2, regg.length);
        console.log(hh);
        var a = 0;
        var b = 1;
        var lis = [];

        // for(i=0; i < reglet.length; i++){
        //     var checker1=0;
        //     for(var x=0; x<reglet.length; x++){
        //         if(regg.charAt(0) !== reglet[x].charAt(0) || regg.charAt(1) !== reglet[x].charAt(0)){
        //             a = 0;
        //             console.log(a);
        //         }
        //     }
                // if (checker1===0) {
                //     a=0;
                // }
            // }
        console.log(regg[0])
       // for(i in reglet){
        var checker1 = 0;
        if(reggg.includes(regg[0]) && reggg.includes(regg[1])){
            a = 1
            console.log(a)
        }
        //}

        //     for(var x in reglet){
        //         if (hh === 8 && regg[0] === reglet[i] && regg[1] === reglet[x]){
        //              a = 0;
        //         }
        //     }
        //
        // }

        for(z=0; z < hh.length; z++){
            var checker=0;
            for(var k=0; k<numlet.length; k++){
                if(hh.charAt(z) === numlet[k].charAt(0)){
                    checker = 1;
                    // console.log(b)
                    // lis.push("1")
                // }else{
                //     // lis.push("0")
                }
            }
            if (checker===0) {
                b=0;
            }
            // console.log(b);

        }
        // console.log(lis)
        if(a*b === 1){
            return true;
        }
    return false;

    }
    function rss(hhff){

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
    /*
    function resize(yourImg){
        if(yourImg && yourImg.style) {
            yourImg.style.height = '200px';
            yourImg.style.width = '200px';
        }
    }
    */
    if(check === 1){
    document.getElementById("form").submit();
}
}

