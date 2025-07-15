CREATE TABLE IF NOT EXISTS public."users" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    fullname VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL,
    contact_num VARCHAR(15),
    username VARCHAR(225) NOT NULL UNIQUE,
    role VARCHAR(20) NOT NULL CHECK (role IN ('admin', 'client')),
    passport_image_id uuid REFERENCES public."images"(id),
    flight_id UUID REFERENCES flights(id),
    date_of_birth DATE,
    gender VARCHAR(10),
    nationality VARCHAR(50),
    email VARCHAR(100),
    emergency_contact VARCHAR(100),
    passport_number VARCHAR(50),
    passport_expiry DATE,
    passport_issuing_country VARCHAR(50)
);
