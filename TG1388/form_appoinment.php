<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="new.css" type="text/css">
    
    <script src="script.js" defer></script>

    <script defer>

        function validateform(){

            document.getElementById("fname-error").innerText = "";
            document.getElementById("lname-error").innerText= "";
            document.getElementById("phoneno-error").innerText = "";
            document.getElementById("date-error").innerText = "";
            document.getElementById("title-error").innerText="";
            document.getElementById("doctor-error").innerText="";

            const firstname=document.forms["appoinmentform"]["fname"].value;
            const lastname=document.forms["appoinmentform"]["lname"].value;
            const number=document.forms["appoinmentform"]["phoneno"].value;
            const date=document.forms["appoinmentform"]["appointment_date"].value;
            const title=document.forms["appoinmentform"]["title"].value;
            const doctor=document.forms["appoinmentform"]["doctor"].value;

            let isValid = true;
            
            if(!firstname){
                document.getElementById("fname-error").innerText = "First name is required";
                isValid = false;
            }
            if(!lastname){
                document.getElementById("lname-error").innerText = "Last name is required";
                isValid = false;
            }
            if(!title){
                document.getElementById("title-error").innerText = "Title is required";
                isValid = false;
            }
            if (!number) {
                document.getElementById("phoneno-error").innerText = "Phone number is required";
                isValid = false;
            }
            else if(!/^\d{10}$/.test(number)){
                document.getElementById("phoneno-error").innerText = "Please enter a valid 10-digit phone number";
                isValid = false;
            }
            if (!date) {
                document.getElementById("date-error").innerText = "Please select a date for the appointment";
                isValid = false;
            } else {
                const today = new Date();
                const maxDate = new Date();
                maxDate.setDate(today.getDate() + 21); // 3 weeks from today
                const selectedDate = new Date(date);

                if (selectedDate < today || selectedDate > maxDate) {
                    document.getElementById("date-error").innerText = "Please select a date within the next two weeks.";
                    isValid = false;
                }
            }
                if(!doctor){
                document.getElementById("doctor-error").innerText = "Doctor selection is required";
                isValid = false;
            }    

        return isValid;
        }
       
        function open_popup(){
            document.getElementById("popup").classList.add("open-popup");
        }
        function close_popup(){
            document.getElementById("popup").classList.remove("open-popup");
        }
        </script>
    
    
</head>
<body id="one">
    
    <div class="slideshow-container">
        <div class="mySlides fade">
            <div id="text">MEDICAL SERVICES THAT YOU CAN TRUST.</div>
            <p id="text1">We are provide best homecare for you. homeeathy treatment is very benificial for people
                as it is very useful and effiencent in treatment an immense range of diesease and long-term illnes.
            </p>
        </div>
        <div class="mySlides fade">
            <div id="text">COMPREHENSIVE HOMECARE SOLUTIONS</div>
            <p id="text1">We offer personalized homecare services designed to meet your specific health needs. Our dedicated team is committed to providing 
                efficient and effective treatments, ensuring you receive the best possible care in the comfort of your own home.
            </p>
        </div>
        <div class="mySlides fade">
            <div id="text">EXPERT HEALTHCARE AT YOUR DOORSTEP</div>
            <p id="text1">Trust our skilled professionals to deliver top-notch healthcare directly to you. Our home health services are tailored to 
                manage a wide range of conditions, promoting faster recovery and a better quality of life for patients with chronic illnesses.</p>
        </div>
        <div class="mySlides fade">
            <div id="text">HOLISTIC APPROACH TO WELLNESS</div>
            <p id="text1">Our medical services focus on holistic healing, combining traditional and alternative treatments to address
                 various health concerns. Experience the benefits of home-based healthcare, where we prioritize your well-being 
                 and strive for the best outcomes for every patient.

            </p>
        </div>

       
    </div>
    <div>
       
        <div id="right">
          <div id="innerright">
            <form name="appoinmentform" action="" method="POST" onsubmit="return validateform()">
            <table>
                <tr>
                    <td>
                        <select name="title" title="patient">
                            <option value="">Select Title</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                        </select>
                        <span id="title-error" class="error-message"></span>
                        
                    </td>
                    <td>
                        <input type="text" name="fname" placeholder="Your First Name" >
                        <span id="fname-error" class="error-message"></span>
                    </td>
                        
                </tr>
                <tr>
                    <td>
                        <input type="text" name="lname" placeholder="Your Last Name">
                        <span id="lname-error" class="error-message"></span>
                    </td>
                    <td>
                        <input type="text" name="phoneno" placeholder="Your Number" maxlength="10">
                        <span id="phoneno-error" class="error-message"></span>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                       <select name="doctor">
                            <option value="">Select Doctor</option>
                            <option value="Dr.Georage Smith">Dr.Georage Smith  (General Surgeon)</option>
                            <option value="Dr.Devi Shetty">Dr.Devi Shetty  (Cardology)</option>
                            <option value="Dr.Meredith Grey">Dr.Meredith Grey  (Padiatrics)</option>
                            <option value="Dr.Elizabeth well">Dr.Elizabeth well  (Gynecology)</option>
                            <option value="Dr.Catherin Hamlin">Dr.Catherin Hamlin  (Neurology)</option>
                            <option value="Dr.Ben Carson">Dr.Ben Carson  (Dermotologists)</option>
                            <option value="Dr.Paul Fremen">Dr.Paul Fremen  (Plastic Surgon)</option>
                            <option value="Dr.Jane Cooke">Dr.Jane Cooke  (ENT Specialist)</option>
                       </select>
                       <span id="doctor-error" class="error-message"></span>
                    </td>
                    <td>
                        <input type="date" name="appointment_date">
                        <span id="date-error" class="error-message"></span>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><textarea rows="10px" cols="82px" placeholder="Describe you problem" border-radius="20px" name="description"></textarea></td>    
                </tr>
                <tr>
                    <td><input type="reset" name="reset" value="Reset" id="formbtn"></td>   
                    <td><input type="submit" name="submit" value="Book Appoinment" id="formbtn" ></td> 
                </tr>
            
            </table>
            </form>
        </div>
       </div>
       
      <?php
          
          include_once 'database.php'//link external php file 
      ?>

    <div class="popup" id="popup">
            <img src="images/ok.webp" id="ok" style="display: none;">
            <h1>Thank You!</h1>
            <p>Your Appoinment has been succesfully<br> recorded.
                Thanks!
            </p>
            <?php
                echo "Date & Time -"."<br>" .(date("Y"))."-".date("M")."-".date("D")." ".date("H").":".date("i").":".date("s")." ".date("a")."<br>";
            ?>
            <button type="button" onclick="close_popup();">ok</button>
    </div>


    
    
</body>
</html>