$(document).ready(function() {
    setTimeout(popup, 3000);

    function popup() {
        $("#logindiv").css("display", "block");
    }

    $("#login #cancel").click(function() {
        $(this).parent().parent().hide();
    });

    $(".onclick").click(function() {
		var str = $(this).attr("id").split('_');
		document.getElementById('cat').value = str[1];
		document.getElementById('prod').value = str[0];
        $("#contactdiv").css("display", "block");
		$("#contactdiv").css("position", "fixed");
		$("#contactdiv").css("z-index", 9999);
    });
	
	$(".onclickpdf").click(function() {
		var str = $(this).attr("id").split('_');
		document.getElementById('cat').value = str[2];
		document.getElementById('prod').value = str[1];
		$("#pid").val(str[0]);
		//$("#c1").val(str[0]);
		document.getElementById('company').value = '';
		document.getElementById('infoline1').value = '';
		document.getElementById('infoline2').value = '';
		document.getElementById('message_head').value = '';
		document.getElementById('msgline1').value = '';
		document.getElementById('msgline2').value = '';
		
        $("#pdfdiv").css("display", "block");
		$("#pdfdiv").css("position", "fixed");
		$("#pdfdiv").css("z-index", 9999);
    });

    $("#contact #cancel").click(function() {
        $(this).parent().parent().hide();
    });
	
	 $("#pdf #cancel").click(function() {
        $(this).parent().parent().hide();
		/*location.reload();*/
    });


//contact form popup send-button click event
    $("#send").click(function() {
        var name = $("#name").val();
		var cname = $("#cname").val();
		var addr = $("#addr").val();
        var email = $("#email").val();
        var contact = $("#contactno").val();
        if (name == "" || cname == "" || email == "" || contact == "" || addr == "")
        {
            alert("Please Fill All Fields");
			return false;
        }
        else
        {
			
			var form_data = {
				category  : $("#cat").val(),
				product  : $("#prod").val(),
				name  : name,
				cname: cname,
				addr: addr,
				email : email,
				contact : contact		
			 };
			 $.ajax({
				data : form_data,
				type : "POST",
				url : "ajax/process.php" ,
				success : function(msg){
					//alert(msg);
					 msg = msg.trim();
					 $("#response_message").html("");
					 if(msg == "yes")		
						$("#response_message").html('Your request for sample sent successfully.').css({"color" : "green","margin-bottom" : "1%"});
					 if(msg == "no")
						$("#response_message").html("Failure to send email. Please try again."	).css({"color" : "red","margin-bottom" : "1%"});	
				 }					 
				});
			
			return false;
            /*if (validateEmail(email)) {
                $("#contactdiv").css("display", "none");
            }
            else {
                alert('Invalid Email Address');
				return false;
            }
            function validateEmail(email) {
                var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

                if (filter.test(email)) {
                    return true;
                }
                else {
                    return false;
                }
            }*/
        }
    });

});

 