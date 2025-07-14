CREATE TABLE IF NOT EXISTS public. "images"(
    id uuid PRIMARY KEY DEFAULT gen_random_uuid(),
    filename varchar(255) NOT NULL,
    filepath varchar(255) NOT NULL,
    mimetype varchar(50) NOT NULL,
    size_bytes int NOT NULL,
    uploaded_at timestamptz NOT NULL DEFAULT now()
);