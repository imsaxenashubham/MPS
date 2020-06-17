<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">   
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
		form .border-lable-flt {
		  display: block;
		  position: relative;
		}

		form label {
		  font-family: Poppins-Regular;
		  font-size: 15px;
		  color: #4A4A4A;
		}

		form button  {
		  float: right;
		}

		form .border-lable-flt label {
		  position: absolute;
		  left: 0;
		  top: 0;
		  cursor: text;
		  font-size: 75%;
		  opacity: 1;
		  -webkit-transition: all .2s;
		          transition: all .2s;
		  top: -.5em;
		  left: 0.75rem;
		  z-index: 3;
		  line-height: 1;
		  padding: 0 1px;
		}
		form .border-lable-flt label::after, .border-lable-flt > span::after {
		  content: " ";
		  display: block;
		  position: absolute;
		  background: white;
		  height: 2px;
		  top: 50%;
		  left: -.2em;
		  right: -.2em;
		  z-index: -1;
		}
		form .border-lable-flt .form-control::-webkit-input-placeholder {
		  opacity: 1;
		  -webkit-transition: all .2s;
		          transition: all .2s;
		}
		form .border-lable-flt .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
		  opacity: 0;
		}


		form .border-lable-flt .form-control:placeholder-shown:not(:focus) + * {
		  font-size: 75%;
		  opacity: .5;
		  top: 1em;
		}

		form .input-group .border-lable-flt {
		  display: table-cell;
		}
		form .input-group .border-lable-flt .form-control {
		  border-radius: 0.25rem;
		}
		form .input-group .border-lable-flt:not(:last-child), .input-group .border-lable-flt:not(:last-child) .form-control {
		  border-bottom-right-radius: 0;
		  border-top-right-radius: 0;
		  border-right: 0;
		}
		form .input-group .border-lable-flt:not(:first-child), .input-group .border-lable-flt:not(:first-child) .form-control {
		  border-bottom-left-radius: 0;
		  border-top-left-radius: 0;
		}

		form .form-control {
		  border-radius: 10px;
		}

		form .form-control:focus {
		  font-family: Poppins-Medium;
		  font-size: 15px;
		  color: #262626;
		  background-color: #fff;
		  border-color: #0091FF;
		  box-shadow: 0 0 0 0.01rem rgba(0, 145, 255, 0.25);
		}

		form input.form-control.error {
		  border: 1px solid #E3262F;
		  border-radius: 10px;
		} 

        .btn {
          text-align: center;
          box-sizing: border-box;
          color: black;
        }


        .btn {
          position: relative;
          overflow: hidden;
        }

        .btn span {
          position: absolute;
          border-radius: 50%;
          background-color: rgba(0, 0, 0, 0.3);
          
          width: 100px;
          height: 100px;
          margin-top: -50px;
          margin-left: -50px;
          
          animation: ripple 1s;
          opacity: 0;
        }		  	
    </style>
</head>
<body>
    <div class="container">
        <div class=" col-md-6 mx-auto align-self-center signup-right">
            <div class="card-body">
                <h3 class="text-center"><b>Create your Account</b></h3>
                <form action="" method="POST">

                          <br><br>                            
                      <div class="form-group border-lable-flt">
                        <input type="email" name="email" onfocusout="validator(this)" oninvalid="validator(this)" class="form-control"  id="email" placeholder=" " pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <label for="email">Email</label>
                        <span for="email" style="font-family: Poppins-Regular; font-size: 10px; color: #DC567E;"></span>
                      </div>

                    <div class="form-group border-lable-flt">
                        <input type="text" name="name" onfocusout="validator(this)" oninvalid="validator(this)" class="form-control" id="fullname" placeholder=" " required>
                        <label for="fullname">Full Name</label>
                        <span for="fullname" style="font-family: Poppins-Regular; font-size: 10px; color: #DC567E;"></span>

                      </div>
                      <div class="form-group border-lable-flt">
                        <input type="number" name="number" onfocusout="validator(this)" oninvalid="validator(this)" class="form-control" id="number" placeholder=" " required>
                        <label for="number">Phone Number</label>
                        <span for="number" style="font-family: Poppins-Regular; font-size: 10px; color: #DC567E;"></span>
                      </div>
                      <div class="form-group border-lable-flt">
                        <input type="password" name="password" onfocusout="validator(this)" oninvalid="validator(this)" class="form-control" id="password" placeholder=" " required>
                        <label for="password">Password</label>
                        <span for="password" style="font-family: Poppins-Regular; font-size: 10px; color: #DC567E;"></span>
                      </div>
                      <div class="form-group border-lable-flt">
                        <input type="password" name="cpassword" onfocusout="validator(this)" oninvalid="validator(this)" class="form-control" id="cpassword" placeholder=" " required>
                        <label for="cpassword">Confirm Password</label>
                        <span for="cpassword" style="font-family: Poppins-Regular; font-size: 10px; color: #DC567E;"></span>
                      </div>                                                  
                          <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="customC">
                            <label class="custom-control-label" for="customC">I agree to Terms & Condition</label>
                          </div>
                      <button type="submit" value="POST" name="submit" class="btn btn-lg btn-primary golden-btn">Submit</button>
                </form>
                <br><br>
                <center><h5>Already have an account? <a href="logindemo.php">Sign In</a></h5></center>        
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function validator(field) {
  			if (field.validity.valueMissing) {
  				field.setCustomValidity('*Required');
  				$(field).addClass('error');
  				$("span[for='" + $(field).attr('id') + "']").text(field.validationMessage);
  			} else if (field.validity.typeMismatch || field.validity.patternMismatch) {
  				field.setCustomValidity('*Invalid Format');
  				$(field).addClass('error');
  				$("span[for='" + $(field).attr('id') + "']").text(field.validationMessage);
  			} else {
  				field.setCustomValidity('');
  				$(field).removeClass('error');
  				$("span[for='" + $(field).attr('id') + "']").text(field.validationMessage);
  			}
  			return true;
  		}

  		$('#form-query .slide-toggle').change(function() {
  			$s = $(this).data('s');
  			console.log($s);
  			$('.query').addClass('display');
  			$('.sales').addClass('display');
  			$('.' + $s).removeClass('display');
    	});

  $.fn.andSelf = function() {
    return this.addBack.apply(this, arguments);
  };

  $("html").on("click", ".btn", function(evt) {
    var btn = $(evt.currentTarget);
    var x = evt.pageX - btn.offset().left;
    var y = evt.pageY - btn.offset().top;

    $("<span/>").appendTo(btn).css({
      left: x,
      top: y
    });
  });    	
    </script>
</body>
</html>