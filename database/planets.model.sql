CREATE TABLE IF NOT EXISTS public. "planets"(
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    name VARCHAR(100) NOT NULL UNIQUE,
    distance_from_earth VARCHAR(100),
    planet_img BYTEA
);