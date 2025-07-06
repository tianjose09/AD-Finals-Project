CREATE TABLE IF NOT EXISTS public.flights (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  planet_id UUID REFERENCES planets(id),
  departure_time TIMESTAMP,
  return_time TIMESTAMP,
  capacity INT,
  price NUMERIC(10,2),
  package_type VARCHAR(20) CHECK (package_type IN ('Basic', 'VIP', 'Galactic Pass'))
);