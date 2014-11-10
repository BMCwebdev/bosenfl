function isValidEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function validateForm()
{
    
  var valid = true;
  var requiredFields = ["firstname", "lastname", "street", "city", "state", "zipcode",
                        "email", "emailconfirm", "telephone","favoriteteam","cbo21", "cboRulesAgree"];
  var fieldTypes = 	   ["text", "text", "text", "text", "select", "text",
                        "text", "text", "text", "select", "checkbox" ,"checkbox"];
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
          $(fieldName).css('border-bottom','2px solid red');
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
          $(fieldName).css('border-bottom','2px solid red');
      }else
      {
        $(fieldName).css('border-color', 'initial');
      }
    }else if (elementType =="checkbox") {
        if (!$(fieldName).prop("checked"))
        {
            //border-color:red; border-style:solid;
            valid = false;
            $(fieldName + "Label").css({"border-bottom":"2px solid red", "margin-bottom":"-2px"});
           //$(fieldName).css("outline","1px").css("solid", "#1e5180");
            
        }
        else
        {
            $(fieldName + "Label").css('border-bottom','none');
        }
    }
  }
  // check email confirm match
  if (valid) {
    // makes sure email matches
    if (true == isValidEmail($("#email").val()) && true == isValidEmail($("#emailconfirm").val())){
        if ($("#email").val() != $("#emailconfirm").val())
        {
            valid = false;
            $("#email").css('border-bottom','2px solid red');
            $("#emailconfirm").css('border-bottom','2px solid red');
        }
    }else
    {
        valid = false;
            $("#email").css('border-bottom','2px solid red');
            $("#emailconfirm").css('border-bottom','2px solid red');
    }
  }
  if (valid) {
    //alert("ready to submit");
    $.ajax({
            type: 'post',
            url: 'procweek.php',
            data: $("#form1").serialize(),
            success: function (data) {
                $("#processingresult").html("You successfully submitted your entry -- good luck!");
				$("#processingresult").css({"color":"#e1e000", "font-family":"bose_gothic_screenMdOb", "font-size":"24px", "display":"inline-block"})
                document.getElementById("form1").reset();
                // we reset the form
            }
        });
        //return$valid;
  }
  return valid;
}
