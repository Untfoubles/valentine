<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Animation</title>
</head>
<body>
    <h2 data-text="&nbsp;𝒲𝑒𝓁𝒸𝑜𝓂𝑒 𝐿𝑜𝓋𝑒𝓇𝓈&nbsp;">&nbsp;𝒲𝑒𝓁𝒸𝑜𝓂𝑒 𝐿𝑜𝓋𝑒𝓇𝓈&nbsp;</h2>

    <script>
        document.addEventListener('mousemove', function(e){
            let body = document.querySelector('body');
            let heart = document.createElement('heart');
            let x = e.offsetX;
            let y = e.offsetY;
            heart.style.left = x + 'px';    
            heart.style.top = y + 'px';

            let size = Math.random() * 80;
            heart.style.width = 10 + size + 'px';
            heart.style.height = 10 + size + 'px';

            let transformValue = Math.random() * 360;
            heart.style.transform = 'rotate('+ transformValue +'deg)';

            body.appendChild(heart);

            setTimeout(function(){
                heart.remove();
            }, 1000)
        })
    </script>

    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Your top 3 fav artists</label>
                            <input type="text" name="artist1" placeholder="Enter artist 1" required>
                            <input type="text" name="artist2" placeholder="Enter artist 2" required>
                            <input type="text" name="artist3" placeholder="Enter artist 3" required>
                        </div>
                        <div class="input-field">
                      <label>Describe yourself within 3 words</label>
                      <input  placeholder="Enter word" required>
                      <input  placeholder="Enter word" required>
                      <input  placeholder="Enter word" required>
                  </div>
 
                  <div class="input-field" >
                      <label>Favorite sports</label>
                      <input type="text" placeholder="football" required>
                  </div>
                 
 
                  <div class="input-field" id="field1" >
                      <label>Favorite color</label>
                      <input type="color" required>
                  </div>
 
                  <div class="input-field">
                      <label>Favourite love song</label>
                      <input type="text" placeholder="loveee song" required>
                  </div>
 
                 
                      <div class="input-field">
                          <label>Dream valentine date</label>
                          <input type="text" placeholder="Enter date" required>
                      </div>
                        <!-- Add other input fields here -->

                        <div class="input-field">
                            <button type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Process form data
        $artist1 = $_POST["artist1"];
        $artist2 = $_POST["artist2"];
        $artist3 = $_POST["artist3"];

        // Connect to your database and insert the form data
        // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
        $conn = new mysqli("your_host", "your_username", "your_password", "your_database");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO love_tester (artist1, artist2, artist3) VALUES ('$artist1', '$artist2', '$artist3')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
