CREATE TABLE Student
(
	First_name TEXT NOT NULL,
	Last_name TEXT NOT NULL,
	Username TEXT NOT NULL,
	Passwd TEXT NOT NULL,
	City TEXT NOT NULL,
	S_id int(32) NOT NULL AUTO_INCREMENT,
	Preferences TEXT NOT NULL,
	CONSTRAINT id PRIMARY KEY(S_id)	
)


CREATE TABLE Apt_type
(
	Utilities TEXT NOT NULL,
    At_id int(32) AUTO_INCREMENT NOT NULL;
    CONSTRAINT id PRIMARY KEY(At_id)
);

CREATE TABLE Apt_Cmplx(
	A_id int(32) NOT NULL,
	Coordinates TEXT,
	Constraint id PRIMARY KEY(A_id)
);

CREATE TABLE Review(
	R_id  int(32) PRIMARY KEY NOT NULL,
	S_id  int(32) REFERENCES Student(S_id),
	Rating int(32) NOT NULL,
	textField TEXT
);

CREATE TABLE is_About
(
	r_id int(32) REFERENCES Review(R_id),
	s_id int(32) REFERENCES  Apt_Cmplx(A_id),
	CONSTRAINT is_abt_constr PRIMARY KEY (r_id, s_id)
);

CREATE TABLE preferes_cmplx
(
	-- Student Apt_Cmplx
	s_id int(32) REFERENCES Student(S_id),
	a_id int(32) REFERENCES Apt_Cmplx(A_id),
	CONSTRAINT pref_cmplx_constr PRIMARY KEY (s_id,a_id)
);

CREATE TABLE preferes_type
(
	-- Student--> Apt_Cmplx
	s_id int(32) REFERENCES Student(S_id),
	at_id int(32) REFERENCES Apt_type(At_id),
	CONSTRAINT pref_cmplx_constr PRIMARY KEY (s_id,at_id)
);


CREATE TABLE has
(
	-- Apt_type Apt_Cmplx
	a_id int(11) REFERENCES Apt_Cmplx(A_id),
	at_id int(11) REFERENCES Apt_type(At_id),
	CONSTRAINT has_cmplx_constr PRIMARY KEY (a_id,at_id)

);
