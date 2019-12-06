<?php 
    include_once 'includes.php';
    session_start();
?>
<html>
    
        <h2> Sort by </h2> <br>
        <style>
            body{
            
        background-image: url("https://www.dfwapartmentnerdz.com/wp-content/uploads/2017/12/las-colinas-apartment-finder.jpg");
            
            }
            h2{
                color:antiquewhite;
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
                <div class=col-md-12>

                <div class="row">
            <form action="sort.php" method="post">

                

                    <div class="col-md-12" >
                <div class="form-group">
                     
                    <button type="submit" name = "dist"class="btn btn-primary"> DISTANCE </button>
                    </div>
                </div>
                <br>
                <div class="col-md-12" >
                    <div class="form-group">
                        <button type="submit" name = "rent" class="btn btn-primary"> RENT </button>
                        </div>
                    </div>
                    
                    <br>
                    
                    <div class="col-md-12" >
                        <div class="form-group">
                             
                            <button type="submit" name = "rating"class="btn btn-primary"> RATING </button>
                            </div>
                        </div>   
                    
                        <br>

                </div>
                </form>
            </div>
                </div>   
                
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>


                <?php
                    if(isset($_POST['dist']))
                    {
                        header("Location: ./Distance.php");
                    }
                    else if(isset($_POST['rent']))
                    {
                        header("Location: ./Rent.php");
                    }
                    else if(isset($_POST['rating']))
                    {
                        header("Location: ./Rating.php");
                    }
                ?>
               
                
                
    </body>
    <footer>
            Data Pirates, COP4710 Fall 2019, FSU, group project
          </footer>
</html>