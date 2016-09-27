CREATE TABLE USER(
	ID_USER INTEGER AUTO_INCREMENT NOT NULL,
	USER_NAME VARCHAR(255) NOT NULL,
	DRIVERS_LICENSE VARCHAR(20),
	BOOL_CAR_ACCIDENT BOOLEAN NOT NULL,
	BOOL_CAR_DRIVER BOOLEAN NOT NULL,
	CONSTRAINT PK_USER PRIMARY KEY (ID_USER)
);

CREATE TABLE CAR(
	ID_CAR INTEGER AUTO_INCREMENT NOT NULL,
	ID_USER INTEGER NOT NULL,
	CAR_MODEL VARCHAR(45) NOT NULL,
	CAR_CATEGORY VARCHAR(10) NOT NULL,
	CAR_PLATE VARCHAR(10) NOT NULL,
	CAR_YEAR VARCHAR(4) NOT NULL,
	CAR_KM_PER_L VARCHAR(10) NOT NULL,
	CONSTRAINT PK_CAR PRIMARY KEY (ID_CAR),
	CONSTRAINT FK_CAR_RF_USER FOREIGN KEY (ID_USER) REFERENCES USER(ID_USER)
);


CREATE TABLE ROUTE(
	ID_ROUTE INTEGER AUTO_INCREMENT NOT NULL,
	START_LOCATION_LAT DOUBLE NOT NULL,
	START_LOCATION_LONG DOUBLE NOT NULL,
	FINAL_LOCATION_LAT DOUBLE NOT NULL,
	FINAL_LOCATION_LONG DOUBLE NOT NULL,
	CONSTRAINT PK_ROUTE PRIMARY KEY (ID_ROUTE)
);

CREATE TABLE TRIP(
	ID_TRIP INTEGER AUTO_INCREMENT NOT NULL,
	ID_CAR INTEGER NOT NULL,
	ID_ROUTE INTEGER NOT NULL,
	PEOPLE_AMOUNT INTEGER NOT NULL,
	CONSTRAINT PK_TRIP PRIMARY KEY (ID_TRIP),
	CONSTRAINT FK_TRIP_RF_CAR FOREIGN KEY (ID_CAR) REFERENCES CAR(ID_CAR),
	CONSTRAINT FK_TRIP_RF_ROUTE FOREIGN KEY (ID_ROUTE) REFERENCES ROUTE(ID_ROUTE)
);