<?php 
    // code runs iff submit is clicked atleast once
    // at first when the page get loaded, 'submit' name is not present
    // however, after clicking submit, its now present in POST global variable
    if(isset($_POST['submit'] ) ){
    // get config to connect
        require "../config.php";
        require "../common.php";
        $sql="";
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            // now create an array for all values of the user
            // with exception to id
            $new_user = array(
                "firstname" => $_POST['firstname'],
                "lastname"  => $_POST['lastname'],
                "email"     => $_POST['email'],
                "age"       => $_POST['age'],
                "location"  => $_POST['location']
            );

            // our insert query
            // INSERT INTO users (firstname, lastname, email, age, location) values (:firstname, :lastname, :email, :age, :location)
            // we wll use sprintf to assign variable formatted string. excluding id and date fields
            // implode is similar to javascript join, return a concatted string from array
            $sql=sprintf("INSERT INTO %s (%s) values (%s)", 
                "users",
                implode(", ", array_keys($new_user) ),
                ":" . implode(", :", array_keys($new_user) )
            );
            // maybe has to do with effeciency
            $statement = $connection->prepare($sql);
            $statement->execute($new_user);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
?>
<?php 
    include "templates/header.php";
?>
    <?php 
        if (isset($_POST['submit']) && $statement) { 
            echo escape($_POST['firstname']) . " sucessfully added";
        }
    ?>
    <h2>Add a user</h2>
    <form method="post">
    	<label for="firstname">First Name</label>
    	<input type="text" name="firstname" id="firstname">

    	<label for="lastname">Last Name</label>
    	<input type="text" name="lastname" id="lastname">

    	<label for="email">Email Address</label>
    	<input type="text" name="email" id="email">

    	<label for="age">Age</label>
    	<input type="text" name="age" id="age">

    	<label for="location">Location</label>
    	<input type="text" name="location" id="location">

    	<input type="submit" name="submit" value="Submit">
    </form>

    <a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>