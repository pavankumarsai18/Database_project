CREATE TABLE Student
(
	S_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
 	password TEXT,
 	University TEXT
 );

CREATE TABLE Apt_type
(
	Utilities TEXT NOT NULL,
    A_id int FOREIGN KEY REFERENCES Apt_Cmplx(A_id),
    A_id PRIMARY KEY
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
	prefernces TEXT,
	city TEXT
);