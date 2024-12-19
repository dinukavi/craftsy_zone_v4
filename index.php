<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Craftsy Zone</title>
    <link rel="stylesheet" href="GUI/style.css">
</head>

<body>
    <?php
    require_once 'header.php';
    ?>

    
<div class="center">
		<table boarder="2" align="center">

			<tr>
                <td width="33.34%" colspan="4">
					<div class="width_four">
						<img src="IMAGES/2.jpg" alt="img5" align="center" >
					</div>                   
                </td>
					
                <td width="16.67%" colspan="2">
					<div class="width_two">
						<img src="IMAGES/1.jpg" alt="img6">
					</div>
                    
                </td>
            
            
                <td width="50%" colspan="6" rowspan="3">
					<div class="width_six">
						<h1 id="animatedText">Craftsy Zone</h1>
						<p class="highlight-yellow">Do it</p>
						<p class="highlight-pink">yourself to</p>
						<p class="highlight-yellow">make it</p>
						<p class="highlight-pink">your own</p>
					</div>
                </td>	
            </tr>

            <tr>
                <td width="16.67%" colspan="2">
					<div class="width_two">
						<img src="IMAGES/4.jpg" alt="img3">
					</div>
                    
                </td>
                <td width="33.34%" colspan="4">
					<div class="width_four">
						<img src="IMAGES/3.jpeg" alt="img4">
					</div>
                    
                </td>	                 
            </tr>

            <tr>
                <td width="25%" colspan="3">
					<div class="width_three">
						<img src="IMAGES/6.jpg" alt="img5">
					</div>   
                </td>
				
                <td width="25%" colspan="3">
					<div class="width_three">
						<img src="IMAGES/5.jpg" alt="img6">
					</div>    
                </td>
            </tr>

        </table>
    </div>
	



    <?php
        require_once 'footer.php';
    ?>
    <script>

function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
        }
        return null;
    }

    $(document).ready(function() {
        var email = getCookie("email");
        var password = getCookie("password");

        if (email && password) { 
            $.ajax({
                url: "inc/request.php",
                type: "post",
                data: { type: "signin", email: email, pass: password },
                success: function(logdata) {
                    logdata = logdata.trim();

                    if (logdata == "done") {
                        window.location.replace("home.php#m=log");
                    } else {
                        
                        console.log("Login failed: " + logdata);
                    }
                    console.log(logdata);
                },
                error: function(xhr, status, error) {
                    
                    console.error("AJAX error: " + status + " - " + error);
                }
            });
        } else {
            console.log("Email or password cookie not found.");
        }


        function shuffleImages() {
            var images = $("#imageTable img"); // Select all images within the table
            var imageSources = [];

            // Get the src and alt attributes of each image
            images.each(function() {
                imageSources.push({
                    src: $(this).attr("src"),
                    alt: $(this).attr("alt")
                });
            });

            // Shuffle the image sources array
            imageSources.sort(function() {
                return 0.5 - Math.random();
            });

            // Assign the shuffled sources back to the images
            images.each(function(index) {
                $(this).attr("src", imageSources[index].src);
                $(this).attr("alt", imageSources[index].alt);
            });
        }

        // Shuffle images every 3 seconds
        setInterval(shuffleImages, 2000);
    });

    </script>
</body>
</html>