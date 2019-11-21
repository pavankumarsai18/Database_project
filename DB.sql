CREATE TABLE Student
(
	S_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    password TEXT NOT NULL,
    username TEXT NOT NULL
);

CREATE TABLE Apt_type
(
	Utilities TEXT NOT NULL,
    At_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL
);

CREATE TABLE Apt_Cmplx(
	A_id int(11) PRIMARY KEY NOT NULL,
	Coordinates TEXT
);

CREATE TABLE Review(
	R_id  int(11) PRIMARY KEY NOT NULL,
	S_id  int(11) REFERENCES Student(S_id),
	Rating int(11) NOT NULL,
	textField TEXT
);

CREATE TABLE Student_in_city
(
	S_id int(11) Foreign KEY 
	prefernces TEXT,
	city TEXT
	University TEXT
);


CREATE TABLE is_About
(
	r_id int(11) REFERENCES Review(R_id),
	s_id int(11) REFERENCES  Apt_Cmplx(A_id),
	CONSTRAINT is_abt_constr PRIMARY KEY (r_id, s_id)
);

CREATE TABLE preferes_cmplx
(
	-- Student Apt_Cmplx
	s_id int(11) REFERENCES Student(S_id),
	a_id int(11) REFERENCES Apt_Cmplx(A_id),
	CONSTRAINT pref_cmplx_constr PRIMARY KEY (s_id,a_id)
);

CREATE TABLE preferes_type
(
	-- Student--> Apt_Cmplx
	s_id int(11) REFERENCES Student(S_id),
	at_id int(11) REFERENCES Apt_type(At_id),
	CONSTRAINT pref_cmplx_constr PRIMARY KEY (s_id,at_id)
);


CREATE TABLE has
(
	-- Apt_type Apt_Cmplx
	a_id int(11) REFERENCES Apt_Cmplx(A_id),
	at_id int(11) REFERENCES Apt_type(At_id),
	CONSTRAINT has_cmplx_constr PRIMARY KEY (a_id,at_id)

);
-- ////////////
-- <?php 
--               $username = $_POST["username"];
--               $password =  $_POST["psswd"];

--               $sql = "INSERT INTO Student(password,username) VALUES ('$password', '$username');";
--               mysqli_query($conn,$sql);
--         ?>