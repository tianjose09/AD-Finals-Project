CREATE TABLE IF NOT EXISTS public.tickets (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  booking_id INT REFERENCES bookings(id),
  generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  flight_number VARCHAR(20),
  launch_pad VARCHAR(20),
  gate VARCHAR(10),
  qr_code TEXT
);