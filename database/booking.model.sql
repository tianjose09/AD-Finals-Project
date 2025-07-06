CREATE TABLE IF NOT EXISTS public.bookings (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  user_id UUID REFERENCES users(id),
  flight_id UUID REFERENCES flights(id),
  booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  travel_date DATE,
  seat_number VARCHAR(10),
  ticket_code VARCHAR(20) UNIQUE,
  status VARCHAR(20) DEFAULT 'booked', -- values: booked, completed, cancelled
  feedback TEXT
);