
/************************************************
Basics
************************************************/
function setFocus(theID) {
    document.getElementById(theID).focus();
}
        
function setVisible(ID) {
    var element = document.getElementById(ID);
    element.style.visibility = "visible";
}

function setHidden(ID) {
    var element = document.getElementById(ID);
    element.style.visibility = "hidden";
}

function reseterrors() {
    var array = document.getElementsByClassName("error");
    var i = 0;
    for (; i < array.length; i++) {
        array[i].style.visibility = "hidden";
    }
}

/************************************************
Specific types of fields
************************************************/
function validateText(text, texterror) {
    var data = document.getElementById(text).value;
     
    if (data.length == 0) {
        setVisible(texterror);
    }
    else setHidden(texterror);
}

/*
function validateRadio (radio, radioError) {
    var data = document.getElementById(radio).value;

    for (i = 0; i < data.length; ++ i) {
        if (data[i].checked) {
            setVisible(radioError);
            return false;
        }
    }
    setHidden(radioError);
    return true;
}
*/

/*
function validateDropDown(field, fieldError) {
    // for this function to work, value of the default must be none
    if (document.getElementById(field).value == "none") {
        setVisible(fieldError);
        return false;
    }
    setHidden(fieldError);
    return true;
}
*/

/*
function validateNumber(text, texterror) {
    var data = document.getElementById(text).value;
     
    if (data.length == 0 || isNaN(data)) {
        setVisible(texterror);
    }
    else setHidden(texterror);
}
*/


/************************************************
validation for each form
************************************************/
function validateCreateGoal() {
    var name = document.getElementById("name").value;
    var freq = document.getElementById("frequency");    
    var entry = document.getElementById("entry");

    if (name.length == 0) {
        setVisible("nameError");
        setFocus("name");
        return false;
    }

    alert(freq);

    for (i = 0; i < freq.length; ++ i) {
        if (freq[i].checked) {
            setVisible("frequencyError");
            return false;
        }
    }
    
    for (i = 0; i < entry.length; ++ i) {
        if (entry[i].checked) {
            setVisible("input");
            return false;
        }
    }

    return true;
}








function validateAll() {
    var firstN = document.getElementById("firstN").value;
    var lastN = document.getElementById("lastN").value;
    var addr = document.getElementById("address").value;
     
    if (firstN.length == 0) {
        setVisible("fnerror");
        setFocus("firstN");
        return false;
    }
    else if (lastN.length == 0) {
        setVisible("lnerror");
        setFocus("lastN");
        return false;
    }
    else if (addr.length == 0)
    {
        setVisible("aerror");
        setFocus("address");
        return false;
    }
    else if (!validatePhone()) {
        setFocus('phone');
        return false;
    }
    else if (!validateCCNum()) {
        setFocus('ccnum');
        return false;
    }
    else if (!validateExpiry()) {
        //no field to set focus to 
        return false;
    }
        return true;
}