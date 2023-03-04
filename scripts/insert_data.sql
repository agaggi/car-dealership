### CUSTOMER ###

INSERT INTO CUSTOMER
(FirstName, LastName, Phone, EmailAddress, Username, Password, AccountCreationDate)
VALUES
('John', 'Doe', '757-486-9345','johndoe@gmail.com', 'JohnDoe123', '42f749ade7f9e195bf475f37a44cafcb', '2021-05-11');

INSERT INTO CUSTOMER
(FirstName, LastName,  EmailAddress, Username, Password, AccountCreationDate)
VALUES
('Alex', 'Gaggiotti','agagg001@odu.edu', 'agagg001', '42f749ade7f9e195bf475f37a44cafcb', '2021-12-05');

INSERT INTO CUSTOMER
(FirstName, LastName, Phone, Username, Password, AccountCreationDate)
VALUES
('Nishil', 'Shah', '757-123-6666', 'nshah001', '42f749ade7f9e195bf475f37a44cafcb', '2022-01-12');

INSERT INTO CUSTOMER
(FirstName, LastName, Username, Password, AccountCreationDate)
VALUES
('Leeshi', 'Lin','llin004', '42f749ade7f9e195bf475f37a44cafcb', '2022-03-03');


### EMPLOYEE ###

INSERT INTO EMPLOYEE
(FirstName, LastName, EmailAddress, IsEmployeed, Username, Password)
Values
('Chris', 'Chang', 'Cchang001@gmail.com',1, 'cchang001', '42f749ade7f9e195bf475f37a44cafcb');

INSERT INTO EMPLOYEE
(FirstName, LastName, IsEmployeed, Username, Password)
Values
('Manuel', 'Resureccion',0, 'mresu001', '42f749ade7f9e195bf475f37a44cafcb');

INSERT INTO EMPLOYEE
(FirstName, LastName, IsEmployeed, Username, Password)
Values
('Warren', 'Sheesh',1, 'wshee001', '42f749ade7f9e195bf475f37a44cafcb');

INSERT INTO EMPLOYEE
(FirstName, LastName, EmailAddress, IsEmployeed, Username, Password)
Values
('Chandler', 'Rosario', 'chan@gmail.com',1, 'chan001', '42f749ade7f9e195bf475f37a44cafcb');

### VEHICLE ###

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('5TFHW5F13AX136128', 'Truck', '2021 Ford F-150 Lightning', 35000.00, 'White', 0, NOW(), '2021FrodF150.jpeg', 1);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JH4KA3263KC011910', 'Sedan', '1989 Acura Legend', 4500.00, 'Red', 1, '2022-04-01', 'default.png', 4);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('1GCHK29U87E198693', 'Truck', '2007 Chevrolet Silverado 2500HD Classic', 9000.00, 'White', 0, '2022-04-05', '2007ChevroletSilverado2500HD.jpeg', 1);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('1G4AH51N1K6437778', 'Sedan', '1989 Buick Century', 4700.00, 'Blue', 0, '2022-03-29', 'default.png', 2);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JTHFN48Y020002281', 'Coupe', '2002 Lexus SC 430', 7500.00, 'Blue', 0, NOW(), '2002LexusSC430.jpeg', 1);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JF1GPAD60D1803590', 'Coupe', '2013 Subaru Impreza', 13500.00, 'Black', 0, '2022-04-15', '2013SubaruImpreza.jpeg', 3);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JH4KA4630LC007479', 'Coupe', '1990 Acura Legend', 6100.00, 'White', 0, '2022-04-20', '1990_acura_legend.webp', 3);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JF1GPAD60D1803589', 'Coupe', '2013 Subaru Impreza', 13200.00, 'White', 0, NOW(), '2013_subaru.jpg', 3);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('WP0AA2991YS620631', 'Coupe', '2000 Porsche 911', 79000.00, 'Black', 0, '2022-04-09', '2000_porsche.jpeg', 4);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JN8AS1MU0CM120061', 'Coupe', '2012 Infiniti Fx35', 11200.00, 'Blue', 1, '2022-03-31', '2012_Infiniti.JPG', 2);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('JM3ER29L070133282', 'Coupe', '2007 Mazda CX 7', 8700.00, 'White', 0, '2022-04-02', '2007_mazda.jpeg', 4);

INSERT INTO VEHICLE (VIN, VehicleType, VehicleModel, Price, Color, IsSold, ListingDate, ImageName, ListedBy)
Values ('WDBJF65J1YB039105', 'Coupe', '2000 Mercedes Benz E Class', 15000.00, 'Black', 0, NOW(), '2000_mercedes.jpg', 4);


### SALES ###

INSERT INTO SALES(Date, CustomerID, VehicleID, EmployeeID)
Values ('2022-04-11', 1, 10, 2);

INSERT INTO SALES(Date, CustomerID, VehicleID, EmployeeID)
Values ('2022-04-09', 2, 2, 4);
