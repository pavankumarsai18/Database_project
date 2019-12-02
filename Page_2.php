<html>
  <head>
                <title> Preferences </title>
                <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
              </head>
<style>
                  body{
                      background-image: url("https://webengage.com/blog/wp-content/uploads/sites/4/2019/05/Geofencing-01.gif");
                  }
                  footer{
                    background: black;
                     color: gray;
                    font-size: 12px;
                    padding: 20px 20px;
                    text-align: center;
                }
              </style>
    <body>
    </div>
    <div class="col-md-4" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
      <h3>Search for your new Appartement </h3>
      <form action="register.php" method="post">
        <div class="form-group">
          <label> University </label>
          <input type="text" name="fname" class="form-control" required> </div>

          <div class="form-group">
            <label> Major </label>
            <input type="text" name="lname" class="form-control" required> </div>

            <div class="form-group">
              <label> Do You Drink? </label>
                Yes <input type="radio" name="does_drink" value="Y">
                NO <input type="radio" name="does_drink" value="N"> </div>

                <div class="form-group">
                        <label> Do You Want Drinker roommate? </label>
                          Yes <input type="radio" name="Pref_drink" value="Y">
                          NO <input type="radio" name="Pref_drink" value="N"> </div>

                <div class="form-group">
                     <label> Do You Smoke? </label>
                                  Yes <input type="radio" name="Smokes" value="Y">
                                  NO <input type="radio" name="Smokes" value="N"> </div>

          <div class="form-group">
            <label> Do You Want Smokers roommates? </label>
            Yes <input type="radio" name="Pref_smoke" value="Y">
            NO <input type="radio" name="Pref_smoke" value="N"> </div>

            <div class="form-group">
                    <label> Do You have pet(s)? </label>
                      Yes <input type="radio" name="Pet" value= "Y">
                      NO <input type="radio" name="Pet" value = "N"> </div>

          <div class="form-group">
            <label> Do you want roomates with pet(s)? </label>
            Yes <input type="radio" name="Pref_Pet" value="Y">
            NO <input type="radio" name="Pref_Pet" value="N"> </div>


            <div class="form-group">
                    <label> Distance range from your college </label>
                    <select>
                        <option value="1" selected="selected"> 1mile </option>
                        <option value="3" selected="selected"> 3mi </option>
                        <option value="5" selected="selected"> 5mi </option>
                        <option value="10" selected="selected"> 10mi </option>
                        <option value="10+" selected="selected"> over 10mi </option>
                     </div>
                    </select>
            <button type="submit" class="btn btn-primary"> Search </button>

        </form>
        <? php 
          $result = "";
<!--        as an atttirbute the first two digits
    // smokes or not 0 1
    // drinks or not 0 1
    // major -->
          $smokes = $_POST["Smokes"];
          if($smokes == "Y")
            $result += "1";
          else
            $result += "0";

        
          $drinks = $_POST["Drinks"];
          if($drinks == "Y")
            $result += "1";
          else
            $result += "0";

          $P_smokes = $_POST["Pref_Smokes"];
          if($P_smokes == "Y")
            $result += "1";
          else
            $result += "0";


          $P_drink = $_POST["Pref_Drink"];
          if($P_drink == "N")
            $result += "1";
          else
            $result += "0";

        $sql = "UPDATE Student_in_city SET prefernces = "$result" WHERE username == "$username";";
        mysqli_query($conn,$sql);

        ?>
  </div>
  </body>
</html>
