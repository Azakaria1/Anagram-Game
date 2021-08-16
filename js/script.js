function validateform() {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   var  result=re.test(String(document.myform.mail).toLowerCase());
    if(result  ){
        alert('Mail validé');}
    else   { alert('Mail invalidé');}
    return result;
}
function basicPopup(url) {
    popupWindow = window.open(url,'popUpWindow','height=500,width=500,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
        }
        
        function validateDate()
        {
            var birthday=document.getElementById('d_naissance').value;
            var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs); // miliseconds from epoch
console.log('age='+ageDate);    
    }