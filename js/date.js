function checkDate(date) {

    birthdate = date.split("-"); 
    if(birthdate.length === 3) {
        day = birthdate[2];
        month = birthdate[1];
        year = birthdate[0];
        if(day > 31) {
            return false;
        }
        if(month > 12) {
            return false;
        }
        if((day > 29) && (month === '02')) {
            return false;
        }
        if((day === 29) && (month === '02')) {
            if(!(year % 4) === 0) {
                return false;
            }
        }
        if((day > 30) && (month === "06" || month === "09" || month === "04" || month === "11")) {
            return false;
        }        
    }
    else {
        return false;
    }
    return true;

}
