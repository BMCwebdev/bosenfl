
function validateForm()
{
  var valid = true;
  var requiredFields = ["firstname", "lastname", "address1", "city", "state", "zipcode",
                        "email", "phone","favoriteteam","cbo21", "cboAgree"];
  var fieldTypes = 	   ["text", "text", "text", "text", "select", "text",
                        "text", "text", "select", "checkbox" ,"checkbox"];
  var missingFields = "Please correct the highlighted fields";
  // loop through the fields...
  for(var x=0; x < requiredFields.length; x++)
  {
    var fieldName = "#" + requiredFields[x];
            var elementType = fieldTypes[x];
    if (elementType == "text") {
      // validate that field has value
      
      if (0 == $(fieldName).val().length) {
          valid = false;
          $(fieldName).css('border-color', 'RED');
      }else
      {
        $(fieldName).css('border-color', 'initial');
      }
    }else if (elementType == "select")
    {
      // here we have as select box make sure it's not selectedIndex = 0
      var selectedIndex = $(fieldName).prop("selectedIndex");
      if (0== selectedIndex) {
        valid = false;
        $(fieldName).css('border-color', 'RED');
      }else
      {
        $(fieldName).css('border-color', 'initial');
      }
    }else if (elementType =="checkbox") {
        if (!$(fieldName).prop("checked"))
        {
            //border-color:red; border-style:solid;
            
            $(fieldName + "Label").css('border-color', 'RED').css('border-style','solid');
           //$(fieldName).css("outline","1px").css("solid", "#1e5180");
            
        }
        else
        {
            $(fieldName + "Label").css('border-color', 'initial').css('border-style','none');
        }
    }
  }
  // check email confirm match
  
  if (false == valid) {
    // need to put an error message up...
    var missingFields = "Please correct the highlighted fields";
    $("#errormessage").html(missingFields);
    $("#firstname").focus();
  }
  else
  {
    
    var message = "";
    // if we are here we have values so let's make sure emailConfirm and password / pin match
    // added comment...
    if ($("#email").val() != $("#confirm").val()){
        var missingEmail = "Please confirm your email<br>";
        message += missingEmail;
        valid = false;
        $("#email").css('border-color', 'RED');
        $("#confirmemail").css('border-color', 'RED');
    }
    if (!valid) {
      $("#errormessage").html(message);
      $("#firstname").focus();
    }else
    {
      $("#errormessage").html("");
     
    }
  }
  if (valid) {
    alert("ready to submit");
  }
  return valid;
}
