      	function validateId(x){
      // Validation rule
      var re = /[A-Za-z0-9]$/;
      // Check input
      if(re.test(document.getElementById(x).value)){
        // Style green
        document.getElementById(x).style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById(x).style.background ='#e35152';
        // Show error prompt
        alert("You can only use alphabetic characters and numbers");
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

    function validateName(x){
      // Validation rule
      var re = /[A-Za-z]$/;
      // Check input
      if(re.test(document.getElementById(x).value)){
        // Style green
        document.getElementById(x).style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById(x).style.background ='#e35152';
        // Show error prompt
        alert("You can only use alphabetic characters");
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }


    // Validate email
    function validateEmail(x){ 
      var re =  /^([A-Za-z0-9_\-\.]+)@([A-Za-z0-9_\-\.]+)\.([A-Za-z]{2,5})$/;
       // Check input
      if(re.test(document.getElementById(x).value)){
        // Style green
        document.getElementById(x).style.background ='#ccffcc';
         // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }else{
        // Style red
        document.getElementById('email').style.background ='#e35152';
        // Show error prompt
        alert("Enter valid email address");
        document.getElementById(x + 'Error').style.display = "block";
        return false;
      }
    }


    function validateAddress(x){
      var re = /[A-Za-z -'/,.0-9]$/;

      if (re.test(document.getElementById(x).value)) {
         document.getElementById(x).style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }
      else{
         document.getElementById(x).style.background ='#e35152';
        // Show error prompt
        alert("You can only use alphabetic characters, hyphens and apostrophes");
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

    function validateMobile(x){
      var re = /^\d{10}$/;

      if (re.test(document.getElementById(x).value)) {
         document.getElementById(x).style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }
      else{
         document.getElementById(x).style.background ='#e35152';
        // Show error prompt
        alert("Enter valid mobile number");
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

    function validatePin(x){
      var re = /^\d{6}$/;

      if (re.test(document.getElementById(x).value)) {
         document.getElementById(x).style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }
      else{
         document.getElementById(x).style.background ='#e35152';
        // Show error prompt
        alert("Enter valid PIN");
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }

    function validateDate(x){
      return true;
     
    }

    function validateSelect(x){
      if(document.getElementById(x).selectedIndex !== 0){
        document.getElementById(x).style.background ='#ccffcc';
        
        return true;
        }else{
        document.getElementById(x).style.background ='#e35152';
        alert("Choose any one");
        document.getElementById(x + 'Error').style.display = "none";
        return false; 
      }
    }

     function validateNumber(x){
      var re = /[0-9]$/;

      if (re.test(document.getElementById(x).value)) {
         document.getElementById(x).style.background ='#ccffcc';
        // Hide error prompt
        document.getElementById(x + 'Error').style.display = "none";
        return true;
      }
      else{
         document.getElementById(x).style.background ='#e35152';
        // Show error prompt
        alert("Enter numbers");
        document.getElementById(x + 'Error').style.display = "block";
        return false; 
      }
    }






      //document.write("jcnwl");
       function validateForm(){
      // Set error catcher
      var error = 0;
      if(!validateId('id')){
        document.getElementById('idError').style.display = "block";
        error++;
      }

      if(!validateDate('doa')){
        document.getElementById('doaError').style.display = "block";
        error++;
      }

      if(!validateName('branch')){
        document.getElementById('branchError').style.display = "block";
        error++;
      }

      // Check name
      if(!validateName('sname')){
        document.getElementById('snameError').style.display = "block";
        error++;
      }

      if(!validateName('fname')){
        document.getElementById('fnameError').style.display = "block";
        error++;
      }

      if(!validateDate('dob')){
        document.getElementById('dobError').style.display = "block";
        error++;
      }


      if(!validateName('faname')){
        document.getElementById('fanameError').style.display = "block";
        error++;
      }

      if(!validateAddress('address')){
        document.getElementById('addressError').style.display = "block";
        error++;
      }

      if(!validateName('city')){
        document.getElementById('cityError').style.display = "block";
        error++;
      }

      if(!validatePin('pin')){
        document.getElementById('pinError').style.display = "block";
        error++;
      }

      // Validate email
      if(!validateEmail('email')){
        document.getElementById('emailError').style.display = "block";
        error++;
      }

       if(!validateMobile('mobile')){
        document.getElementById('mobileError').style.display = "block";
        error++;
      }

      if (!validateSelect('grp')) {
         document.getElementById('grpError').style.display = "block";
        error++;
      }

        if (!validateNumber('rtno')) {
          document.getElementById('rtnoError').style.display = "block";
          error++;
        }

        if (!validateNumber('amt')) {
          document.getElementById('amtError').style.display = "block";
          error++;
        }


      
      // Don't submit form if there are errors
     
      if(error > 0){
      alert("validate form");
        return false;
      }
      else{
        alert("Registration successfully done!!");
        return true;
         
      }
    }   




    // Validate Select boxes
    /*function validateSelect(x){
      if(document.getElementById(x).selectedIndex !== 0){
        document.getElementById(x).style.background ='#ccffcc';
        document.getElementById(x + 'Error').style.display = "none";
        return true;
        }else{
        document.getElementById(x).style.background ='#e35152';
        return false; 
      }
    }
    function validateRadio(x){
      if(document.getElementById(x).checked){
        return true;
      }else{
        return false;
      }
    }
    function validateCheckbox(x){
      if(document.getElementById(x).checked){
        return true;
      }
      return false;
    }  */

    /* // Validate animal dropdown box
      if(!validateSelect('animal')){
        document.getElementById('animalError').style.display = "block";
        error++;
      }
      // Validate Radio
      if(validateRadio('left')){
 
      }else if(validateRadio('right')){
         
      }else{
        document.getElementById('handError').style.display = "block";
        error++;
      }
      if(!validateCheckbox('accept')){
        document.getElementById('termsError').style.display = "block";
        error++;
      } */




