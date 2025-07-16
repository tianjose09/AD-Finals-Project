CREATE TABLE IF NOT EXISTS public.tickets (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  
  -- Passenger Information (from image)
  passenger_name VARCHAR(100) NOT NULL,      
  gender VARCHAR(20),                        
  nationality VARCHAR(50),                  
  contact_number VARCHAR(20),                
  passport_number VARCHAR(50),               
  
  -- Flight Information (from image)
  reference_number VARCHAR(20) NOT NULL,     
  departure_location VARCHAR(50) NOT NULL,   
  destination VARCHAR(50) NOT NULL,          
  departure_date DATE NOT NULL,              
  departure_time TIME NOT NULL,              
  
  -- Payment Information (from image)
  payment_method VARCHAR(20) NOT NULL,       
  amount_paid DECIMAL(10, 2) NOT NULL,       
  change_given DECIMAL(10, 2)                
);