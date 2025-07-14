CREATE TABLE IF NOT EXISTS public."users" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    fullname VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(225) NOT NULL,
    contact_num VARCHAR(11),
    username VARCHAR(225) NOT NULL UNIQUE,
    role VARCHAR(20) NOT NULL CHECK (role IN ('admin', 'client')),
    passport_imgage_id uuid REFERENCES public."images"(id),
    flight_id UUID REFERENCES flights(id)
);
