CREATE TABLE IF NOT EXISTS public. "planets"(
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    name VARCHAR(100) NOT NULL UNIQUE,
);