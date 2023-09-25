function validate(){
    var age, password,confirm;
    age=document.getElementById('age').value;
    password=document.getElementById('pass').value;
    confirm=document.getElementById('cpass').value;
    console.log(age,password,confirm);

    if(password!=confirm){
        alert("Passwords donot match");
        return false;
    }
    else if(age>100 || age<12){
        alert("Age must be between 12 to 100");
        return false;
    }
    return true;
}