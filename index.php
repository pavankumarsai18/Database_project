<?php
	include_once 'includes.php';
	include_once 'DB.sql';
?>

<html>
  <head>
    <title> Log in or Register </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>

  <body>

<!--   	<?php
  		// $sql = "SELECT * FROM Student;";

  		// $result = mysqli_query($conn, $sql);
  		 // $resultCheck = mysqli_num_rows($result);
  		// if($resultCheck > 0)
  		// {
  		// 	while($row = mysqli_fetch_assoc($result))
  		// 		echo $row['S_id']," ",$row['password']," ",$row['University'];
  		// }
  		
  	 ?> -->

	<div style="background-image: url(https://i.ytimg.com/vi/zMeWdNrlX-w/maxresdefault.jpg)">

    <div class="row">
      <div class="col-md-4">
        <h3> Apartment Search Login </h3>
        <form action="ok.php" metod="post">
          <div class="form-group">
            <label> username </label>
            <input type="text" name="username" class="form-control" required> </div>

            <div class="form-group">
              <label> password </label>
              <input type="password" name="psswd" class="form-control" required> </div>
              <button type="submit" class="btn btn-primary"> Log In </button>

          </form>
	</div>

	</div>
          <div class="col-md-4" style="background-image: url(https://i.imgur.com/6YuRxJA.png)">
            <h3>Register Appartement.stu </h3>
            <form action="register.php" metod="post">
              <div class="form-group">
                <label> First Name </label>
                <input type="text" name="fname" class="form-control" required> </div>

                <div class="form-group">
                  <label> Last Name </label>
                  <input type="text" name="lname" class="form-control" required> </div>

                  <div class="form-group">
                    <label> username </label>
                    <input type="text" name="username" class="form-control" required> </div>

                <div class="form-group">
                  <label> password </label>
                  <input type="password" name="psswd" class="form-control" required> </div>

                <div class="form-group">
                  <label> confirm password </label>
                  <input type="password" name="psswd2" class="form-control" required> </div>
                  <button type="submit" class="btn btn-primary"> Register </button>

              </form>
        </div>
      </div>
<div class="col-md-4">
<h3> Mission</h3>
<h9>
The sole purpose of a mission statement is to serve as a company's goal/agenda, it outlines clearly what the goal is. Some generic examples of mission statements would be, "To provide the best service possible within the banking sector for our customers." or "To provide the best experience for all of our customers." The reason why businesses make use of mission statements is to make it clear what they look to achieve as an organization, not only to themselves and their employees but to the customers and other people who are a part of the business, such as shareholders. As a company evolves, so will their mission statement. This is to make sure that the company remains on track and to ensure that the mission statement does not lose its touch and become boring or stale.

It is important that a mission statement is not confused with a vision statement. As discussed earlier, the main purpose of a mission statement is to get across the ambitions of an organisation in a short and simple fashion; it is not necessary to go into detail for the mission statement which is evident in examples given. The reason why it is important that a mission statement and vision statement are not confused is because they both serve different purposes. Vision statements tend to be more related to strategic planning and lean more towards discussing where a company aims to be in the future.
</h9>
</div>


<div class="col-md-4">
</div>
<h3> About </h3>
<h9>
Wikipedia (/?w?k?'pi?di?/ (About this soundlisten), /?w?ki'pi?di?/ (About this soundlisten) WIK-ih-PEE-dee-?) is a multilingual, web-based, free-content encyclopedia project supported by the Wikimedia Foundation and based on a model of openly editable content. The name "Wikipedia" is a portmanteau of the words wiki (a technology for creating collaborative websites, from the Hawaiian word wiki, meaning "quick") and encyclopedia. Wikipedia's articles provide links designed to guide the user to related pages with additional information.

Wikipedia is written collaboratively by largely anonymous volunteers who write without pay. Anyone with Internet access can write and make changes to Wikipedia articles, except in limited cases where editing is restricted to prevent disruption or vandalism. Users can contribute anonymously, under a pseudonym, or, if they choose to, with their real identity. The fundamental principles by which Wikipedia operates are the five pillars. The Wikipedia community has developed many policies and guidelines to improve the encyclopedia; however, it is not a formal requirement to be familiar with them before contributing.

Since its creation on January 15, 2001, Wikipedia has grown rapidly into one of the largest reference websites, attracting 374 million unique visitors monthly as of September 2015.[1] There are about 72,000 active contributors working on more than 48,000,000 articles in 302 languages. As of today, there are 5,956,739 articles in English. Every day, hundreds of thousands of visitors from around the world collectively make tens of thousands of edits and create thousands of new articles to augment the knowledge held by the Wikipedia encyclopedia. (See the statistics page for more information.) People of all ages, cultures and backgrounds can add or edit article prose, references, images and other media here. What is contributed is more important than the expertise or qualifications of the contributor. What will remain depends upon whether the content is free of copyright restrictions and contentious material about living people, and whether it fits within Wikipedia's policies, including being verifiable against a published reliable source, thereby excluding editors' opinions and beliefs and unreviewed research. Contributions cannot damage Wikipedia because the software allows easy reversal of mistakes and many experienced editors are watching to help ensure that edits are cumulative improvements. Begin by simply clicking the Edit link at the top of any editable page!

Wikipedia is a live collaboration differing from paper-based reference sources in important ways. Unlike printed encyclopedias, Wikipedia is continually created and updated, with articles on historic events appearing within minutes, rather than months or years. Because everybody can help improve it, Wikipedia has become more comprehensive than any other encyclopedia. In addition to quantity, its contributors work on improving quality as well. Wikipedia is a work-in-progress, with articles in various stages of completion. As articles develop, they tend to become more comprehensive and balanced. Quality also improves over time as misinformation and other errors are removed or repaired. However, because anyone can click "edit" at any time and add content, any article may contain undetected misinformation, errors, or vandalism. Awareness of this helps the reader to obtain valid information, avoid recently added misinformation (see Wikipedia:Researching with Wikipedia), and fix the article.

See also: Wikipedia:FAQ and Wikipedia:Citing Wikipedia
</h9>
</div>


</div>
  </body>






</html>

